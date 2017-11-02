<?php

namespace App\Http\Controllers\scraper;

use App\Http\Controllers\Controller;

use App\Feed;
use App\Marketplace;
use App\Item;
use App\Category;
use App\Seller;
use App\City;
use App\Tag;
use App\Replacer;

use \App\Services\SearchResult;
use \App\Services\TagService;



use Wa72\HtmlPageDom\HtmlPageCrawler;

class BukalapakController extends Controller
{    





    public function scrape()
    {        
        $marketplace = Marketplace::whereSlug('bukalapak')->first();
        
        $this->feedProcessor($marketplace->id);

        $item = $this->selectItem($marketplace);

        /*
         *  Start to scrape
         */
        
        $scraped['item_url'] = $item->item_url;

        //$crawler = Goutte::request('GET', $scraped['item_url'] );

        $crawler = HtmlPageCrawler::create(file_get_contents($scraped['item_url']));        
        
        $scraped['title']= str_limit($crawler->filter('h1')->text(),190,'');       

        

        //***CATEGORY
        $cats = $crawler->filter('ul.c-breadcrumb a')->each (function ($node){
            return trim($node->text());
        });    
        $cats = array_slice($cats, 1);
        $scraped['category_id'] = $this->getCatId($cats);  
        


        //***PRICE
        if (($crawler->filter('.c-product-detail-price__original .amount')->count() ) AND ($crawler->filter('.c-product-detail-price__reduced .amount')->count() )){
            $scraped['raw_price'] = preg_replace("/[^0-9]/","",$crawler->filter('.c-product-detail-price__original .amount')->text());
            $scraped['sell_price'] = preg_replace("/[^0-9]/","",$crawler->filter('.c-product-detail-price__reduced .amount')->text());
            $discount = (($scraped['raw_price'] - $scraped['sell_price']) / $scraped['raw_price'] )*100;
            $scraped['discount'] = round($discount,0,PHP_ROUND_HALF_UP);
        } else {
            $scraped['sell_price'] = preg_replace("/[^0-9]/","",$crawler->filter('div.c-product-detail-price .amount')->text());
        } 
              


        //***CITY
        $city['name']   = trim($crawler->filter('.c-user-identification .qa-seller-location')->text());
        $city = City::firstOrCreate($city);
        


        //***SELLER
        $seller['name']= trim($crawler->filter('.c-user-identification .qa-seller-name')->text());
        $seller['image_url'] = $crawler->filter('.c-user-identification img.c-avatar__image')->attr('src') ?: '';        
        $seller['item_id'] = $item->id;
        $seller['city_id'] = $city->id;
        $seller = Seller::firstOrCreate($seller);        
        $scraped['seller_id'] = $seller->id;



        //***IMAGES
        $img = $crawler->filter('.c-product-image-gallery__thumbnail');

        if ($img->count() > 0 ){
            $imgs = $img->each (function ($node){
                return trim($node->attr('href'));
            });
            
        } else {
            $imgs[] = $crawler->filter('.c-product-image-gallery a.qa-pd-image')->attr('href');
        }
        $scraped['images'] = serialize($imgs);



        //***DESCRIPTION
        $crawler -> filter('.qa-pd-description img')->each(function($node){            
            return $node->remove();
        });

        $crawler -> filter('.qa-pd-description a')->each(function($node){            
            return $node->unwrap();
        });

        $scraped['body'] = trim($crawler->filter('.qa-pd-description')->html());
 


        //***DETAIL
        $details = $crawler->filter(' .c-product-spec dd, .c-product-spec dt')->each(function($node){
            return $node->removeAttr('class');
        });

        $scraped['details'] = '<dl class="dl-horizontal">'.implode($details).'</dl>';



        //***TAG for AUTOCOMPLETE
        $tags = TagService::createTag($scraped['title']);
        foreach($tags as $t){
            $tag['name'] = $t;            
            $save_tag = Tag::firstOrNew($tag);
            $tag['count'] = $save_tag->count + 1;
            $save_tag->save();            
            $tag_id[] = $save_tag->id;
        }

        $scraped['tags'] = serialize($tag_id);


        //***SEARCH RESULT 
        $scraped['se'] = SearchResult::Geevv($scraped['title']);

        

        //***OTHERS
        $scraped['processed'] = 1 ;
        $scraped['views'] = (rand(10,100));        


        //***UPDATE ITEM with SCRAPED
        $item->update($scraped);

        return $item->title." update..!";

    } 





    public function feedProcessor($id){
        $feed = Feed::where('marketplace_id', $id)->whereEnabled(1)->whereProcessed(0)->get();

        if($feed->count() > 0){
            $selected_feed = $feed->random();
            $crawler = Goutte::request('GET', $selected_feed->url);
            $crawler->filter('.basic-products li li')->each (function ($nodes){
                foreach ($nodes as $node) {
                    $node->parentNode->removeChild($node);
                }
            });      

            $crawler->filter('.basic-products a.product-media__link')->each (function ($node) use($selected_feed){
                $url = "https://www.bukalapak.com".explode('?', $node->attr('href'))[0];
                $item =Item::firstOrNew(['item_url' => $url]);
                $item->feed_id = $selected_feed->id;
                $item->save();
            });

            Feed::whereId($selected_feed->id)->update(['processed' => 1]);
        } 
    }

    public function selectItem($marketplace){
        $select = Item::whereIn('feed_id', $marketplace->feed->pluck('id'))->whereProcessed(0)->get();
            
        if ($select->count() > 0 ){
            $selected_item = $select->random();
            return $selected_item;
        } else {
            Feed::whereMarketplace_id($marketplace->id)->update(['processed' => 0]);
            return "$marketplace->name Feed Resetted...!";
        }       
    }

    public function getCatId($cats){
        $root = Category::whereLevel(0)->pluck('name')->toArray();
        foreach ($cats as $level=>$cat){
            $replacer = Replacer::whereDepartment($cat)->whereLevel($level)->first();
            if(count($replacer) > 0){
                $cat = $replacer->replacer;
            }

            
            if($level == 0 && in_array( $cat , $root ) ) {
                $cat = 'Kategori Lain-lain';
            } 
            
            $new_cat = Category::firstOrNew([ 'name'=>$cat, 'level'=>$level ]);
            if($level > 0){
                $new_cat['parent'] = $new_cat->id;
            }
            $new_cat->save();
        }
        return $new_cat->id;
    }

}
