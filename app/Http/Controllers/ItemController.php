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
use Yajra\Datatables\Facades\Datatables;

class ItemController extends Controller
{
    
    //topmenu => produk
    public function list()
    {
        $it = Item::where('title','!=', '')->orderBy('updated_at','desc')->simplePaginate(36); 
        $meta = [
            'title' => 'Daftar semua produk dari marketplace yang ada di Indonesia',
            'pagetitle' => 'Daftar produk Marketplace Indonesia',
            'description' => 'Daftar semua produk dari Marketplace yang ada di Indonesia, produk Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya.',
            'keywords' => 'daftar produk lengkap, produk marketplace Indonesia, produk tokopedia, produk bukalapak, produk lazada, produk blibli, produk mataharimall, produk elevenia, produk shopee'
        ];

        return view('public.item.item_by', ['items' => $it, 'meta' => $meta ]);
    }

    public function itemByCity( $slug = null )
    {
        $cid = City::whereSlug($slug)->first();
        $sid = Seller::whereCity_id($cid->id)->pluck('id');
        $it = Item::whereIn('seller_id', $sid)->orderBy('updated_at','desc')->simplePaginate(36);    

        $meta = [
            'title' => "Daftar produk lengkap onlineshop seller dari kota $cid->name",
            'pagetitle' => "Daftar produk dari kota $cid->name",
            'description' => "Daftar produk lengkap onlineshop, seller dari kota $cid->name yang dijual di marketplace yang ada di Indonesia.",
            'keywords' => "Produk $cid->name, produk lengkap, produk marketplace Indonesia, produk tokopedia, produk bukalapak, produk lazada, produk blibli, produk mataharimall, produk elevenia, produk shopee"
        ];

        return view('public.item.item_by', ['items' => $it, 'meta' => $meta ]);
    }


    public function itemBySeller( $slug = null )
    {
        $sid = Seller::where('slug', $slug)->first();        
        $it = Item::whereSeller_id($sid->id)->orderBy('updated_at','desc')->simplePaginate(36);   

        $meta = [
            'title' => "Daftar produk lengkap dijual oleh $sid->name dari kota ".$sid->city->name,
            'pagetitle' => "Produk dijual oleh $sid->name -".$sid->city->name ,
            'description' => "Daftar produk yang dijual oleh onlineshop $sid->name, seller dari kota ".$sid->city->name.", di marketplace yang ada di Indonesia.",
            'keywords' => "Produk $sid->name, produk ".$sid->city->name.", $sid->name ".$sid->city->name.", produk lengkap, produk tokopedia, produk bukalapak, produk lazada, produk blibli, produk mataharimall, produk elevenia, produk shopee"
        ];

        return view('public.item.item_by', ['items' => $it, 'meta' =>$meta ]);   
    }


    public function itemByCategory( $slug = null )
    {
        $id1 = Category::whereSlug($slug)->first();
        $id2 = Category::whereParent($id1->id)->pluck('id');
        $id3 = Category::whereIn('parent', $id2)->pluck('id');
        $id = $id3 -> merge($id2);
        
        $it = Item::whereIn('category_id', $id)->where('title','!=', '')->orderBy('updated_at','desc')->simplePaginate(36);
      
       $meta = [
            'title' => "Daftar produk kategori ".$id1->name,
            'pagetitle' => "Produk murah kategori ".$id1->name,
            'description' => "Daftar produk murah pada kategori ".$id1->name.", yang jual di marketplace Indonesia, produk Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya.",
            'keywords' => "kategori ".$id1->name.", produk ".$id1->name.", produk lengkap, produk tokopedia, produk bukalapak, produk lazada, produk blibli, produk mataharimall, produk elevenia, produk shopee"
        ];
        
        return view('public.item.item_by', ['items' => $it, 'meta' => $meta ]);
    } 

    public function itemBySubCategory( $slug = null )
    {
        $id1 = Category::whereSlug($slug)->first();        
        $id2 = Category::whereParent($id1->id)->pluck('id');  
        $id = $id2 -> merge($id1->id);
        $it = Item::whereIn('category_id', $id)->orderBy('updated_at','desc')->simplePaginate(36);
        
        $meta = [
            'title' => "Daftar produk subkategori ".$id1->name,
            'pagetitle' => "Produk murah subkategori ".$id1->name,
            'description' => "Daftar produk murah pada subkategori ".$id1->name.", yang jual di marketplace Indonesia, produk Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya.",
            'keywords' => "subkategori ".$id1->name.", produk ".$id1->name.", produk lengkap, produk tokopedia, produk bukalapak, produk lazada, produk blibli, produk mataharimall, produk elevenia, produk shopee"
        ];

        return view('public.item.item_by', ['items' => $it, 'meta' => $meta]);
    }
      

    public function itemByMarketplace( $slug = null )
    {
        $id1 = Marketplace::whereSlug($slug)->first();        
        $id2 = Feed::whereMarketplace_id($id1->id)->pluck('id');
        $it = Item::whereIn('feed_id', $id2)->where('title','!=','')->orderBy('updated_at','desc')->simplePaginate(36);  

        $meta = [
            'title' => "Daftar produk lengkap terbaru di ".$id1->name,
            'pagetitle' => "Produk terbaru di ".$id1->name,
            'description' => "Daftar produk terbaru dan murah yang dijual di ".$id1->name.", oleh seller se-Indonesia, pilihan produk Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya.",
            'keywords' => "produk terbaru ".$id1->name.", produk lengkap, produk tokopedia, produk bukalapak, produk lazada, produk blibli, produk mataharimall, produk elevenia, produk shopee"
        ];


        return view('public.item.item_by', ['items' => $it, 'meta' => $meta]);
    }




    public function searchResult(Request $r){        
        $s = Item::search($r->search)->paginate(36);
        return view('public.item.item_by', ['items' => $s, 'pagetitle' => 'Hasil pencarian "'. $r->search.'"']);
    }

    public function publicShow($slug)
    {
        $item = Item::whereSlug($slug)->first();
        
        $relateds = Item::where('category_id', $item->category_id)->where('id', '<>', $item->id)->orderBy('id','desc')->take(6)->get();
        
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

    public function cityList($id)
    {
        $sl = City::whereId($id)->first()->seller;
        
        foreach ($sl as $k => $v) {
            $items = Item::whereSeller_id($v->id)->get();
        }
         $all = $items->where('title', '!=', '')->count();
        return view('item.index', ['items'=> $items, 'all' => $all ]);
    }

    public function soldout($slug)
    {
        $s = Item::whereSlug($slug)->whereSold_out(1)->simplePaginate(30);
        return view ('admin.item.index', ['items'=> $p]);

    }

    public function pending($slug)
    {

        $all = array();
        $al = Marketplace::with(['feed.item' => function($query){
            $query->where('title','=', NULL);
        }])->whereSlug($slug)->first();

        foreach ($al->feed as $feed)
        {
            foreach ($feed->item as $items)
            {
                $all[] = collect($items);
            }
        }        
        
        dd($all);

        return view ('admin.item.index', ['items'=> $all]);
    }








/////////////////ADMIN


    
    public function index(){
        $it = Item::where('title','!=','')->orderBy('updated_at','desc')->simplePaginate(50);
        return view('admin.item.index', ['items' => $it]);
    }

    public function show($id){
        $i = Item::findOrFail($id);
        return $i->id;
    }

    public function edit($id){
        return view('admin.item.edit', [ 'item' => Item::findOrFail($id) ]);
    }

    public function update(Request $request, $id){
        Item::findOrFail($id)-> update($request->all());
        return redirect('/admin/items');
    }

    public function destroy($id){
        Item::findOrFail($id)->delete();
        return redirect('/admin/items');
    }

    public function data(){
        $item = Item::select(['id', 'item_url', 'title', 'sell_price', 'seller_id','updated_at','processed','published','checked','sold_out']);

        $dt = Datatables::of($item)
            ->addColumn('action', function ($item) {                
                return '<form action="/admin/items/'.$item->id.'" method="post">
                <input type="hidden" value="delete" name="_method">
                '.csrf_field().'
                <div class="btn-group">
                    <a href="/admin/items/'.$item->id.'/edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                    <button type="submit" class="btn btn-danger btn-xs"  onclick = "return confirm(\'Are you sure?\')" ><i class="glyphicon glyphicon-trash"></i></button>
                </div>
                </form>';
            })
            ->addColumn('seller', function($item){
                if ($item->seller_id <> null)
                return $item->seller->name.' - '.$item->seller->city->name;
            })
            ->addColumn('updated', function($item){
                return $item->updated_at->format('d-m-Y');
            })

            ->addColumn('state', function($item){
                return $item->processed.' | '.$item->published.' | '.$item->checked.' | '.$item->sold_out;
            })

            ->rawColumns(['action','seller','updated']); 

            
            if ($pro = $dt->request->get('processed')){
                $dt->where('processed','<>', '$pro');            
            } else {
                $dt->where('processed','==', '$pro');            
            }

            if ($tit = $dt->request->get('title')){
                $dt->where('title','like', "%$tit%");            
            }        
             
            if ($url = $dt->request->get('item_url')){
                $dt->where('item_url','like', "%$url%");            
            }          
            return $dt->make(true);
    }


}
