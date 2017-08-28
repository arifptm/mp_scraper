<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\City;
use \App\Services\Slug;

class SellerController extends Controller
{


    public function search(Request $request){
        $sellers = Seller::where('id','!=', null)->where('name','like',"%$request->key%");
        if (($sellers->count()) > 0){
            $title = "Daftar nama penjual mengandung kata \"$request->key\"";
            $meta['pagetitle'] = "Daftar nama toko seller mengandung kata \"$request->key\" di Marketplace Indonesia";
            $meta['description'] = "Daftar nama toko seller/penjual olshop yang mengandung kata \"$request->key\" di seluruh Marketplace yang ada di Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya.";
            $meta['keyword'] = "\"$request->key\", Daftar seller, daftar penjual, seller olshop, Marketplace Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee";
            $result = $sellers->orderBy('id', 'desc')->simplePaginate(24);
        } else {
            $result = array();
            $title = "Tidak ada nama seller mengandung kata '$request->key'";
            $meta['pagetitle'] = "Tidak ada nama seller mengandung kata '$request->key'";
            $meta['description']='';

            //return response()->view('toko.seller.list', [ 'sellers' => $result , 'title'=> $title, 'meta'=> $meta ],204);
            return view('toko.seller.list', [ 'sellers' => $result , 'title'=> $title, 'meta'=> $meta ])->withResponse(204);
        }

        return view('toko.seller.list', [ 'sellers' => $result , 'title'=> $title, 'meta'=> $meta ]);
    }

    public function list($index){
        $alphas = range('a', 'z');
        $sellers = Seller::where('id','!=', null);

        if ($index == 'all'){
            $result = $sellers->orderBy('id', 'desc');
            $title = "Daftar Nama Seller/Penjual OLSHOP Indonesia";
            $meta['title'] = "Daftar Nama Seller/Penjual OLSHOP Indonesia";
            $meta['pagetitle'] = "Daftar semua nama toko seller di Marketplace Indonesia";
            $meta['description'] = "Daftar nama semua toko seller/penjual olshop di seluruh Marketplace yang ada di Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya.";
            $keyword = "Daftar seller, daftar penjual, seller olshop, Marketplace Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee";

        } else if (in_array($index,$alphas)){
            $result = $sellers->where('name','like',"$index%")->orderBy('name', 'asc');
            $title = "Daftar nama penjual dengan awalan \"$index\"";
            $meta['pagetitle'] = "Daftar nama penjual dengan awalan \"$index\" di Marketplace Indonesia";
            $meta['description'] = "Daftar nama toko seller/penjual olshop dengan awalan \"$index\" di seluruh Marketplace yang ada di Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya.";
        } else {
            $result = $sellers->orderBy('name', 'asc');
            $title = "Daftar nama penjual lain-lain";
            $meta['pagetitle'] = "Daftar nama penjual lain-lain di Marketplace Indonesia";
            $meta['description'] = "Daftar nama toko seller/penjual olshop lain-lain di seluruh Marketplace yang ada di Indonesia, Tokopedia, Bukalapak, Lazada, Blibli, MatahariMall, Elevenia, Shopee, dan sebagainya.";
        }

        if (count($result) > 0){            
            $result = $result ->simplePaginate(24);
        } else {
            $title ="Tidak ada data seller";
            $result=[];
            $meta['pagetitle'] = "Tidak ada data seller";
            $meta['description'] ='';
        }
        return view('toko.seller.list', [ 'sellers' => $result, 'title'=>$title, 'meta'=> $meta ]);
    }
    










    ////////////////////////ADMIN
    public function index()
    {
        return view('admin.seller.index', [ 'sellers' => Seller::orderBy('id', 'desc')->SimplePaginate(25) ]);
    }

    public function create()
    {
        return view('admin.seller.create');        
    }

    public function store(Request $request)
    {
        $city = City::firstOrCreate(['name' => $request->name])->save();
        $seller = Seller::firstOrCreate('');
        Seller::create($request->all());
        return redirect('/admin/sellers');
    }

    public function edit($id)
    {
        $seller = Seller::findOrFail($id);
        $city = City::pluck('name', 'id');
        return view('admin.seller.edit', [ 'seller' => $seller, 'city' => $city ]);
    }

    public function update(Request $request, $id)
    {
        $req = $request->all();
        $slug = new Slug;
        $req['slug'] = $slug->createSlug($request->name);
        Seller::findOrFail($id)-> update($req);
        return redirect('/admin/sellers');
    }

    public function destroy($id)
    {
        Seller::findOrFail($id)->delete();
        return redirect('/admin/sellers');
    }
}
