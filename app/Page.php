<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Page;

use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    use Sluggable;
    
    protected $guarded = ['id'];

    public function term(){
    	return $this->belongsToMany('App\Term','page_terms','page_id','term_id');
    }

    public function setSlugAttribute($val){
    	if ($val == null){
            $slug = new Slug;
            $this->attributes['slug'] = $slug->createSlug($this->attributes['title']);
        } else {
        	$this->attributes['slug']  = $val;
        }
    }     
}
