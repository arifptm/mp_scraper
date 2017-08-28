<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $guarded = ['id'];

	public function setSlugAttribute($val){
    	if ($val == null){
            $slug = new Slug;
            $this->attributes['slug'] = $slug->createSlug($this->attributes['title']);
        } else {
        	$this->attributes['slug']  = $val;
        }
    }

    public function term(){
   		return $this->belongsToMany('App\Term','article_terms','article_id','term_id');
   	}        
    
}
