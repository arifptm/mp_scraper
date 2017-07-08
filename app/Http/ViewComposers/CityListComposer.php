<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
//use App\Repositories\UserRepository;
use App\City;

class CityListComposer
{
    
    protected $cities;

    public function __construct(City $cities)
    {        
        $this->cities = $cities;
    }

    public function compose(View $view)
    {
        $ct = $this->cities->orderBy('id', 'desc')->take(20)->get();
        $view->with('cities', $ct);
    }
}