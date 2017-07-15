<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class PublicController extends Controller
{
	public function index()
	{
		return view('public.index');	
	}
}