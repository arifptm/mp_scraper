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

class ScrapeTokopedia extends Command
{
    
    protected $signature = 'sc:tp';

    protected $description = 'Scraping Tokopedia';


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

        $mp = $p->feedProcessor('tokopedia'); //smallcase

        $scraped['item_url'] = $p->selectItem($mp)->item_url;
        echo $scraped['item_url']."\n";
        $crawler = Goutte::request('GET', $scraped['item_url'] );

        $scraped['title']= str_limit($crawler->filter('h1')->text(),190,'');
        
        $scraped['slug'] = $slug->createSlug($scraped['title']);

        $cats = $crawler->filter('#breadcrumb-container a')->each (function ($node){
            return trim($node->text());
        });    

        $cats = array_slice($cats, 1);
       
        $scraped['category_id'] = $p->getCatId($cats);
        $scraped['sell_price'] = preg_replace("/[^0-9]/","",$crawler->filter('div.product-box span[itemprop=price]')->text());
        $scraped['raw_price'] = null;
        $scraped['discount'] = null;         

        $city['name']   = trim($crawler->filter('.product-box-content span[itemprop=location]')->text());
        $city['slug']   = $slug->createSlug($city['name']);
        $city = City::firstOrCreate($city);
        
        $seller['name']= trim($crawler->filter('.product-box-content a#shop-name-info')->text());
        
        $seller['image_url'] = $crawler->filter('.product-box-content picture img')->attr('src') ?: "https://s3-ap-southeast-1.amazonaws.com/new99toko/default_shop.png";
        $seller['slug'] = $slug->createSlug($seller['name']);
        $seller['marketplace_id'] = $mp->id;
        $seller['city_id'] = $city->id;
        $seller = Seller::firstOrCreate($seller);
        
        $scraped['seller_id'] = $seller->id;

        $img = $crawler->filter('div.jcarousel li a');

        if ($img->count() != 0 )
        {
            $imgs = $img->each (function ($node){
                return trim($node->attr('href'));
            });
            
        } else {
            $imgs[] = $crawler->filter('.product-imagebig img')->attr('src');
        }

        $scraped['images'] = serialize($imgs);
      
        $crawler -> filter('a,span')->each(function($nodes){
            foreach ($nodes as $node) {
                $node->parentNode->removeChild($node);
            }
        });

        $scraped['body'] = trim($crawler->filter('.product-info-holder p')->html());
         
        $details = $crawler->filter('.detail-info dt, .detail-info dd')->each(function($node, $key){
            $odd = $key%2;
                if($odd == 1){
                    return "<dt>".trim($node->text())."</dt>";
                } else {
                    return "<dd>".trim($node->text())."</dd>";
                }   
        });

        unset($details[0],$details[1],$details[4],$details[5]);


        $scraped['details'] = "<dl>".implode($details)."</dl>";      
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
   
        //$city -> save();
        //$seller ->save();
        $p->selectItem($mp)->update($scraped);

        $end = (microtime(true));
        $t1 = $start2 - $start1;
        $t2 = $end - $start2;

        echo "Scrape = ".round($t1,2)."\n"."Search = ".round($t2,2);
                
    }
}
