<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Category;
use App\Item;
use App\ItemCounter;

class CountItem extends Command
{
    
    protected $signature = 'count:item';
    protected $description = 'Item Counter';

    public function handle()
    {
        $root = Category::with(['child' => function($query){
            $query->with('child');
        }])->whereLevel(0)->get();
        

        foreach ($root as $l=>$r){
            foreach($r->child as $k=>$s){
                $category[$r->id][] = $s->id;
                foreach($s->child as $m=>$t){
                $category[$r->id][] = $t->id;
                }
            }
        }
        
        echo "step1";
        foreach ($category as $k=>$r){
            $item = Item::whereIn('category_id', $r)->count();

            $counter = ItemCounter::firstOrNew(['category_id'=>$k]);
            
            $counter->update(['count'=> $item]);
        }

        return "OK";
    }
}
