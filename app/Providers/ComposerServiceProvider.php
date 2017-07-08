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

    }

    public function register()
    {
        //
    }
}