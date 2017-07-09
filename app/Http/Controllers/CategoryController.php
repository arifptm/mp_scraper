<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class CategoryController extends Controller
{


    public function index()
    {
        $r = Category::whereParent(null)->get();
        $c = Category::pluck('name','id')->all();
        
        return view('category.index', ['roots' => $r, 'categories' => $c ]);        
       
       //return view('category.index', [ 'categories' => Category::orderBy('id', 'desc')->paginate(25) ]); 
    }



public function publicIndex($slug)
    {
        
        $root = Category::whereSlug($slug)->get();
            {
                foreach($root as $ci)
                {
                    
                    $cid[] = Category::whereId($ci->id)->get();    
                }
            }    
        //$i = Item::whereCategory_id($cid->id);
        
       dd(($cid));
        
        return view('public.category.index', ['items' => $i]);
       
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
