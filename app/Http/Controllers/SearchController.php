<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Category;



class SearchController extends Controller
{
    public function sc()
	{
		$term = "camera";
		
		$results = array();
		
		$queries = Category::
			where('name', 'LIKE', '%'.$term.'%')
			->take(25)->get();
		
		

		foreach ($queries as $query)
		{
		    $results[] = [ 'value' => $query->id, 'data' => $query->name ];
		}
		return $results;
	}
}
