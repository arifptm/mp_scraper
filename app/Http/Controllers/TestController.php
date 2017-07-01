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
    	$mp = Marketplace::whereName('bukalapak')->first(); 
    	
    	$feed = Feed::where('marketplace_id', $mp->id)->whereEnabled('15');
    	$feed_had_proc	= $feed->whereProcessed('1');
    	$feed_yet_proc	= $feed->whereProcessed('0');

    	if ($feed_yet_proc->count() == 0)
    	{
    		$feed_had_proc->update( ['processed' => 0] );
    		return;
    	}






  //   	$item_will_processed = $feed->random();

  //   	dd($item_will_processed);

  //    	$crawler = Goutte::request('GET', $item_will_processed->url);
    	
  //    	$urls = $crawler->filter('item > guid')->each (function ($node){
		// 	return $node->text();
		// });
  //   	foreach ($urls as $url) {
  //   		Item::firstOrCreate(['item_url' => trim($url), 'feed_id' => $item_will_processed->id]);
  //   	}
  //   	$item_will_processed->update(['processed' => 1]);
    	
    }
}
