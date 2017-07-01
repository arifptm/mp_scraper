<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Marketplace;
use App\Item;

class Feed extends Model
{
    protected $guarded = ['id'];

    public function marketplace()
    {
    	return $this->belongsTo('App\Marketplace');
    }

    public function item()
    {
    	return $this->hasMany('App\Item');
    }
}
