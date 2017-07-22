<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replacer extends Model
{
    protected $guarded = ['id'];
    protected $table = 'dept_replacers';
    public $timestamps = false;
}
