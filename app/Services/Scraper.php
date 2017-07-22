<?php
namespace App\Services;
use App\Item;
use App\Category;
use App\Feed;
use App\Marketplace;
use App\Replacer;
use Goutte;

class Scraper
{
	public function feedProcessor($mk_slug)
	{
		$mp = Marketplace::whereSlug($mk_slug)->first(); 
    	
    	$feed = Feed::where('marketplace_id', $mp->id)
    	->whereEnabled('1')
    	->whereProcessed('0');

   		if ($feed->count() != 0)

    	{
    		$selected_feed = $feed->get()->random();

    		$crawler = Goutte::request('GET', $selected_feed->url);
      		
            if ($mp->slug == "bukalapak"){

                $urls = $crawler->filter('item > guid')->each (function ($node){
    						return trim($node->text());
    					});   	

    	     	foreach ($urls as $url) {
    	     		$url = str_replace('/m.bukalapak','/www.bukalapak', $url); // special bukalapak
                    $url = trim($url);
                    Item::firstOrCreate(['item_url' => $url, 'feed_id' => $selected_feed->id]);
    	     	}	
            } 

            if ($mp->slug == "tokopedia"){                
                $crawler = json_decode(file_get_contents($selected_feed->url));
                foreach ($crawler->data->products as $item){
                    Item::firstOrCreate(['item_url' => $item->url, 'feed_id' => $selected_feed->id]);
                }                    
            }


    		Feed::whereId($selected_feed->id)->update(['processed' => 1]);
    	}
    	return $mp;
	}	















	public function selectItem($mp)
	{
	    $select = Item::whereIn('feed_id', $mp->feed->pluck('id') )
            ->whereProcessed(0)
            ->get();
            
        if ($select->count() != 0 )    
        {
        	$selected_item = $select->random();
        	return $selected_item;
        } else {
        	Feed::whereMarketplace_id($mp->id)->update(['processed' => 0]);
        	return "$mp->name Feed Reset";
        }
    	
    }

    public function getCatId($cats)
    {
    	$depth0 = null;
        foreach ($cats as $key=>$cat)
        {
            $key1 = $key+1;
            //$rep = Feed::where('department',$cat)->first();
            $rep = Replacer::whereDepartment($cat)->whereLevel($key)->first();
            if (count($rep) != 0)
            {
                $cat = $rep->replacer;               
            }            

            $slug = new Slug;
            $cat_slug = $slug -> createSlug($cat);

            ${'depth'.$key1} = Category::firstOrCreate([
                'name' => $cat, 
                'level' => $key, 
                'parent' => ${'depth'.$key}['id'],
                'slug' => $cat_slug ]);
            
            ${'depth'.$key1} -> save();
        }      
        return ${'depth'.$key1}->id;
    }
    	
}