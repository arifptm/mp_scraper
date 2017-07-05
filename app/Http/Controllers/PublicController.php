<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class PublicController extends Controller
{
	public function index()
	{
		$sc = Category::whereParent(null)->get();
		
		return view('public.index', [ 'categories' => $sc]);
	}
}