<?php
namespace App\Services;
use App\Item;
use App\Seller;
use App\City;

class ItemsCity
{
    public function getItemsFromCity($id)
    {
        $sl = City::whereId($id)->first()->seller;
        
        foreach ($sl as $k => $v) {
            $items = Item::whereSeller_id($v->id)->pluck('title');
        }

        return $items;


        // $c1 = array($id);

        // $c2 = Category::whereParent($id)->pluck('id')->toArray();

        // $c3[0] = [0];
        // foreach($c2 as $k=>$v)
        // {
        //     $c3[$k+1] = Category::whereParent($v)->pluck('id')->toArray();
        //     $k++;
        // }
        // $c3 = call_user_func_array('array_merge', $c3);
        // $c3 = array_slice($c3, 1);
        // $cat = array_merge($c1,$c2,$c3);       
        // return $cat;
    }
}    