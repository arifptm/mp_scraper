<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Marketplace;

class Feed extends Model
{
    protected $guarded = ['id'];

    public function marketplace()
    {
    	return $this->belongsTo('App\Marketplace');
    }
}
