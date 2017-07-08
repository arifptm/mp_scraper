<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    public function index()
    {
        return view('city.index', [ 'cities' => City::orderBy('id', 'desc')->paginate(25) ]);
    }






    public function create()
    {
        return view('city.create');
    }

    public function store(Request $request)
    {
        $city = City::firstOrCreate(['name' => $request->name])->save();
        return redirect('/cities');
    }

    public function edit($id)
    {
        return view('city.edit', [ 'city' => City::findOrFail($id) ]);
    }

    public function update(Request $request, $id)
    {
        City::findOrFail($id)->update($request->all());
        return redirect('/cities');
    }

    public function destroy($id)
    {
        City::findOrFail($id)->delete();
        return redirect('/cities');
    }
}
