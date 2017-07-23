<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
Use App\Replacer;

class Replacer extends Model
{
    protected $guarded = ['id'];
    protected $table = 'dept_replacers';
    public $timestamps = false;
}
