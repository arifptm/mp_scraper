<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Seller;
use App\Feed;
use Laravel\Scout\Searchable;

class Item extends Model
{

    use Searchable;
    public $asYouType = true;

    public function toSearchableArray()
    {
        
        $array = $this->toArray();

        return $array;
    }

    protected $guarded = ['id'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function feed()
    {
    	return $this->belongsTo('App\Feed');
    }

    public function seller()
    {
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
