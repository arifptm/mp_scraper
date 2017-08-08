<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Marketplace;
use App\Seller;
use App\Feed;
use App\Tag;
use Laravel\Scout\Searchable;

class Item extends Model
{

    use Searchable;
    protected $guarded = ['id'];    

    public $asYouType = true;
   
    public function toSearchableArray()
    {
        return [
        'id'=> $this->id,
        'title'=> $this->title,
        'details'=> $this->details
        ];
    }

    public function getImagesAttribute($val)
    {
        $imgs = unserialize($val);
        //bukalapak
        $images['node'] = str_replace('/m-1000-1000/', '/s-300-300/', $imgs);
        $images['teaser'] = str_replace('/m-1000-1000/', '/s-240-240/', $imgs);
        $images['thumb'] = str_replace('/m-1000-1000/', '/s-50-50/', $imgs);

        //tokopedis
        $images['teaser'] = str_replace('/img/product-1/', '/img/cache/300-square/product-1/', $images['teaser']);
        $images['node'] = str_replace('/img/product-1/', '/img/cache/300-square/product-1/',  $images['node']);
        $images['thumb'] = str_replace('/img/product-1/', '/img/cache/100-square/product-1/',  $images['thumb']);

        return $images;
    }

    public function getTagsAttribute($val)
    {
        if ($val != '')
        {
            $tags = unserialize($val);
            $t = Tag::whereIn('id', $tags)->get();            
            return $t;
        }    
    }


    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function feed()
    {
    	return $this->belongsTo('App\Feed');
    }

    public function seller(){
    	return $this->belongsTo('App\Seller');
    }

    public function getSellPriceAttribute($v)
    {
        return number_format($v,0,",",".");
    }

    public function getRawPriceAttribute($v)
    {
        if($v != 0)
        {
            return number_format($v,0,",",".");
        }
    }
}
