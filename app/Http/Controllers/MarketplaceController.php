<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marketplace;
use \App\Services\Slug;

class MarketplaceController extends Controller
{
    
    public function list()
    {
        $m = Marketplace::all();
        return view('toko.marketplace.list', ['marketplaces' => $m]);
    }










    //===============================================================Admin Section
    public function index()
    {
        $ms = Marketplace::orderBy('id', 'desc')->get();
        return view('admin.marketplace.index', [ 'marketplaces' => $ms ]);
    }

    public function create()
    {
        return view('admin.marketplace.create');
    }

    public function store(Request $request)
    {
        $slug = new Slug;
        $request['slug'] = $slug -> createSlug($request->name);
        Marketplace::create($request->all());
        return redirect('/admin/marketplaces');
    }

    public function edit($id)
    {
        return view('admin.marketplace.edit', [ 'marketplace' => Marketplace::findOrFail($id) ]);
    }

    public function update(Request $request, $id)
    {
        Marketplace::findOrFail($id)-> update($request->all());
        return redirect('/admin/marketplaces');
    }

    public function destroy($id)
    {
        Marketplace::findOrFail($id)->delete();
        return redirect('/admin/marketplaces');
    }
}