<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Category;
use File;



class SearchController extends Controller
{
    public function sc()
	{
		$term = "a";
		
		$results = array();
		
		$queries = Category::
			where('name', 'LIKE', '%'.$term.'%')
			->take(7)->get();
		
		

		foreach ($queries as $query)
		{
		    $results[] = [ 'value' => $query->slug, 'data' => $query->name ];
		}
		$d = Response::json(['suggestions' => $results])->getContent();
	  	File::put(public_path('suggest.json'),$d);
	}
}
