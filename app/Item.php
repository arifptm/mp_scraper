<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Seller;
use App\Feed;

class Item extends Model
{
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
        return "Rp.".number_format($v,0,",",".");
    }

    public function getRawPriceAttribute($v)
    {
        if($v != 0)
        {
            return "Rp.".number_format($v,0,",",".");
        }
    }
}
