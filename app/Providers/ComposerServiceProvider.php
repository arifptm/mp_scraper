<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\City;
use App\Seller;
use App\Item;
use App\Marketplace;
use App\Tag;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {        
        View::composer('toko.index', function ($view) {
            $r1 = ['Barusan', 'Mantap!', 'Ini dia!','Ayo beli!', 'Akhirnya'];
            shuffle($r1);
            $r2 = ['melego', 'menjual' ,'obral', 'promo', 'cuci gudang'];
            shuffle($r2);
            $r3 = ['daerah', 'kota', 'area', 'wilayah', 'lokasi'];
            shuffle($r3);

            for($i=0;$i<5;$i++)
            {
                $ra[] = [$r1[$i], $r2[$i], $r3[$i]];
            }

            $item = Item::where('title', '<>', '');
            $it = $item->orderBy('id', 'desc')->take(8)->get();
            $rt = $item->orderBy('id', 'asc')->take(5)->get();

            $ct = City::select('slug','name')->orderBy('id', 'desc')->take(32)->get();
            $sl = Seller::orderBy('id', 'desc')->take(32)->get();
            $ca = Category::whereLevel(1)->orderBy('id', 'desc')->take(32)->get();

            $view->with([
                'categories_lv2' => $ca,
                'cities' => $ct, 
                'sellers'=>$sl,
                'items'=> $it,
                'random'=>$ra,
                'rotators' => $rt
                ]);
        });  
        
        View::composer('*', function ($view) {
            $ca = Category::whereLevel(0)->orderBy('name', 'asc')->get();
            $view->with('categories', $ca);          
        });

        View::composer(
            'admin.template.sidebar', 'App\Http\ViewComposers\SidebarMenu'
        );

        View::composer('toko.template.header', function ($view) {
            $ca = Marketplace::all();
            $view->with('marketplaces', $ca);          
        });    
 


        
    }



    public function register()
    {
        //
    }
}