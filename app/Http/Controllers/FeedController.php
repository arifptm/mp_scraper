<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;
use App\Marketplace;

class FeedController extends Controller
{





///////////// ADMIN

    public function index(){
        $feeds = Feed::orderBy('id', 'desc')->simplePaginate(25);      
        return view('admin.feed.index', [ 'feeds' => $feeds ]);
    }

    public function create(){
        $ms = Marketplace::pluck('name','id');
        return view('admin.feed.create', ['marketplaces' => $ms ]);
    }

    public function store(Request $request){
        //dd($request->all());
        Feed::create($request->all());
        return redirect('/admin/feeds');
    }

    public function edit($id){
        $fs = Feed::findOrFail($id);
        $ms = Marketplace::pluck('name','id');
        return view('admin.feed.edit', [ 'feed' => $fs , 'marketplaces' => $ms ]);
    }

    public function update(Request $request, $id){
        $req = $request->all();
        Feed::findOrFail($id)->update($req);
        return redirect('/admin/feeds');
    }

    public function destroy($id){
        Feed::findOrFail($id)->delete();
        return redirect('/admin/feeds');
    }}
