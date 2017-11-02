<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Feed;
use Cviebrock\EloquentSluggable\Sluggable;

class Marketplace extends Model
{
	use Sluggable;
	public function sluggable(){ return [ 'slug' => ['source' => 'name']];}

    protected $guarded = ['id'];
    public $timestamps = false;

    public function feed()
    {
    	return $this->hasMany('App\Feed');
    }
}
