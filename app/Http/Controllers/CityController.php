<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use \App\Services\Slug;

class CityController extends Controller
{
    public function list()
    {
        $c = City::orderBy('id','desc')->simplePaginate(60);        
        return view('toko.city.list', ['cities' => $c]);
    }

    public function index()
    {
        return view('admin.city.index', [ 'cities' => City::orderBy('id', 'desc')->simplePaginate(25) ]);
    }

    public function create()
    {
        return view('admin.city.create');
    }

    public function store(Request $request)
    {
        $city = City::firstOrCreate(['name' => $request->name])->save();
        return redirect('/admin/cities');
    }

    public function edit($id)
    {
        return view('admin.city.edit', [ 'city' => City::findOrFail($id) ]);
    }

    public function update(Request $request, $id)
    {
        $req = $request->all();
        $slug = new Slug;
        $req['slug'] = $slug->createSlug($request->name);
        City::findOrFail($id)->update($req);
        return redirect('/admin/cities');
    }

    public function destroy($id)
    {
        City::findOrFail($id)->delete();
        return redirect('/admin/cities');
    }
}
