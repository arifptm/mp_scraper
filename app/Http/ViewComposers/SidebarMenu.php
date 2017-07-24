<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;


class SidebarMenu
{

    protected $categories;

    public function __construct(Category $categories)
    {

        $this->categories = $categories;
    }

    public function compose(View $view)
    {
        $r = $this->categories->whereParent(null)->get();
        $view->with('roots', $r);
    }
}