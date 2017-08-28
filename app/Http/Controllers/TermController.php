<?php

namespace App\Http\Controllers;

use App\Term;
use Illuminate\Http\Request;
use App\Vocabulary;
use App\Services\Slug;

class TermController extends Controller
{
    public function index(){
        $terms = Term::all();
        return view('admin.term.index')->with(['terms' => $terms]);
    }

    public function create(){
        $vocabularies = Vocabulary::pluck('name','id');
        return view('admin.term.create')->with(['vocabularies'=>$vocabularies]);
    }

    public function store(Request $request)
    {        
        $request['sort'] = ($request->sort != null) ? $request->sort : '1';
        Term::create($request->all());
        return redirect('/admin/terms');
    }

    public function show(Term $term)
    {
        //
    }

    public function edit(Term $term)
    {
        $vocabularies = Vocabulary::pluck('name','id');
        return view('admin.term.edit')->with(['term'=>$term, 'vocabularies'=>$vocabularies]);
    }

    public function update(Request $request, Term $term)
    {        
        $term->update($request->all());
        return redirect('/admin/terms');
    }

    public function destroy(Term $term)
    {
        $term->delete();
        return redirect('/admin/terms');   
    }
}
