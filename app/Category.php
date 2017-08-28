<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;
use App\Feed;
use App\ItemCounter;

class Category extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

	public function child()
	{
		return $this->hasMany('App\Category','parent');
	}

	public function parent()
	{
		return $this->belongsTo('App\Category', 'parent');
	}

	public function item()
    {
    	return $this->belongsTo('App\Item');
    }   

    public function counter()
    {
        return $this->hasOne('App\ItemCounter', 'category_id');
    }   

    // function setNameAttribute($val)   
    // {
    // 	$org = Feed::where('department', $val)->first();
    // 	if 
    // 	return $this->org->replacer;
    // }

}
