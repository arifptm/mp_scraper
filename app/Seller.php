<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;

use Cviebrock\EloquentSluggable\Sluggable;

class Seller extends Model
{
	use Sluggable;
	public function sluggable(){ return [ 'slug' => ['source' => 'name']];}
    
    protected $guarded = ['id'];
    public $timestamps = false;

    public function city(){
    	return $this->belongsTo('App\City');
    }

    public function item(){
    	return $this->hasMany('App\Item');
    }
}
