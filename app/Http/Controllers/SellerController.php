<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\City;
use \App\Services\Slug;

class SellerController extends Controller
{

    public function list()
    {
        return view('public.seller.list', [ 'sellers' => Seller::orderBy('id', 'desc')->simplePaginate(20) ]);
    }
    
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
