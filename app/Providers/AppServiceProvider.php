<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;
//use App\City;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->afterResolving('Goutte\Client', function($goutte) {
            $goutte->setClient(new GuzzleClient([
                RequestOptions::VERIFY => false,
            ]));
        });

        // $cities = City::orderBy('id', 'desc')->take(20)->get();
        // View::share('cities', $cities );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
