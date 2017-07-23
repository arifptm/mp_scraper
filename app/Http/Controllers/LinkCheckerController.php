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


    public function yetAll($slug)
    {
        $all = array();
        $al = Marketplace::with(['feed.item' => function($query){
            $query->where('title','!=', '' )->where('sold_out','!=','1');
        }])->whereSlug($slug)->first();

        foreach ($al->feed as $feed)
        {
            foreach ($feed->item as $items)
            {
                $all[] = $items->id;
            }
        }        
        
        return $all;  
    }
    
    public function yetChecked($slug)
    {

        $yet= array();

        $ye = Marketplace::with(['feed.item' => function($query){
            $query->where('checked', '=', 0)->where('title','!=', '' )->where('sold_out','!=','1');
        }])->whereSlug($slug)->first();
        
        foreach($ye->feed as $feed)
        {
            foreach ($feed->item as $item) {
                $yet[$item->id] = $item->item_url;
            }
        }

        return $yet;   
    }

    public function yetStat($slug)
    {
        $all = $this->yetAll($slug) ;
        $yet = $this->yetChecked($slug);
        return view('admin.linkchecker.index', ['all' => $all, 'yet' => $yet]);
    }
 
    public function run($slug)
    {
        $all = $this->yetAll($slug) ;

        $yet = $this->yetChecked($slug);

        if(count($yet) == 0)
        {
            $all = $this->yetAll($slug);
            $to_reset = Item::whereIn('id', $all);
            $to_reset->update(['checked' => 0]);
            return view('admin.linkchecker.index', ['msg' => 'LinkCheck Completed ...!']);
        }

        
        $i = array_slice($yet, 0, 5);    
             
        $s404[] = array();
        $s200[] = array();       
        foreach($this->checker($i) as $key=>$status){
            $so = Item::whereItem_url($key)->first();

            if($status == 404){                
                $so->update(['sold_out'=> 1, 'checked' => 1]);
                $s404[] = $so;
            } else {
                $so->update(['checked' => 1]);
                $s200[] = $so;
            }            
        }

        return view('admin.linkchecker.index', ['all' => $all, 'yet' => $yet, 's404'=> $s404, 's200'=>$s200, 'msg' => 'LinkCheck Completed ...!']);  
    }
}