<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Item;

class FeaturedComposer
{
    
    protected $items;

    public function __construct(Item $items)
    {        
        $this->items = $items;
    }

    public function compose(View $view)
    {
        $it = $this->items->orderBy('id', 'desc')->take(6)->get();
        $view->with('items', $it);
    }
}