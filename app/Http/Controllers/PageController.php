<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Term;
use App\Vocabulary;
use App\Services\Slug;

class PageController extends Controller
{
    public function showPublic($slug)
    {
        $page = Page::where('slug',$slug)->first();
        
        return view('toko.page.show')->with(['page'=>$page]);
    }

    public function index(){
        $pages = Page::all();
        return view('admin.page.index')->with(['pages'=>$pages]);
    }

    public function create(){
        $vocabulary = Vocabulary::whereSlug('page-term')->pluck('id');
        $terms = Term::whereVocabulary_id($vocabulary)->get();
        return view('admin.page.create')->with(['terms'=>$terms]);
    }

    public function store(Request $request)
    {       
        if ( $request->terms_id != null){
            $vocabulary = Vocabulary::whereSlug('page-term')->pluck('id')->first();
            $terms = explode(',',$request->terms_id);

            foreach($terms as $term){
                $term_slug = new Slug;
                $new_term = Term::firstOrCreate(['name'=> trim($term), 'vocabulary_id' => $vocabulary, 'slug'=> $term_slug->createSlug($term)]);
                $new_term_id[] = $new_term->id;
            }
        }

        $page = Page::create($request->all());
        if (isset($new_term_id)){
            $page->term()->attach($new_term_id);
        }
        return redirect('/admin/pages');
    }

    public function edit(Page $page)
    {
        $vocabularies = Vocabulary::pluck('name','id');
        return view('admin.page.edit')->with(['page'=>$page, 'vocabularies'=>$vocabularies]);
    }

    public function update(Request $request, Page $page)
    {        
        if ( $request->terms_id != null){
            $vocabulary = Vocabulary::whereSlug('page-term')->pluck('id')->first();
            $terms = explode(',',$request->terms_id);

            foreach($terms as $term){
                $term_slug = new Slug;
                $term_term = new Term;
                $new_term = Term::firstOrCreate(['name'=> trim($term), 'vocabulary_id' => $vocabulary, 'slug'=> $term_slug->createSlug($term)]);
                $new_term_id[] = $new_term->id;
            }
        }

        $page->update($request->all());
        $page->term()->sync($new_term_id);
        return redirect('/admin/pages');
    }

    public function destroy(Page $page){
        $page->delete();
        return redirect('/admin/pages');   
    }
}
