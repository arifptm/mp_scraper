<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;




class CategoryController extends Controller
{


    public function index()
    {
<<<<<<< HEAD
        
        //$c = Category::pluck('name','id')->all();
        
        return view('admin.category.index');        
       
       //return view('category.index', [ 'categories' => Category::orderBy('id', 'desc')->paginate(25) ]); 
    }

    public function subCategoryIndex($id)
    {
        
        $root = Category::whereId($id)->first();
        $sc = Category::whereParent($id)->get();
        
        
        return view('admin.category.subcategory_index', ['main'=> $root, 'subcategories' => $sc]);        
       
       //return view('category.index', [ 'categories' => Category::orderBy('id', 'desc')->paginate(25) ]); 
=======
        $r = Category::whereParent(null)->get();
        $c = Category::pluck('name','id')->all();
        return view('admin.category.index', ['roots' => $r, 'categories' => $c ]);        
>>>>>>> b76e99b135db57b155d3a01c4d40916d5f07109a
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
        }    
        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        return view('admin.category.edit', [ 'category' => Category::findOrFail($id) ]);
    }

    public function update(Request $request, $id)
    {
        Category::findOrFail($id)-> update($request->all());
        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect('/admin/categories');
    }


    public function suggestion()
    {
        
        $c = Category::all()->pluck('name')->toJson();
        return $c;
    }

}
