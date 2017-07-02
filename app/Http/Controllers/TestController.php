<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use App\Feed;
use App\Marketplace;
use App\Item;

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
						return $node->text();
					});   	
	     	
	     	foreach ($urls as $url) {
	     		Item::firstOrCreate(['item_url' => trim($url), 'feed_id' => $mp->feed->first()->id]);
	     	}	

    		Feed::whereId($selected_feed->id)->update(['processed' => 1]);
    	}


    	
    	$selected_item = Item::whereFeed_id($mp->feed->first()->id)->first();
    	$item_url = $selected_item->item_url;
    	$crawler = Goutte::request('GET', $item_url);    	
    	$title = $crawler->filter('h1')->text();
    	
    	echo $title;
    	echo "<br>";
    	echo $item_url;
    }
}
