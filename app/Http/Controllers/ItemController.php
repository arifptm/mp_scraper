<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\City;
use App\Seller;
use App\Feed;
use App\Category;
use App\Marketplace;
use \App\Services\ItemsCategory;
use \App\Services\ItemsCity;
use SEOMeta;
use OpenGraph;
use Twitter;

class ItemController extends Controller
{
    public function itemByCity( $slug = null )
    {
        $cid = City::whereSlug($slug)->first();
        $sid = Seller::whereCity_id($cid->id)->pluck('id');
        $it = Item::whereIn('seller_id', $sid)->orderBy('updated_at','desc')->paginate(36);    
        return view('public.item.item_by', ['items' => $it, 'pagetitle' => 'Produk dari '.$cid->name ]);
    }


    public function itemBySeller( $slug = null )
    {
        $sid = Seller::where('slug', $slug)->first();
        $it = Item::whereSeller_id($sid->id)->orderBy('updated_at','desc')->paginate(36);       
        return view('public.item.item_by', ['items' => $it, 'pagetitle' => 'Produk dijual oleh '.$sid->name  ]);   
    }


    public function itemByCategory( $slug = null )
    {
        $id1 = Category::whereSlug($slug)->first();
        $id2 = Category::whereParent($id1->id)->pluck('id');
        $id3 = Category::whereIn('parent', $id2)->pluck('id');
        $id = $id3 -> merge($id2);
        $it = Item::whereIn('category_id', $id)->where('title','!=', '')->orderBy('updated_at','desc')->paginate(36);
        return view('public.item.item_by', ['items' => $it, 'pagetitle' => 'Produk kategori '.$id1->name]);
    }

    public function itemBySubCategory( $slug = null )
    {
        $id1 = Category::whereSlug($slug)->first();        
        $id2 = Category::whereParent($id1->id)->pluck('id');  
        $id = $id2 -> merge($id1->id);
        $it = Item::whereIn('category_id', $id)->orderBy('updated_at','desc')->paginate(36);
        return view('public.item.item_by', ['items' => $it, 'pagetitle' => 'Produk kategori '.$id1->name]);
    }
      

    public function itemByMarketplace( $slug = null )
    {
        $id1 = Marketplace::whereSlug($slug)->first();        
        $id2 = Feed::whereMarketplace_id($id1->id)->pluck('id');
        $it = Item::whereIn('feed_id', $id2)->where('title','!=','')->orderBy('updated_at','desc')->paginate(36);    
        return view('public.item.item_by', ['items' => $it, 'pagetitle' => 'Produk dijual di '.$id1->name]);
    }

    public function list()
    {
        $it = Item::where('title','!=', '')->orderBy('updated_at','desc')->paginate(36);        
        return view('public.item.item_by', ['items' => $it, 'pagetitle' => 'Daftar semua produk']);
    }


    public function searchResult(Request $r){        
        $s = Item::search($r->search)->paginate(36);
        return view('public.item.item_by', ['items' => $s, 'pagetitle' => 'Hasil pencarian "'. $r->search.'"']);
    }

    public function publicShow($slug)
    {
        $item = Item::whereSlug($slug)->first();
        
        $relateds = Item::where('category_id', $item->category_id)->where('id', '!=', $item->id)->get()->sortByDesc('id');
        
        $sl = Seller::whereCity_id($item->seller->city->id)->pluck('id');
        $others = Item::whereIn('seller_id', $sl)->orderBy('id','desc')->take(6)->get();
        
        return view('public.item.show', [ 
            'item' => $item,         
            'relateds' => $relateds,
            'others' => $others
             ]);
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



    




    public function show($id)
    {
    	$item = Item::find($id);
        //$images = unresialize($item->images);
        //$fi = str_replace("/rawimage/", "/m-".config('node_image_hsize')."-".config('node_image_vsize')."/", $images[0]);

        //$thumbs = str_replace("/rawimage/", "/m-".config('thumb_hsize')."-".config('thumb_vsize')."/", $images);
    	//$item->update(['views' => $item->views+1]);
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
