<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Searched;



class PublicController extends Controller
{
	public function index()
	{		
    	$data['top_search'] = Searched::orderBy('count', 'desc')->take(5)->get();

		return view('toko.index', ['datas'=> $data]);	
	}
}