<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;

class CategoryListComposer
{
    
    protected $categories;

    public function __construct(Category $categories)
    {        
        $this->categories = $categories;
    }

    public function compose(View $view)
    {
        $ct = $this->categories->whereLevel(1)->orderBy('id', 'desc')->take(32)->get();
        $view->with('categories_lv2', $ct);
    }
} 