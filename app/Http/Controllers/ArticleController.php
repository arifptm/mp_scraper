<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Vocabulary;
use App\Term;

class ArticleController extends Controller
{
    public function term(){
        return Term::all();
    }

    public function popular(){
        return Article::whereStatus(1)->orderBy('views', 'desc')->take(3)->get();
    }



    public function showPublic($slug)
    {
        $article = Article::where('slug',$slug)->first();  
        $article->update(['views'=>$article->views+1]);
        return view('toko.article.show')->with(['article'=>$article, 'terms'=> $this->term(), 'populars'=>$this->popular() ]);
    }

    public function listPublic(){
        $articles = Article::whereStatus(1)->orderBy('id','desc')->paginate(7);        
        return view('toko.article.list')->with(['articles'=>$articles, 'terms'=> $this->term(), 'populars'=>$this->popular() ]);
    }




    public function index(){
        $articles = Article::all();
        return view('admin.article.index')->with(['articles'=>$articles]);
    }

    public function create(){
        $vocabulary = Vocabulary::whereSlug('article-term')->pluck('id');
        $terms = Term::whereVocabulary_id($vocabulary)->get();
        return view('admin.article.create')->with(['terms'=>$terms]);
    }

    public function store(Request $request)
    {       
        if ( $request->terms_id != null){
            $vocabulary = Vocabulary::whereSlug('article-term')->pluck('id')->first();
            $terms = explode(',',$request->terms_id);

            foreach($terms as $term){
                $term_slug = new Slug;
                $new_term = Term::firstOrCreate(['name'=> trim($term), 'vocabulary_id' => $vocabulary, 'slug'=> $term_slug->createSlug($term)]);
                $new_term_id[] = $new_term->id;
            }
        }

        $article = Articles::create($request->all());
        if (isset($new_term_id)){
            $article->term()->attach($new_term_id);
        }
        return redirect('/admin/articles');
    }

    public function edit(Article $article){ 
        if($article->term->count()){
            $terms = $article->term->pluck('name');
        }
        return view('admin.article.edit')->with(['article'=>$article, 'terms'=>$terms]);
    }

    public function update(Request $request, Article $article)
    {        
        // if ( $request->terms_id != null){
        //     $vocabulary = Vocabulary::whereSlug('article-term')->pluck('id')->first();
        //     $terms = explode(',',$request->terms_id);

        //     foreach($terms as $term){
        //         $term_slug = new Slug;
        //         $term_term = new Term;
        //         $new_term = Term::firstOrCreate(['name'=> trim($term), 'vocabulary_id' => $vocabulary, 'slug'=> $term_slug->createSlug($term)]);
        //         $new_term_id[] = $new_term->id;
        //     }
        // }

        $article->update($request->except('terms'));
        //$article->term()->sync($new_term_id);
        return redirect('/admin/articles');
    }

    public function destroy(Article $article){
        $article->delete();
        return redirect('/admin/articles');   
    }
}
