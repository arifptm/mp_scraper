<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\City;
use App\Seller;
use App\Feed;
use App\Category;
use \App\Services\ItemsCategory;
use \App\Services\ItemsCity;

class ItemController extends Controller
{
    public function itemByCity( $id = null )
    {
        return view('public.item.item_by', ['items' => 'aaa']);
    }

    public function itemBySeller( $slug = null )
    {
        $sid = Seller::where('slug', $slug)->first();
        $it = Item::whereSeller_id($sid->id)->get();
        
        return view('public.item.item_by', ['items' => $it ]);   
    }

    public function itemByCategory( $id = null )
    {
        return view('public.item.item_by', ['items' => 'aaa']);
    }
   











    public function sellers()
    {
        $sls = Seller::all();
        foreach ($sls as $key=>$sl) {
            $slss[$sl->id] = $sl->name;
        }
        return $ctss;
    }

    public function cityList($id)
    {
        $sl = City::whereId($id)->first()->seller;
        
        foreach ($sl as $k => $v) {
            $items = Item::whereSeller_id($v->id)->get();
        }
         $all = $items->where('title', '!=', '')->count();
        return view('item.index', ['items'=> $items, 'all' => $all ]);
    }



    
    public function itemsList( $id = null )
    {
        $items = Item::orderBy('title', 'desc');
        if ($id != null)
        {
            $i = new ItemsCategory;
            $j = $i -> getItemFromCategory($id);
            $items = Item::whereIn('category_id', $j);
        }
        $all = $items->where('title', '!=', '')->count();
        return view('item.index', [ 'items' => $items->paginate(20), 'all' => $all]);
    }



    public function show($id)
    {
    	$item = Item::find($id);
        $images = explode("|", $item->images);
        $fi = str_replace("/rawimage/", "/m-".config('node_image_hsize')."-".config('node_image_vsize')."/", $images[0]);

        $thumbs = str_replace("/rawimage/", "/m-".config('thumb_hsize')."-".config('thumb_vsize')."/", $images);
    	$item->update(['views' => $item->views+1]);
        return view('item.show', [ 'item' => $item, 'thumbs' => $thumbs, 'full_image' => $fi ]);
    }

    

    public function publicShow($id)
    {
        $item = Item::whereSlug($id)->first();
        $images = explode("|", $item->images);
        $fi = str_replace("/rawimage/", "/m-".config('node_image_hsize')."-".config('node_image_vsize')."/", $images[0]);

        $thumbs = str_replace("/rawimage/", "/s-".config('thumb_hsize')."-".config('thumb_vsize')."/", $images);
        // $item->update('views', [$item->views+1]);
        return view('public.item.show', [ 'item' => $item, 'thumbs' => $thumbs, 'full_image' => $fi ]);
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
