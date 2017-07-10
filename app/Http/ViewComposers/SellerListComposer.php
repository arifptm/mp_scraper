<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Seller;

class SellerListComposer
{
    
    protected $sellers;

    public function __construct(Seller $sellers)
    {        
        $this->sellers = $sellers;
    }

    public function compose(View $view)
    {
        $sl = $this->sellers->orderBy('id', 'desc')->take(32)->get();
        $view->with('sellers', $sl);
    }
}