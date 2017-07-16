<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function list()
    {
        $c = City::simplePaginate(60);        
        return view('public.city.list', ['cities' => $c]);
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
        City::findOrFail($id)->update($request->all());
        return redirect('/admin/cities');
    }

    public function destroy($id)
    {
        City::findOrFail($id)->delete();
        return redirect('/admin/cities');
    }
}
