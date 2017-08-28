<?php

namespace App\Http\Controllers;

use App\Vocabulary;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    public function index(){
        $vocabularies = Vocabulary::all();
        return view('admin.vocabulary.index')->with(['vocabularies' => $vocabularies]);
    }

    public function create(){
        return view('admin.vocabulary.create');
    }

    public function store(Request $request)
    {
        Vocabulary::create($request->all());
        return redirect('/admin/vocabularies');
    }

    public function show(Vocabulary $vocabulary)
    {
        //
    }

    public function edit(Vocabulary $vocabulary)
    {
        return view('admin.vocabulary.edit')->with(['vocabulary'=>$vocabulary]);
    }

    public function update(Request $request, Vocabulary $vocabulary)
    {        
        $vocabulary->update($request->all());
        return redirect('/admin/vocabularies');
    }

    public function destroy(Vocabulary $vocabulary)
    {
        $vocabulary->delete();
        return redirect('/admin/vocabularies');   
    }
}
