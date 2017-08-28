<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Response;
use Illuminate\Support\Facades\Input;

class RedirectController extends Controller
{
    public function gotopage($slug){
    	$item_url = Item::whereSlug($slug)->first()->item_url;
    	return Response::make( '', 302 )->header( 'Location', $item_url );
    }

    public function redirect(){
    	$url = Input::get('url');
    	return Response::make( '', 302 )->header( 'Location', $url );
    }

}
