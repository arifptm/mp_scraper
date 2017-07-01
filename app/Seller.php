<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;

class Seller extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function city()
    {
    	return $this->belongsTo('App\City');
    }
}
