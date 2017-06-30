<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
use App\Category;
use App\Feed;

class ScrapeTokopedia extends Command
{
    
    protected $signature = 'scrape:tokopedia';

    protected $description = 'Scraping Tokopedia';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $feeds = Feed::where([ 'enabled' => 1, 'processed' => 0, 'marketplace_id' => 1 ])->get();
        dd($feeds);


        $crawler = Goutte::request('GET', 'https://www.tokopedia.com/fashionislandsho/sepatu-platform-heels-murah-size-37-sofft-usa-authentic-preloved-ori');
         
        $title = $crawler->filter('h1')->text();
         
        $cats = $crawler->filter('#breadcrumb-container a')->each (function ($node){ return $node->text(); });
        $cats = array_slice($cats,1);
        

        //Category::where('name',$cats)


        $cats = serialize($cats);


         dd($cats);
    }
}
