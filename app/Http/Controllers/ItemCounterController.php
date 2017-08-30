<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\ItemCounter;


class ItemCounterController extends Controller
{
    public function count(){
    	$root = Category::with(['child' => function($query){
    		$query->with('child');
    	}])->whereLevel(0)->get();
    	

    	foreach ($root as $l=>$r){
    		foreach($r->child as $k=>$s){
    			$category[$r->id][] = $s->id;
    			foreach($s->child as $m=>$t){
    			$category[$r->id][] = $t->id;
    			}
    		}
    	}
    	
    	foreach ($category as $k=>$r){
    	 	$item = Item::whereIn('category_id', $r)->count();

    	 	$counter = ItemCounter::firstOrNew(['category_id'=>$k]);
    	 	
    	 	$counter->update(['count'=> $item]);
    	}

        return "OK";

    }
}
