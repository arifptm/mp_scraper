<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seller;

use Cviebrock\EloquentSluggable\Sluggable;

class City extends Model
{
	use Sluggable;
    public function sluggable(){ return [ 'slug' => ['source' => 'name']];}



    protected $guarded = ['id'];
    public $timestamps = false;

    public function seller()
    {
    	return $this->hasMany('App\Seller');
    }
}
