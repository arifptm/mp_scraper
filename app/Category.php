<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

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
		return $this->belongsTo('App\Category');
	}

	public function item()
    {
    	return $this->belongsTo('App\Item');
    }    
}
