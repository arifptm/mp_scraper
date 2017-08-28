<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\Slug;

class Term extends Model
{

	protected $fillable = ['vocabulary_id','name','slug','sort'];
    public $timestamps = false;  

    public function vocabulary(){
    	return $this->belongsTo('App\Vocabulary');
    }   

    public function setSlugAttribute($val){
    	if ($val == null){
            $slug = new Slug;
            $this->attributes['slug'] = $slug->createSlug($this->attributes['name']);
        } else {
        	$this->attributes['slug']  = $val;
        }
    } 


}
