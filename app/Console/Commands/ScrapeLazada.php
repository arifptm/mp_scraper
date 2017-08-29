<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
use App\Feed;
use App\Marketplace;
use App\Item;
use App\Category;
use App\Seller;
use App\City;
use App\Tag;
use \App\Services\Slug;
use \App\Services\SearchResult;
use \App\Services\Scraper;
use \App\Services\TagService;

use App\Article;
use App\Vocabulary;
use App\Term;

class ScrapeBukalapak extends Command
{
    
    protected $signature = 'sc:bl';

    protected $description = 'Scraping Bukalapak';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $start1= (microtime(true));
       	$start2= (microtime(true)); 

        $end = (microtime(true));
        $t1 = $start2 - $start1;
        $t2 = $end - $start2;

        echo "Scrape = ".round($t1,2)."\n"."Search = ".round($t2,2);
    }
}        