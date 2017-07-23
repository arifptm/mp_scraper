<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Replacer;

class ReplacerController extends Controller
{
    public function index()
    {
    	$r = Replacer::paginate(30);
    	return view('admin.replacer.index', ['replacers'=> $r]);
    }

    public function create()
    {
    	return view('admin.replacer.create');
    }

    public function store(Request $request)
    {    	
    	Replacer::firstOrCreate(['department' => $request->department, 'replacer'=>$request->replacer, 'level' => $request->level])->save();
    	return redirect('/admin/replacers');
    }

 	public function edit($id)
    {
    	$r = Replacer::findOrFail($id);
    	return view('admin.replacer.edit', ['replacer' => $r ]);
    }

 	public function update(Request $request, $id)
    {
    	Replacer::findOrFail($id)->update($request->all());
        return redirect('/admin/replacers');
    }

    public function destroy($id)
    {
        Replacer::findOrFail($id)->delete();
        return redirect('/admin/replacers');
    }

}
