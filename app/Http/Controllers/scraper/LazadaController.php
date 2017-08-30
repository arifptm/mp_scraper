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
    public function unpublish($item){
        $item->update(['published'=>0,'checked'=>1]);
        return 'Node Unplublished...!';
    }

    public function feedProcessor($mk_slug){
        $mp = Marketplace::whereSlug($mk_slug)->first();        
        $feed = Feed::where('marketplace_id', $mp->id)->whereEnabled('1')->whereProcessed('0');

        if ($feed->count() != 0){
            $selected_feed = $feed->get()->random();

            $crawler = Goutte::request('GET', $selected_feed->url);     
            if ( $crawler->filter('.product_list .product-card')->count()) {
                $urls = $crawler->filter('.product_list .product-card')->each (function ($node){
                    return $node->attr('data-original');
                });
            } elseif ($crawler->filter('.c-product-card__description a.c-product-card__name')->count()){ 
                $urls = $crawler->filter('.c-product-card__description a.c-product-card__name')->each (function ($node){
                    $itm = $node->attr('href');
                    $itm = explode('?ff=', $itm)[0];
                    return 'http://www.lazada.co.id'.$itm;
                });
            }     

            foreach ($urls as $url) {
                $item =Item::firstOrNew(['item_url' => $url]);
                $item['feed_id'] = $selected_feed->id;
                $item->save();
            }
            Feed::whereId($selected_feed->id)->update(['processed' => 1]);
        }   
        return $mp;
    }

   


    public function scrape(){

        $start1= (microtime(true));

        $marketplace = $this->feedProcessor('lazada'); 

        /**
         *
         * Get Item URL
         *
         */
        $scraper = new Scraper;
        $scraped['item_url'] = $scraper->selectItem($marketplace)->item_url;
        echo $scraped['item_url']."\n";

        $body = $scraper->getBodyPhantom($scraped['item_url']);
        if ($body->getStatus() == 404){
            $this->unpublish($scraped);
        } else if ($body->getStatus() != 200){
            return 'failed..try again later';
        } 

        $crawler = new Crawler($body->getContent());

        /**
         *
         * Get Title and slug
         *
         */
        $scraped['title']= trim(str_limit($crawler->filter('h1#prod_title')->text(),190,''));                
        $item_slug = new Slug;
        $scraped['slug'] = $item_slug->createSlug($scraped['title']);
        

        /**
         *
         * Get Category
         * $cats = array
         *
         */
        $cats = $crawler->filter('.breadcrumb__list a')->each (function ($node){
             return trim($node->text());
        });
        //$cats = array_slice($cats, 1); // gak perlu slice, karena gak ada beranda
        $scraped['category_id'] = $scraper->getCatId($cats);
        

        /**
         *
         * Get Price and discount
         *
         */        
        $scraped['sell_price'] = $crawler->filter('#product_price') ? preg_replace('/[^0-9]/','', $crawler->filter('#product_price')->text()) : null;
        
        $price_ori = $crawler->filter('.price_erase') ? preg_replace('/[^0-9]/','', $crawler->filter('.price_erase')->text()) : null;
        
        if ($price_ori != $scraped['sell_price']){
            $scraped['raw_price'] = $price_ori;
            $discount = (($scraped['raw_price'] - $scraped['sell_price']) / $scraped['raw_price'] )*100;
            $scraped['discount'] = round($discount,0,PHP_ROUND_HALF_UP);
        }
        

        /**
         *
         * Hard to get Seller Info
         * Get Seller first then City
         *
         */         
        $sku = $crawler->filter('#pdtsku') ? explode('-',$crawler->filter('#pdtsku')->text())[0] : null;  //dapetin sku    
        $url_sku = "https://www.lazada.co.id/ajax/ask/questionsSegmented?sku=".$sku;
        $client_sku = new Scraper;
        $craw_sku = $client_sku->letsCurl($url_sku);
        
        $id_seller_json = json_decode($craw_sku);
        dd($id_seller_json);

        $seller['name'] = $id_seller_json->data->pdpSeller->name;
        dd($seller['name']);
        $seller_slug = new Slug;
        $seller['slug'] = $seller_slug->createSlug($seller['name']);
        $seller['marketplace_id'] = $marketplace->id;
        $seller_img = $id_seller_json->data->pdpSeller->image;
        $seller['image_url'] = ($seller_img != null) ? $seller_img : 'http://static.99toko.com/default_shop.png';

        $seller_id = $id_seller_json->data->pdpSeller->id;        
        if ($seller_id != 0){
            $detail_seller_json = json_decode($scraper->letsCurl('https://seller-transparency-api.lazada.co.id/v1/seller/'.$seller_id.'/transparency'));
            $city['name'] = $detail_seller_json->seller->location;
        } else {
            $city['name'] = 'Jakarta';
        }        

        $city_slug = new Slug;
        $city['slug']   = $city_slug->createSlug($city['name']);
        $city = City::firstOrCreate($city);
        $seller['city_id'] = $city->id;        

        $seller = Seller::firstOrCreate($seller);
        $scraped['seller_id'] = $seller->id;
        

        /**
         *
         * Get Images
         * if no images, unpublish!
         */ 
        $img = $crawler->filter('.prd-moreImages .productImage');
        if ($img->count() == 0){
            $this->unpublish($scraped);
        } else {
            $imgs = $img->each (function ($node){
                return trim($node->attr('data-image'));
            });        
            $scraped['images'] = serialize($imgs);
        }


        /**
         *
         * Get Description
         * cleaning first
         */         

        $crawler -> filter('.more-desc-button, #flix-inpage, .product-description__title, .product-description__webyclip-thumbnails, .product-description__inbox, noscript')->each(function($nodes){
            foreach ($nodes as $node) {
                $node->parentNode->removeChild($node);
            }
        });
        
        $body1 = $crawler->filter('.product-description__block[data-component=product-description]')->html();
        $body1 = $scraper->clearStyle($body1);
        $body1 = str_replace('productlazyimage','img-responsive', $body1);
        $body1 = str_replace('data-original','src', $body1);
        $body2 = $crawler->filter('table.specification-table')->count() ? '<table class="table table-responsive table-bordered">'.$crawler->filter('table.specification-table')->html().'</table>' : '';
        $body = $body1.'<br><br>'.$body2;

        $clr = '/<([^>\s]+)[^>]*>(?:\s*(?:<br \/>|&nbsp;|&thinsp;|&ensp;|&emsp;|&#8201;|&#8194;|&#8195;)\s*)*<\/\1>/m';
        
        $body = preg_replace($clr, '', $body);
        $body = $scraper->clearStyle($body);
        $scraped['body'] = trim($body);
        


        /**
         *
         * Get Details
         * 
         */  

        $details = $crawler->filter('.prod_details')->count() ? $crawler->filter('.prod_details')->html() : null;        
        $scraped['details'] = $scraper->clearStyle($details);
        


        /**
         *
         * Give random view, flag as processed
         * 
         */  

        $scraped['processed'] = 1 ;
        $scraped['views'] = (rand(15,35));  




        /**
         *
         * Create TAG for AutoComplete
         * 
         */ 
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
        


        /**
         *
         * Grab for SE
         * 
         */         
        $start2= (microtime(true)); //measure time for debug
        $se = new SearchResult;
        $scraped['se'] = $se->Geevv($scraped['title']);
   
        $scraper->selectItem($marketplace)->update($scraped); // FINALLY SAVE IT !

        $end = (microtime(true));
        $t1 = $start2 - $start1;
        $t2 = $end - $start2;

        echo "Scrape = ".round($t1,2)."\n"."Search = ".round($t2,2);
    }
}
