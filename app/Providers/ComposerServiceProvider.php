<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {        
        View::composer(
            'public.index', 'App\Http\ViewComposers\CityListComposer'
        );

        View::composer(
            'public.index', 'App\Http\ViewComposers\FeaturedComposer'
        );
        
        View::composer(
            'public.index', 'App\Http\ViewComposers\SellerListComposer'
        );

        View::composer(
            'public.index', 'App\Http\ViewComposers\CategoryListComposer'
        );        
    }

    public function register()
    {
        //
    }
}