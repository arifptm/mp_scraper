<?php

namespace App\Http\Controllers\scraper;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

class TokopediaController extends Controller
{
    public function scrape()
    {
        $p = new Scraper;
        $slug = new Slug;
        $se = new SearchResult;
        $tag_sr = new TagService;

        $mp = $p->feedProcessor('tokopedia'); //smallcase

        $scraped['item_url'] = $p->selectItem($mp)->item_url;

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
        
        $seller['image_url'] = $crawler->filter('.product-box-content picture img')->attr('src') ?: "https://ecs12.tokopedia.net/newimg/cache/100-square/default_v3-shopnophoto.png";
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

            $save_tag = Tag::firstOrCreate($tag);
            $save_tag->save();
            $tag_id[] = $save_tag->id;
        }

        $scraped['tags'] = serialize($tag_id);
        
        $scraped['se'] = $se->Geevv($scraped['title']);
   
        $city -> save();
        $seller ->save();
        $p->selectItem($mp)->update($scraped);

        dd($scraped);  

    }
}
