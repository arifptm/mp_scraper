<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;
use App\Marketplace;




class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function subCategoryIndex($id){         
        $root = Category::whereId($id)->first();
        $sc = Category::whereParent($id)->get();        
        return view('admin.category.subcategory_index', ['main'=> $root, 'subcategories' => $sc]);  
    }


    public function edit($id){
        $cat = New Category;
        $categories = $cat->pluck('name','id');
        $category = $cat->findOrFail($id);
        return view('admin.category.edit', [ 'category' => $category, 'cats'=>$categories ]);
    }

    public function update(Request $request, $id)
    {
        $req = $request->all();
        
        Category::findOrFail($id)-> update($req);
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
