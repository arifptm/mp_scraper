<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Goutte;
use App\Marketplace;
use App\Feed;

class LinkCheckerController extends Controller
{
    
	public function checker($link)
	{

		Goutte::request('GET', $link);
		if( Goutte::getResponse()->getStatus() == 404 )
		{
			$so = Item::update(['soldout'=>1]);
		}
		
	}

    public function run($slug)
    {
        $k = Marketplace::with('feed.item')->whereSlug($slug)->get();
        //dd($k);

        foreach ($k as $t){
        	foreach ($t->feed as $u){
        		foreach ($u->item as $key => $w) {
        			$x[$key] = $this->checker($w->item_url);
        			if ($key == 1 )
        			{
        				break;
        			}
        		}
        	}
        }
        dd($x);

        //$this->checker($l->item_url);
        
        //return view ('admin.item.index', ['items'=> $p]);
    }
}
