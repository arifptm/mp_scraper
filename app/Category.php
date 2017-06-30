<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Feed;
use App\Item;

class Category extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

	public function item()
    {
    	return $this->belongsToMany('App\Item');
    }    
}
