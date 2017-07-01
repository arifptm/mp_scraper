<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
        


    public function index()
    {
        $r = Category::whereParent(null)->get();
        $c = Category::pluck('name','id')->all();
        
        return view('category.index', ['roots' => $r, 'categories' => $c ]);        


       

       //return view('category.index', [ 'categories' => Category::orderBy('id', 'desc')->paginate(25) ]); 
    }

    public function create()
    {       
        return view('category.create');
    }

    public function store(Request $request)
    {
        $names = explode(',', $request->names);
        $names = array_slice($names, 0, 4);
        $depth0 = null;

        foreach ($names as $key=>$name)
        {
            $key1 = $key+1;
            ${'depth'.$key1} = Category::firstOrCreate(['name' => $name, 'level' => $key, 'parent' => ${'depth'.$key}['id'] ]);
            ${'depth'.$key1}->save();
            //print_r($depth[$key]);
            
        }    

        //dd($depth2);

        //print_r($depth);

        //is_null($depth[0]) ?: 0      

        //$depth[0] = Category::firstOrCreate(['name' => $name[0], 'level' => 0, 'parent' => 0 ]);
        //Category::create($depth[0]]);


        //$depth[1] = Category::firstOrCreate(['name' => $name[1], 'level' => 1, 'parent' =>  $depth[0]['id']]);
        //Category::create($depth[1]]);
            
        //}




        //dd($depth);
        //Category::create($depth);
        return redirect('/categories');
    }

    public function edit($id)
    {
        return view('category.edit', [ 'category' => Category::findOrFail($id) ]);
    }

    public function update(Request $request, $id)
    {
        Category::findOrFail($id)-> update($request->all());
        return redirect('/categories');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/categories');
    }
}
