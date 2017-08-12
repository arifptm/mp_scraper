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

class BukalapakController extends Controller
{
    public function scrape()
    {

        $p = new Scraper;
        $slug = new Slug;
        $se = new SearchResult;
        $tag_sr = new TagService;

        $mp = $p->feedProcessor('bukalapak'); //smallcase

        $scraped['item_url'] = $p->selectItem($mp)->item_url;
        //$scraped['item_url'] = 'https://www.bukalapak.com/p/fashion-pria/celana-299/celana-pendek-2599/yzp3r-jual-best-seller-celana-pendek-tactical-blackhawk?from=old-popular-section-5';

        $crawler = Goutte::request('GET', $scraped['item_url'] );
        
        $scraped['title']= str_limit($crawler->filter('h1')->text(),190,'');
        
        $scraped['slug'] = $slug->createSlug($scraped['title']);

        $cats = $crawler->filter('ul.c-breadcrumb a')->each (function ($node){
            return trim($node->text());
        });    

        $cats = array_slice($cats, 1);

        $scraped['category_id'] = $p->getCatId($cats);

		if (($crawler->filter('.c-product-detail-price__original .amount')->count() ) AND ($crawler->filter('.c-product-detail-price__reduced .amount')->count() )){
			$scraped['raw_price'] = preg_replace("/[^0-9]/","",$crawler->filter('.c-product-detail-price__original .amount')->text());
			$scraped['sell_price'] = preg_replace("/[^0-9]/","",$crawler->filter('.c-product-detail-price__reduced .amount')->text());
			$discount = (($scraped['raw_price'] - $scraped['sell_price']) / $scraped['raw_price'] )*100;
			$scraped['discount'] = round($discount,0,PHP_ROUND_HALF_UP);	
		} else {
			$scraped['sell_price'] = preg_replace("/[^0-9]/","",$crawler->filter('div.c-product-detail-price .amount')->text());
			//$scraped['raw_price'] = null;
			//$scraped['discount'] = null;	
		} 

        $city['name']   = trim($crawler->filter('.c-user-identification .qa-seller-location')->text());
        $city['slug']   = $slug->createSlug($city['name']);
        $city = City::firstOrCreate($city);
        
        $seller['name']= trim($crawler->filter('.c-user-identification .qa-seller-name')->text());
        $seller['image_url'] = $crawler->filter('.c-user-identification img.c-avatar__image')->attr('src') ?: "https://ecs12.tokopedia.net/newimg/cache/100-square/default_v3-shopnophoto.png";
        $seller['slug'] = $slug->createSlug($seller['name']);
        $seller['marketplace_id'] = $mp->id;
        $seller['city_id'] = $city->id;
        $seller = Seller::firstOrCreate($seller);
        
        $scraped['seller_id'] = $seller->id;

        $img = $crawler->filter('.c-product-image-gallery__thumbnail');

        if ($img->count() != 0 )
        {
            $imgs = $img->each (function ($node){
                return trim($node->attr('href'));
            });
            
        } else {
            $imgs[] = $crawler->filter('.c-product-image-gallery a.qa-pd-image')->attr('href');
        }

        $scraped['images'] = serialize($imgs);
        $crawler -> filter('.qa-pd-description a, .qa-pd-description span, .qa-pd-description img')->each(function($nodes){
            foreach ($nodes as $node) {
                $node->parentNode->removeChild($node);
            }
        });

        $scraped['body'] = trim($crawler->filter('.qa-pd-description')->html());
        $details = $crawler->filter('.c-product-spec dt, .c-product-spec dd')->each(function($node, $key){
            $odd = $key%2;
                if($odd == 1){
                    return "<dt>".trim($node->text())."</dt>";
                } else {
                    return "<dd>".trim($node->text())."</dd>";
                }   
        });

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
