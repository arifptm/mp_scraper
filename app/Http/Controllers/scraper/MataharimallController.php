<?php

namespace App\Http\Controllers\scraper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\Services\Slug;
use \App\Services\SearchResult;
use \App\Services\Scraper;
use \App\Services\TagService;

use App\Item;
use App\Category;
use App\Feed;
use App\Marketplace;
use App\Replacer;
use App\Seller;
use App\City;
use App\Tag;

use JonnyW\PhantomJs\Client;
use Symfony\Component\DomCrawler\Crawler;

class MataharimallController extends Controller
{


    public function scrape(){
    	$start= (microtime(true));
        $start_m = round(memory_get_peak_usage(true)/1024,2);

        $marketplace = $this->getFeedItems('mataharimall');
        
        $scraper = new Scraper;  
        $item = $scraper->selectItem($marketplace);             
        
        $scraped['item_url'] = $item->item_url;
        echo $scraped['item_url'];

        $body = $scraper->getBody($scraped['item_url']);
        if ($body->getStatus() == 404){
        	$item->update(['published'=>0,'checked'=>1]);
        	return 'i got ... 404';
        } else if ($body->getStatus() != 200){
        	return 'failed..try again later';
        }

        $crawler = new Crawler($body->getContent());
        $scraped['title'] = $crawler->filter('h1.c-product__name')->text();

        $item_slug = new Slug;
        $scraped['slug'] = $item_slug->createSlug($scraped['title']);
		
		$cats = $crawler->filter('.c-breadcrumb__body a')->each (function ($node){
             return trim($node->text());
        });        
        $cats = array_slice($cats, 1); // remove beranda
        $scraped['category_id'] = $scraper->getCatId($cats);

        $scraped['sell_price'] = preg_replace('/[^0-9]/','', $crawler->filter('.c-product__discount-price')->text());
        $scraped['raw_price'] = preg_replace('/[^0-9]/','', $crawler->filter('.c-product__price')->text());
        $discount = ($scraped['raw_price'] == '') ? null : (($scraped['raw_price'] - $scraped['sell_price']) / $scraped['raw_price'] )*100;
        $scraped['discount'] = round($discount,0,PHP_ROUND_HALF_UP);

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

        if ($crawler->filter('.c-zoom__thumbnail img')->count()){
        	$images = $crawler->filter('.c-zoom__thumbnail img')->each(function ($node){
        		return $node->attr('src');
        	});        		
        	$scraped['images'] = serialize($images);
        }

        $scraped['body'] = $crawler->filter('#js-tab-descripsi-produk')->count() ? $crawler->filter('#js-tab-descripsi-produk')->html() : null ;
        $scraped['details'] = $crawler->filter('.c-pdp-detail-product__content')->count() ? $crawler->filter('.c-pdp-detail-product__content')->html() : null ;

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
        
        $se = new SearchResult;
        $scraped['se'] = $se->Geevv($scraped['title']);
   
        $scraper->selectItem($marketplace)->update($scraped);

        $end = (microtime(true));
        $end_m = round(memory_get_peak_usage(true)/1024,2);

        echo "<p>Time: ". round($end-$start,2)."</br>";
        echo "Mem before: ". $start_m."<br>";
        echo "Mem peak: ". $end_m."</p>";

        dd($scraped);
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
