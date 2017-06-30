<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seller;

class City extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function seller()
    {
    	return $this->belongsToMany('App\Seller');
    }
}
