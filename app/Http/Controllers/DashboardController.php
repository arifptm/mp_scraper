<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class DashboardController extends Controller
{
    public function index(){
    	if (Auth::check()) {
    		return view('admin.index');
    	} else {
    		return redirect('/');
    	}
    }
}
