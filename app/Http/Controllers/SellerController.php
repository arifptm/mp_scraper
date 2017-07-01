<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\City;

class SellerController extends Controller
{
    
    public function cities()
    {
        $cts = City::all();
        foreach ($cts as $key=>$ct) {
            $ctss[$ct->id] = $ct->name;
        }
        return $ctss;
    }

    public function index()
    {
        return view('seller.index', [ 'sellers' => Seller::orderBy('id', 'desc')->paginate(25) ]);
    }

    public function create()
    {
        return view('seller.create', ['cities' => $this->cities() ]);        
    }

    public function store(Request $request)
    {
        Seller::create($request->all());
        return redirect('/sellers');
    }

    public function edit($id)
    {
        $seller = Seller::findOrFail($id);
        return view('seller.edit', [ 'seller' => $seller, 'cities' => $this->cities() ]);
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
