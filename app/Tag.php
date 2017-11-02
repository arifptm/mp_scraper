<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
	use Sluggable;
	public function sluggable(){ return [ 'slug' => ['source' => 'name']];}    

	protected $guarded = ['id'];
    public $timestamps = false;    
}
