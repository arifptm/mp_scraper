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

        $it = $this->items->where('title','!=', '')->orderBy('id', 'desc')->take(6)->get();
        $rt = $this->items->where('title','!=', '')->orderBy('id', 'asc')->take(5)->get();

        $view->with(['items'=> $it, 'random'=>$ra , 'rotators' => $rt]);
    }
}