<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;
use App\Marketplace;

class FeedController extends Controller
{

    public function marketplaces()
    {
        $mps = Marketplace::all();
        foreach ($mps as $key=>$mp) {
            $mpss[$mp->id] = $mp->name;
        }
        return $mpss;
    }


    public function index()
    {
        $feeds = Feed::orderBy('id', 'desc')->paginate(25);      
        return view('admin.feed.index', [ 'feeds' => $feeds ]);
    }

    public function create()
    {
        return view('admin.feed.create', ['marketplaces' => $this->marketplaces() ]);
    }

    public function store(Request $request)
    {
        Feed::create($request->all());
        return redirect('/admin/feeds');
    }

    public function edit($id)
    {
        return view('admin.feed.edit', [ 'feed' => Feed::findOrFail($id), 'marketplaces' => $this->marketplaces() ]);
    }

    public function update(Request $request, $id)
    {
        Feed::findOrFail($id)-> update($request->all());
        return redirect('/admin/feeds');
    }

    public function destroy($id)
    {
        Feed::findOrFail($id)->delete();
        return redirect('/admin/feeds');
    }}
