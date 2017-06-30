<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marketplace;

class MarketplaceController extends Controller
{
    public function index()
    {
        return view('marketplace.index', [ 'marketplaces' => Marketplace::orderBy('id', 'desc')->paginate(25) ]);
    }

    public function create()
    {
        return view('marketplace.create');
    }

    public function store(Request $request)
    {
        Marketplace::create($request->all());
        return redirect('/marketplaces');
    }

    public function edit($id)
    {
        return view('marketplace.edit', [ 'marketplace' => Marketplace::findOrFail($id) ]);
    }

    public function update(Request $request, $id)
    {
        Marketplace::findOrFail($id)-> update($request->all());
        return redirect('/marketplaces');
    }

    public function destroy($id)
    {
        Marketplace::findOrFail($id)->delete();
        return redirect('/marketplaces');
    }
}
