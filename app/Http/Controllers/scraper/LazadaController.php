<?php

namespace App\Http\Controllers\scraper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Feed;
use App\Marketplace;
use App\Item;
use App\Category;
use App\Seller;
use App\City;
use App\Tag;
use \App\Services\Slug;
use \App\Services\SearchResult;
use \App\Services\Scraper;
use \App\Services\TagService;

use JonnyW\PhantomJs\Client;
use Symfony\Component\DomCrawler\Crawler;

class LazadaController extends Controller
{
    public function unpublished($id){


    }

    public function getBody($url){
        $client = Client::getInstance();
        $client->isLazy();
        $client -> getEngine()->setPath(env('PHANTOMJS_PATH'));
        $request = $client->getMessageFactory()->createRequest($url);
        $request->setTimeout(15000);
        $response = $client->getMessageFactory()->createResponse();        
        $client->send($request,$response);    
        return $response;
    }

    public function scrape()
    {
        $start= (microtime(true));
        $start_m = round(memory_get_peak_usage(true)/1024,2);

        $p = new Scraper;
        $mp = $p->feedProcessor('lazada'); //smallcase
        

        $scraped['item_url'] = $p->selectItem($mp)->item_url;

        //$scraped['item_url'] = 'https://www.lazada.co.id/alba-jam-tangan-pria-tali-stainless-steel-silver-gold-av3512x1-13927493.html'; //normal
        //$scraped['item_url'] = 'http://www.lazada.co.id/ray-ban-sunglasses-scuderia-ferrari-collection-rb2448mf-matteblack-f61430-size-53-silver-36247532.html'; // no location
        // $scraped['item_url'] = 'http://www.lazada.co.id/moto-e4-2gb16gb-abu-abu-metal-jbl-c100si-in-ear-headphones-35536623.html'; //by lazada
        //$scraped['item_url'] = "http://www.lazada.co.id/xiaomi-wifi-extender-original-versi-2-300mbps-24ghz-putih-15031598.html"; //test body

        $body = $this->getBody($scraped['item_url']);
        if ($body->getStatus() == 404){
            $item->update(['published'=>0,'checked'=>1]);
            return 'i got ... 404';
        } else if ($body->getStatus() != 200){
            return 'failed..try again later';
        } 




        $crawler = new Crawler($body->getContent());

        echo "<div>URL === ".$scraped['item_url']."</div>";
        
        $scraped['title']= trim(str_limit($crawler->filter('h1#prod_title')->text(),190,''));
        echo "<div>Title === ".$scraped['title']."</div>";
        
        $item_slug = new Slug;
        $scraped['slug'] = $item_slug->createSlug($scraped['title']);
        echo "<div>Slug === ".$scraped['slug']."</div>";

        $cats = $crawler->filter('.breadcrumb__list a')->each (function ($node){
             return trim($node->text());
        });
        echo "<div>Category === "; echo implode(' > ',$cats)." :: ";
        
        //$cats = array_slice($cats, 1); // gak perlu slice, karena gak ada beranda
        $scraped['category_id'] = $p->getCatId($cats);
        echo $scraped['category_id']."</div>";
        
        $scraped['sell_price'] = $crawler->filter('#product_price') ? preg_replace('/[^0-9]/','', $crawler->filter('#product_price')->text()) : null;
        echo "<div> Sell Price === ".$scraped['sell_price'];
        $price_ori = $crawler->filter('.price_erase') ? preg_replace('/[^0-9]/','', $crawler->filter('.price_erase')->text()) : null;
        if ($price_ori != $scraped['sell_price']){
            $scraped['raw_price'] = $price_ori;
            $discount = (($scraped['raw_price'] - $scraped['sell_price']) / $scraped['raw_price'] )*100;
            $scraped['discount'] = round($discount,0,PHP_ROUND_HALF_UP);
            echo " >> ". $scraped['raw_price']." >> ". $scraped['discount'];
        }
        
        $sku = $crawler->filter('#pdtsku') ? explode('-',$crawler->filter('#pdtsku')->text())[0] : null;  //dapetin sku    
        $id_seller_json = json_decode($p->letsCurl('https://www.lazada.co.id/ajax/ask/questionsSegmented?sku='.$sku));
        $seller['name'] = $id_seller_json->data->pdpSeller->name;
        $seller_slug = new Slug;
        $seller['slug'] = $seller_slug->createSlug($seller['name']);
        $seller['marketplace_id'] = $mp->id;
        $seller_img = $id_seller_json->data->pdpSeller->image;
        $seller['image_url'] = ($seller_img != null) ? $seller_img : 'https://s3-ap-southeast-1.amazonaws.com/new99toko/default_shop.png';
        echo "<div> Seller === ".$seller['name']."/".$seller['slug']." >> ". $seller['image_url'];

        $seller_id = $id_seller_json->data->pdpSeller->id;        
        if ($seller_id != 0){
            $detail_seller_json = json_decode($p->letsCurl('https://seller-transparency-api.lazada.co.id/v1/seller/'.$seller_id.'/transparency'));
            $city['name'] = $detail_seller_json->seller->location;
        } else {
            $city['name'] = 'Jakarta';
        }        
        $city_slug = new Slug;
        $city['slug']   = $city_slug->createSlug($city['name']);
        $city = City::firstOrCreate($city);
        $seller['city_id'] = $city->id;
        echo " >> ". $city['name']."/".$city['slug']."</div>"; 

        $seller = Seller::firstOrCreate($seller);
        $scraped['seller_id'] = $seller->id;
        echo "<div>Seller ID === ". $scraped['seller_id']." >> City ID === ". $seller['city_id']."</div>";

        $img = $crawler->filter('.prd-moreImages .productImage');
        $imgs = $img->each (function ($node){
            return trim($node->attr('data-image'));
        });        
        $scraped['images'] = serialize($imgs);
        echo "<div>=========================<br>". $scraped['images'] . "</div>";

        $crawler -> filter('.more-desc-button, #flix-inpage, .product-description__title, .product-description__webyclip-thumbnails, .product-description__inbox, noscript')->each(function($nodes){
            foreach ($nodes as $node) {
                $node->parentNode->removeChild($node);
            }
        });
        
        $body1 = $crawler->filter('.product-description__block[data-component=product-description]')->html();
        $body1 = $p->clearStyle($body1);
        $body1 = str_replace('productlazyimage','img-responsive', $body1);
        $body1 = str_replace('data-original','src', $body1);
        $body2 = $crawler->filter('table.specification-table')->count() ? '<table class="table table-responsive table-bordered">'.$crawler->filter('table.specification-table')->html().'</table>' : '';
        $body = $body1.'<br><br>'.$body2;

        $clr = '/<([^>\s]+)[^>]*>(?:\s*(?:<br \/>|&nbsp;|&thinsp;|&ensp;|&emsp;|&#8201;|&#8194;|&#8195;)\s*)*<\/\1>/m';
        
        $body = preg_replace($clr, '', $body);
        $body = trim($body);
        $scraped['body'] = str_replace('\n','', $body);
        echo "<div>=========================". $scraped['body']."</div>";

        $details = $crawler->filter('.prod_details')->count() ? $crawler->filter('.prod_details')->html() : null;        
        $scraped['details'] = $p->clearStyle(str_replace('\n','', $details));
        echo "<div>=========================". $scraped['details']."</div>";
    
        $scraped['processed'] = 1 ;
        $scraped['views'] = (rand(10,100));  

        $tag_sr = new TagService;
        $tags = $tag_sr->createTag($scraped['title']);
        foreach($tags as $t){
            $tag['name'] = $t;
            $tag_slug = new Slug;
            $tag['slug'] = $tag_slug->createSlug($t);
            $save_tag = Tag::firstOrNew($tag);
            $tag['count'] = $save_tag->count + 1;
            $save_tag->save();            
            $tag_id[] = $save_tag->id;
        }
        $scraped['tags'] = serialize($tag_id);
        echo "<div>=========================<br>"; echo implode(' ; ',$tags); echo "</div>";
        
        $se = new SearchResult;
        $scraped['se'] = $se->Geevv($scraped['title']);
        echo "<div>=========================". $scraped['se']."</div>";
   
        $p->selectItem($mp)->update($scraped);

        $end = (microtime(true));
        $end_m = round(memory_get_peak_usage(true)/1024,2);

        echo "=========================<p> Time: ". round($end-$start,2)."</br>";
        echo "Mem before: ". $start_m."<br>";
        echo "Mem peak: ". $end_m."<br>";
    } 
}
