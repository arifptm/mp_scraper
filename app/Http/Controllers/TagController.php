<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Response;

class TagController extends Controller
{
 	public function autocomplete(){
 		$tags = Tag::where('id','<',10000)->get(['name']);
 		return response()->json($tags);
	}
}
