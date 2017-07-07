<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Seller;
use App\Feed;
use App\Category;

class ItemController extends Controller
{
    public function sellers()
    {
        $sls = Seller::all();
        foreach ($sls as $key=>$sl) {
            $slss[$sl->id] = $sl->name;
        }
        return $ctss;
    }

    public function index()
    {
        return view('item.index', [ 'items' => Item::orderBy('title', 'desc')->paginate(20) ]);
    }

    public function show($id)
    {
    	$item = Item::find($id);
        $images = explode("|", $item->images);
        $fi = str_replace("/rawimage/", "/m-".config('node_image_hsize')."-".config('node_image_vsize')."/", $images[0]);

        $thumbs = str_replace("/rawimage/", "/s-".config('thumbsize')."-".config('thumbsize')."/", $images);
    	
        return view('item.show', [ 'item' => $item, 'thumbs' => $thumbs, 'full_image' => $fi ]);
    }


    public function create()
    {
        return view('item.create');
    }


    public function store(Request $request)
    {
        Seller::create($request->all());
        return redirect('/sellers');
    }

    public function edit($id)
    {
        return view('seller.edit', [ 'seller' => Seller::findOrFail($id), 'cities' => $this->cities() ]);
    }

    public function update(Request $request, $id)
    {
        Seller::findOrFail($id)-> update($request->all());
        return redirect('/sellers');
    }

    public function destroy($id)
    {
        Seller::findOrFail($id)->delete();
        return redirect('/sellers');
    }
}
