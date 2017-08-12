<?php

namespace App\Http\Controllers\scraper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Goutte;
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
    public function scrape()
    {

        $p = new Scraper;
        $slug = new Slug;
        $se = new SearchResult;
        $tag_sr = new TagService;

        $mp = $p->feedProcessor('lazada'); //smallcase

        $scraped['item_url'] = $p->selectItem($mp)->item_url;
        //$scraped['item_url'] = 'https://www.lazada.co.id/alba-jam-tangan-pria-tali-stainless-steel-silver-gold-av3512x1-13927493.html'; //normal
        //$scraped['item_url'] = 'http://www.lazada.co.id/ray-ban-sunglasses-scuderia-ferrari-collection-rb2448mf-matteblack-f61430-size-53-silver-36247532.html'; // no location
        // $scraped['item_url'] = 'http://www.lazada.co.id/moto-e4-2gb16gb-abu-abu-metal-jbl-c100si-in-ear-headphones-35536623.html'; //by lazada

        $client = Client::getInstance();
        $client -> getEngine()->setPath(env('PHANTOMJS_PATH'));
        $request = $client->getMessageFactory()->createRequest($scraped['item_url']);
        $response = $client->getMessageFactory()->createResponse();        
        $client->send($request,$response);        
        $crawler = new Crawler($response->getContent());
        
        $scraped['title']= trim(str_limit($crawler->filter('h1#prod_title')->text(),190,''));
        
        $scraped['slug'] = $slug->createSlug($scraped['title']);

        $cats = $crawler->filter('.breadcrumb__list a')->each (function ($node){
             return trim($node->text());
        });    
        
        //$cats = array_slice($cats, 1); //karena gak ada beranda
        $scraped['category_id'] = $p->getCatId($cats);
        
        $scraped['sell_price'] = $crawler->filter('#product_price') ? preg_replace('/[^0-9]/','', $crawler->filter('#product_price')->text()) : null;
        $price_ori = $crawler->filter('.price_erase') ? preg_replace('/[^0-9]/','', $crawler->filter('.price_erase')->text()) : null;
        if ($price_ori != $scraped['sell_price']){
            $scraped['raw_price'] = $price_ori;
            $discount = (($scraped['raw_price'] - $scraped['sell_price']) / $scraped['raw_price'] )*100;
            $scraped['discount'] = round($discount,0,PHP_ROUND_HALF_UP);            
        }
    
        $sku = $crawler->filter('#pdtsku') ? explode('-',$crawler->filter('#pdtsku')->text())[0] : null;  //dapetin sku    
        $id_seller_json = json_decode(file_get_contents('https://www.lazada.co.id/ajax/ask/questionsSegmented?sku='.$sku));
        $seller['name'] = $id_seller_json->data->pdpSeller->name;
        $seller['slug'] = $slug->createSlug($seller['name']);
       $seller['marketplace_id'] = $mp->id;
        $seller['image_url'] = $id_seller_json->data->pdpSeller->image;

        $seller_id = $id_seller_json->data->pdpSeller->id;
        
        if ($seller_id != 0){
            $detail_seller_json = json_decode(file_get_contents('https://seller-transparency-api.lazada.co.id/v1/seller/'.$seller_id.'/transparency'));
            $city['name'] = $detail_seller_json->seller->location;
        } else {
            $city['name'] = 'Jakarta';
        }        

        $city['slug']   = $slug->createSlug($city['name']);
        $city = City::firstOrCreate($city);
                
        $seller['city_id'] = $city->id;
        
        $seller = Seller::firstOrCreate($seller);
        $scraped['seller_id'] = $seller->id;

        $img = $crawler->filter('.prd-moreImages li div div.productImage img');
            $imgs = $img->each (function ($node){
                return trim($node->attr('src'));
            });
            
        $scraped['images'] = serialize($imgs);

        $crawler -> filter('#flix-inpage, .product-description__title, .product-description__webyclip-thumbnails, .product-description__inbox')->each(function($nodes){
            foreach ($nodes as $node) {
                $node->parentNode->removeChild($node);
            }
        });
        
        $body1 = $crawler->filter('.product-description__block[data-component=product-description]')->html();
        $body2 = $crawler->filter('table.specification-table')->count() ? '<table class="table table-responsive table-bordered">'.$crawler->filter('table.specification-table')->html().'</table>' : '';
        $body = $body1.'<br>'.$body2;

        $clr = '/<([^>\s]+)[^>]*>(?:\s*(?:<br \/>|&nbsp;|&thinsp;|&ensp;|&emsp;|&#8201;|&#8194;|&#8195;)\s*)*<\/\1>/m';
        
        $body = preg_replace($clr, '', $body);
        $body = trim($body);
        $scraped['body'] = str_replace('\n','', $body);

        $details = $crawler->filter('.prod_details')->count() ? $crawler->filter('.prod_details')->html() : null;

        $scraped['details'] = str_replace('\n','', $details);
    
        $scraped['processed'] = 1 ;
        $scraped['views'] = (rand(10,100));  

        $tags = $tag_sr->createTag($scraped['title']);
        foreach($tags as $t){
            $tag['name'] = $t;
            $tag['slug'] = $slug->createSlug($t);

            $save_tag = Tag::firstOrCreate($tag);
            $save_tag->save();
            $tag_id[] = $save_tag->id;
        }

        $scraped['tags'] = serialize($tag_id);
        
         $scraped['se'] = $se->Geevv($scraped['title']);
   
        // $city -> save();
        // $seller ->save();
        $p->selectItem($mp)->update($scraped);

         dd($scraped);  

    } 
}
