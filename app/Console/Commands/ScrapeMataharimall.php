<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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

class ScrapeMataharimall extends Command
{
    
    protected $signature = 'sc:mm';

    protected $description = 'Scraping Mataharimall';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $start1= (microtime(true));

        $marketplace = $this->getFeedItems('mataharimall'); 

        /**
         *
         * Get Item URL
         *
         */

        $scraper = new Scraper;
        //$scraped['item_url'] = 'https://www.mataharimall.com/aily-setelan-baju-tidur-wanita-3669-navy-5077746.html';
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

        $scraped['title'] = $crawler->filter('h1.c-product__name')->text();
        $item_slug = new Slug;
        $scraped['slug'] = $item_slug->createSlug($scraped['title']);
        

        /**
         *
         * Get Category
         * $cats = array
         *
         */

        $cats = $crawler->filter('.c-breadcrumb__body a')->each (function ($node){
             return trim($node->text());
        });        
        $cats = array_slice($cats, 1); // remove beranda
        $scraped['category_id'] = $scraper->getCatId($cats);
        

        /**
         *
         * Get Price and discount
         *
         */     

        $crawler -> filter('.c-discount-label')->each(function($nodes){
            foreach ($nodes as $node) {
                $node->parentNode->removeChild($node);
            }
        });
    
        $scraped['sell_price'] = preg_replace('/[^0-9]/','', $crawler->filter('.c-product__discount-price')->text());
        $scraped['raw_price'] = preg_replace('/[^0-9]/','', $crawler->filter('.c-product__price')->text());
        $discount = ($scraped['raw_price'] == '') ? null : (($scraped['raw_price'] - $scraped['sell_price']) / $scraped['raw_price'] )*100;
        $scraped['discount'] = round($discount,0,PHP_ROUND_HALF_UP);
        

        /**
         *
         * Hard to get Seller Info
         * Get Seller first then City
         *
         */   
        $city['name'] = $crawler->filter('.c-store__description div')->eq(2)->count() ? trim($crawler->filter('.c-store__description div')->eq(2)->text()) : 'Jakarta MM';
        $city_slug = new Slug;
        $city['slug'] = $city_slug->createSlug($city['name']);
        $city = City::firstOrCreate($city);  

        $seller['name'] = $crawler->filter('.c-store__description .c-store__name')->count() ? trim($crawler->filter('.c-store__description .c-store__name')->text()) : 'MatahariMall.com';
        $seller_slug = new Slug;
        $seller['slug'] = $seller_slug->createSlug($seller['name']);
        $seller['city_id'] = $city->id;
        $seller['marketplace_id'] = $marketplace->id;
        $seller['image_url'] = $crawler->filter('.c-store__image img')->attr('src');
        $seller = Seller::firstOrCreate($seller);
        $scraped['seller_id'] = $seller->id;
       

        /**
         *
         * Get Images
         * if no images, unpublish!
         */ 
        if ($crawler->filter('.c-zoom__thumbnail img')->count()){
            $images = $crawler->filter('.c-zoom__thumbnail img')->each(function ($node){
                return $node->attr('src');
            });             
            $scraped['images'] = serialize($images);
        }


        /**
         *
         * Get Description
         * cleaning first
         */         

        $scraped['body'] = $crawler->filter('#js-tab-descripsi-produk')->count() ? $crawler->filter('#js-tab-descripsi-produk')->html() : null ;
      


        /**
         *
         * Get Details
         * 
         */  

        $scraped['details'] = $crawler->filter('.c-pdp-detail-product__content')->count() ? $crawler->filter('.c-pdp-detail-product__content')->html() : null ;
      


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



    /**
     *
     * Unpublish Item
     * 
     */  
    public function unpublish($item){
        $item->update(['published'=>0,'checked'=>1]);
        return 'Node Unplublished...!';
    }


    public function getFeedItems($marketplace_slug){
        
        $marketplace = Marketplace::whereSlug($marketplace_slug)->first();
        $feed = Feed::whereMarketplace_id($marketplace->id)->whereEnabled(1)->whereProcessed(0);
        if ($feed->count() != 0){
            $selected_feed = $feed->get()->random();
            
            $scraper = new Scraper;
            $scraped = $scraper->letsCurl($selected_feed->url);
    
            $crawler = new Crawler($scraped);
            if ($crawler->filter('.c-card-product a')->count()){
                $nodes = $crawler->filter('.c-card-product a')->each(function($node){
                    return $node->attr('href');
                });
            }

            if (count($nodes) != 0){
                foreach ($nodes as $url) {
                    $item =Item::firstOrNew(['item_url' => $url]);
                    $item->feed_id = $selected_feed->id;
                    $item->save();
                } 
            }
        }       
        return $marketplace;
    }
}        