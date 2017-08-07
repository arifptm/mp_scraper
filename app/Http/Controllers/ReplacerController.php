<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Replacer;
use Yajra\Datatables\Facades\Datatables;

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




    public function data(){
    
        $replacer = Replacer::select(['id', 'department', 'replacer']);

        $dt = Datatables::of($replacer)
            ->addColumn('action', function ($replacer) {                
                return '
                                <form action="/admin/replacer/$replacer->id" method="delete">
                                <div class="btn-group">
                                    <a href="/admin/replacers/$replacer->id/edit" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs"  onclick = "return confirm(\'Are you sure?\')" ><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                </div>
                                </form>                
                ';
            })

            ->rawColumns(['action']);            
            return $dt->make(true);
    }

}
