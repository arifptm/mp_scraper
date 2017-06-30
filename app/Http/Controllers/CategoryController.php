<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
       $s = Category::whereParent(null)->get();
       dd($s);

       // return view('category.index', [ 'categories' => Category::orderBy('id', 'desc')->paginate(25) ]); 
    }

    public function create()
    {       
        return view('category.create');
    }

    public function store(Request $request)
    {
        $new_parent = Category::firstOrCreate(['name' => $request->parent]);
        //dd($new_parent);
        $category = ['name' => $request->name, 'parent' => $new_parent->id ];

        Category::create($category);
        
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
