<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marketplace;

class MarketplaceController extends Controller
{
    public function index()
    {
        $ms = Marketplace::orderBy('id', 'desc');
        // foreach ($ms->get() as $m)
        // {
        //     foreach ($m->feed as $i)
        //     {
        //         $s[] = count($i->item->where('title','!=', ''));
        //     }    
        // }
        // $ci = array_sum($s);
        return view('marketplace.index', [ 'marketplaces' => $ms->paginate(25) ]);
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
