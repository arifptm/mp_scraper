<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use App\Feed;
use App\Marketplace;
use App\Item;
use App\Category;
use App\Seller;
use App\City;
use \App\Services\Slug;
use \App\Services\SearchResult;

class TestController extends Controller
{
    public function index()
    {
   	$crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
    $crawler->filter('.result__title .result__a');
    dd($crawler->first());
    }

    public function t1()
    {
    	//echo date('m/d/Y h:i:s a', time())." - ";
    	$input = "bukalapak";
    	$mp = Marketplace::whereName($input)->first(); 
    	
    	$feed = Feed::where('marketplace_id', $mp->id)
    	->whereEnabled('1')
    	->whereProcessed('0');

   		if ($feed->count() != 0)
    	{
    		$selected_feed = $feed->get()->random();
    		$crawler = Goutte::request('GET', $selected_feed->url);
      		$urls = $crawler->filter('item > guid')->each (function ($node){
						return trim($node->text());
					});   	

	     	foreach ($urls as $url) {
	     		$d = Item::firstOrCreate(['item_url' => trim($url), 'feed_id' => $selected_feed->id]);
	     	}	

    		Feed::whereId($selected_feed->id)->update(['processed' => 1]);
    	}


    	
    	$selected_item = Item::whereFeed_id($mp->feed->first()->id)->first();
    	
    	$item_url = $selected_item->item_url;
    	
    	$scraped['item_url'] = $item_url;
    	
    	$crawler 	= Goutte::request('GET', $item_url);
    	
    	$scraped['title']= $crawler->filter('h1')->text();

    	$slug = new Slug;
    	$scraped['slug'] = $slug->createSlug($scraped['title']);

    	$cats = $crawler->filter('ul.c-breadcrumb a')->each (function ($node){
			return trim($node->text());
		});

		$cats = array_slice($cats, 1);
		
        $depth0 = null;
        foreach ($cats as $key=>$cat)
        {
            $key1 = $key+1;
            ${'depth'.$key1} = Category::firstOrCreate(['name' => $cat, 'level' => $key, 'parent' => ${'depth'.$key}['id'] ]);
            ${'depth'.$key1} -> save();
            $categories_id[] = ${'depth'.$key1}->id;
        }    
                
      	$scraped['categories'] = json_encode($categories_id);

		if (($crawler->filter('.c-product-detail-price__original .amount') === true ) AND ($crawler->filter('.c-product-detail-price__reduced .amount') === true )){
			$scraped['raw_price'] = preg_replace("/[^0-9]/","",$crawler->filter('div.c-product-detail-price__original .amount')->text());
			$scraped['sell_price'] = preg_replace("/[^0-9]/","",$crawler->filter('div.c-product-detail-price__reduced .amount')->text());
			$scraped['discount'] = (($scraped['raw_price'] - $scraped['sell_price']) / $scraped['raw_price'] )*100;
			$item_discount = round($discount,0,PHP_ROUND_HALF_UP);	
		} else {
			$scraped['sell_price'] = preg_replace("/[^0-9]/","",$crawler->filter('div.c-product-detail-price .amount')->text());
			$scraped['raw_price'] = "";
			$scraped['discount'] = "";	
		}   

		$seller_city = trim($crawler->filter('.c-user-identification .qa-seller-location')->text());
		$city = City::firstOrCreate(['name' => $seller_city]);
		$city ->save();


		$seller['name']= trim($crawler->filter('.c-user-identification .qa-seller-name')->text());
		$seller['image_url'] = $crawler->filter('.c-user-identification img.c-avatar__image')->attr('src') ?: "https://ecs12.tokopedia.net/newimg/cache/100-square/default_v3-shopnophoto.png";
		
		$seller['marketplace_id'] = $mp->id;



		$seller['city_id'] = $city->id;
		$seller = Seller::firstOrCreate($seller);
		$seller ->save();


		
		$scraped['seller_id'] = $seller->id;
		
		

		$crawler -> filter('.qa-pd-description a, .qa-pd-description span, .qa-pd-description img')->each(function($nodes){
			foreach ($nodes as $node) {
        		$node->parentNode->removeChild($node);
    		}
		});

		$scraped['body'] = trim($crawler->filter('.qa-pd-description')->html());

		
		$details = $crawler->filter('.c-product-spec dt, .c-product-spec dd')->each(function($node, $key){
			$odd = $key%2;
				if($odd == 1){
					return "<dt>".trim($node->text())."</dt>";
				} else {
					return "<dd>".trim($node->text())."</dd>";
				}	
		});

		$scraped['details'] = "<dl>".implode($details)."</dl>";
		
		$se = new SearchResult;
    	$scraped['se'] = $se->Geevv('metal');

    	$scraped['processed'] = 1 ;


    	$selected_item->update($scraped);
		

 	    	
    	
    }
}
