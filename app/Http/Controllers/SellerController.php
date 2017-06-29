<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;

class SellerController extends Controller
{
    public function index()
    {
        return view('seller.index', [ 'sellers' => Seller::orderBy('id', 'desc')->paginate(2) ]);
    }

    public function create()
    {
        return view('seller.create');
    }

    public function store(Request $request)
    {
        Seller::create($request->all());
        return redirect('/sellers');
    }

    public function edit($id)
    {
        return view('seller.edit', [ 'seller' => Seller::findOrFail($id) ]);
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
