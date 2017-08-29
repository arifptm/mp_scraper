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

use JonnyW\PhantomJs\Client;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeBlibli extends Command
{
    
    protected $signature = 'sc:bb';

    protected $description = 'Scraping Blibli';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $start1= (microtime(true));
        
        $p = new Scraper;
        $slug = new Slug;
        $se = new SearchResult;
        $tag_sr = new TagService;

        $mp = $p->feedProcessor('blibli'); //smallcase


        $scraped['item_url'] = $p->selectItem($mp)->item_url;
        echo $scraped['item_url']."\n";

        $client = Client::getInstance();
        $client -> getEngine()->setPath(config('app.phantomjs_path'));
        $request = $client->getMessageFactory()->createRequest($scraped['item_url']);
        $response = $client->getMessageFactory()->createResponse();        
        $client->send($request,$response);
        
        $crawler = new Crawler($response->getContent());
        
        $scraped['title']= str_limit($crawler->filter('h1.product-name')->text(),190,'');
        
        $scraped['slug'] = $slug->createSlug($scraped['title']);

        $cats = $crawler->filter('#bread-scrum a')->each (function ($node){
             return trim($node->attr('data-value'));
        });    
        
        $cats = array_slice($cats, 1);
//        if ($p->checkRootCat($cats[0]) === false){ 
//            $p->selectItem($mp)->update(['processed'=> 1, 'published'=>0]);
//            return 'gak ada root category';
//        }

        $scraped['category_id'] = $p->getCatId($cats);
        
        $scraped['sell_price'] = $crawler->filter('#priceDisplay') ? preg_replace('/[^0-9]/','',explode('-',$crawler->filter('#priceDisplay')->text())[0]) : null;
        

        if ($crawler->filter('#strikeThroughPrice')->count()) {
            $scraped['raw_price'] = preg_replace('/[^0-9]/','',$crawler->filter('#strikeThroughPrice')->text());
            $discount = (($scraped['raw_price'] - $scraped['sell_price']) / $scraped['raw_price'] )*100;
            $scraped['discount'] = round($discount,0,PHP_ROUND_HALF_UP);
        }

        $city['name'] = trim(explode(',',$crawler->filter('span[ng-bind=pickupPointMessage]')->text())[0]);
        if ($city['name'] == ''){
                $city['name'] = 'Indonesia';            
        }
        $city['slug']   = $slug->createSlug($city['name']);
        $city = City::firstOrCreate($city);
        
        if ($crawler->filter('.shipping-agent a span')->count()) {
            $seller['name'] = trim($crawler->filter('.shipping-agent a span')->text());
        } else {
            $seller['name'] = 'Blibli.com';
        }

        $seller['image_url'] = $crawler->filter('.brand-logo-block img')->attr('src');
        $seller['slug'] = $slug->createSlug($seller['name']);

        $seller['marketplace_id'] = $mp->id;
        $seller['city_id'] = $city->id;
        $seller = Seller::firstOrCreate($seller);
        
        $scraped['seller_id'] = $seller->id;

        $img = $crawler->filter('#productImageGallery img');

        if ($img->count() == 0){
            $p->selectItem($mp)->update(['processed'=>1, 'published'=>0]);
            return('gak ada gambar');
        }

            $imgs = $img->each (function ($node){
                return trim($node->attr('src'));
            });
            
        $scraped['images'] = serialize($imgs);

        $crawler -> filter('#productinfo h2.spec-title')->each(function($nodes){
            foreach ($nodes as $node) {
                $node->parentNode->removeChild($node);
            }
        });
        
        $clr = $re = '/<([^>\s]+)[^>]*>(?:\s*(?:<br \/>|&nbsp;|&thinsp;|&ensp;|&emsp;|&#8201;|&#8194;|&#8195;)\s*)*<\/\1>/m';
        $body = trim(explode('<!-- CONTENT SYNDICATION -->',$crawler->filter('#productinfo')->html())[0]);
        $body = preg_replace($clr, '', $body);
        $scraped['body'] = str_replace('\n','', $body);

        $details = $crawler->filter('.product-usp')->count() ? $crawler->filter('.product-usp')->html() : null;

        $scraped['details'] = str_replace('\n','', $details);
    
        $scraped['processed'] = 1 ;
        $scraped['views'] = (rand(10,100));  

        $tags = $tag_sr->createTag($scraped['title']);
        foreach($tags as $t){
            $tag['name'] = $t;
            $tag['slug'] = $slug->createSlug($t);

            $save_tag = Tag::firstOrNew($tag);
            $tag['count'] = $save_tag->count + 1;
            $save_tag->save();            
            $tag_id[] = $save_tag->id;
        }

        $scraped['tags'] = serialize($tag_id);
        $start2= (microtime(true)); 
        $scraped['se'] = $se->Geevv($scraped['title']);
   
        $p->selectItem($mp)->update($scraped);

        $end = (microtime(true));
        $t1 = $start2 - $start1;
        $t2 = $end - $start2;

        echo "Scrape = ".round($t1,2)."\n"."Search = ".round($t2,2);
    }
}        