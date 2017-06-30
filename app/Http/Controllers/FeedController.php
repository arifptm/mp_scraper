<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feed;
use App\Marketplace;

class FeedController extends Controller
{
    public function index()
    {
        $feeds = Feed::orderBy('id', 'desc')->paginate(25);
        dd($feeds);
        return view('feed.index', [ 'feeds' => $feeds ]);
    }

    public function create()
    {
        $mps = Marketplace::all();
        foreach ($mps as $key=>$mp) {
            $mpss[$mp->id] = $mp->name;
        }


        return view('feed.create', ['marketplaces' => $mpss ]);
    }

    public function store(Request $request)
    {
        Feed::create($request->all());
        return redirect('/feeds');
    }

    public function edit($id)
    {
        return view('feed.edit', [ 'feed' => Feed::findOrFail($id) ]);
    }

    public function update(Request $request, $id)
    {
        Feed::findOrFail($id)-> update($request->all());
        return redirect('/feeds');
    }

    public function destroy($id)
    {
        Feed::findOrFail($id)->delete();
        return redirect('/feeds');
    }}
