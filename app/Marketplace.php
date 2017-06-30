<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Feed;

class Marketplace extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function feed()
    {
    	return $this->belongsTo('App\Feed','id');
    }
}
