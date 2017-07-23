<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Marketplace;
use App\Feed;

class LinkCheckerController extends Controller
{
    
	public function checker($nodes)
	{
        $curl_arr = array();
        $master = curl_multi_init();

        foreach ($nodes as $i=>$url)
        {
            $curl_arr[$i] = curl_init($url);
            curl_setopt($curl_arr[$i], CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl_arr[$i], CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl_arr[$i], CURLOPT_NOBODY, true);
            curl_multi_add_handle($master, $curl_arr[$i]);
        }

        do {
            curl_multi_exec($master,$running);
        } while($running > 0);        
        
        foreach($nodes as $i=>$url)
        {
            $results[$url] = curl_getinfo  ( $curl_arr[$i], CURLINFO_HTTP_CODE  );
        }        
        
        return $results;
	}


    public function run($slug)
    {
        $mk = Marketplace::with(['feed.item' => function($query){
            $query->where('checked', '=', 0)->where('title','!=', null )->where('sold_out','!=','1');
        }])->whereSlug($slug)->first();
        foreach($mk->feed as $feed){
            foreach ($feed->item as $item) {
                $i[$item->category_id] = $item->item_url;
            }
        }
        
        dd()

        $i = array_slice($i, 0, 20);
        
        foreach($this->checker($i) as $key=>$status){
            $so = Item::whereItem_url($key)->first();
            
            if($status == 404){                
                $so->update(['sold_out'=> 1, 'checked' => 1]);
                echo $status." | ".$so->id." | ".$so->item_url."<br>";
            } else {
                $so->update(['checked' => 1]);
                echo $status." | ".$so->id." | ".$so->item_url."<br>";
            }

        }

    }
}








