<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
	protected $fillable = ['name','slug','sort'];
    public $timestamps = false;  

    public function term(){
    	return $this->hasMany('App\Term');
    }
}
