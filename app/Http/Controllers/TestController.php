<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

use JonnyW\PhantomJs\Client;
use Symfony\Component\DomCrawler\Crawler;
use Browser\Casper;


class TestController extends Controller
{
	
	public function priceza(){
		$prs = Item::where('se','like',"%href='http%")->take(5)->get();
		
		foreach ($prs as $pr){
            
            $crawler = new Crawler($pr->se);
            
            $ahr = $crawler->filter('a')->each(function($node){
                return "<a href='#' data-url='".$node->attr('href')."'>".$node->text()."</a>";
            });
            
            $new = $crawler->filter('p')->each(function($node, $key) use ($ahr){
                 return "<p>". preg_replace("/<a\s(.+?)>(.+?)<\/a>/is", $ahr[$key] , $node->html())."</p>";
            });

            $new_se = implode("", $new);

            $pr->update(['se'=> $new_se]);  
            echo $pr->id. "...updated ! <br>";
            
	   }	

	}
	



	public function priceza_old(){
		//$prs = Item::wh3ere('se', 'like', '%priceza%')->where('se','not like', '%//www.priceza%')->take(10)->get();
		$prs = Item::where('se','like',"%href='http://www.priceza.co%")->get();    
		dd($prs->count());
		foreach ($prs as $pr){
			$crawler = new Crawler($pr->se);
			$ahrefs = $crawler->filter('a')->each(function($node){
				return $node->attr('href');
			});
				
			$crawler = new Crawler($pr->se);
			$dataurls = $crawler->filter('a')->each(function($node){
				return $node->attr('data-url');
			});

			$new_se = $pr->se;
			echo $new_se."<hr>";		
			
			if (strpos($pr->se, 'data-url') !== false){
				foreach($dataurls as $k=>$dataurl){
					$new_se = str_replace ("data-url='".$dataurl."'", "data-url='xxyyzz".$k."'", $new_se);
					//echo $dataurl."<hr>";
					//echo $new_se."<hr>";
				}
				$new_se = str_ireplace (array('di priceza.co.id','priceza.co.id', 'priceza.co', 'priceza'), '', $new_se);
				foreach($dataurls as $l=>$dataurl){
					$new_se = str_replace ("data-url='xxyyzz".$l."'", "data-url='".$dataurl."'", $new_se);
					//echo $dataurl."<hr>";
					//echo $new_se."<hr>";
				}
			} else {
				foreach($ahrefs as $m=>$ahref){
					$new_se = str_replace ("href='".$ahref."'", "href='#' data-url='xxyyzz".$m."'", $new_se);
					//echo $ahref."<hr>";
				}
				$new_se = str_ireplace (array('di priceza.co.id','priceza.co.id','priceza.co', 'priceza'), '', $new_se);
				foreach($ahrefs as $n=>$ahref){
					$new_se = str_replace ("data-url='xxyyzz".$n."'", "data-url='".$ahref."'", $new_se);
					//echo $ahref."<hr>";
				}								
			}			
			echo $new_se;
			echo "<p>".$pr->id."</p>";
			$pr->update(['se'=> $new_se]);				
		}
	}
	
	
    public function cektp(){
        $feed = "https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=1759";
        $src = json_decode(file_get_contents($feed));
        dd ($src->data->products);
        foreach ($src['data']['products'] as $key=>$item){
            echo $key.". ".$item['url']."<br />\n";
        }


        dd($src);

    }

    public function cekse(){
        $key = 'Dijual Cable VGA Premium Quality 20 M Promo 20170720';
        $se = new SearchResult;
        $ser = $se->Geevv($key);
        dd($ser);

    }
   
    public function cek(){
        $input = "Bukalapak";

        $mp = Marketplace::whereName($input)->first(); 
        
        $item_url = 'https://www.bukalapak.com/p/industrial/lain-lain-2389/2gh3vj-jual-flow-meter-flo-rite-series-888l';
        
        $crawler = Goutte::request('GET', $item_url);
        
        $scraped['title']= str_limit($crawler->filter('h1')->text(),190);

        $slug = new Slug;
        $scraped['slug'] = $slug->createSlug($scraped['title']);

        $cats = $crawler->filter('ul.c-breadcrumb a')->each (function ($node){
            return trim($node->text());
        });

        $cats = array_slice($cats, 1);

        $depth0 = null;

        foreach ($cats as $key=>$cat)
        {
            $key1 = $key+1;
            $rep = Feed::where('department',$cat)->first();
            if (count($rep) != 0)
            {
                $cat = $rep->replacer;
            }

            $slug = new Slug;
            $cat_slug = $slug -> createSlug($cat);

            ${'depth'.$key1} = Category::firstOrCreate([
                'name' => $cat, 
                'level' => $key, 
                'parent' => ${'depth'.$key}['id'],
                'slug' => $cat_slug ]);
            
            ${'depth'.$key1} -> save();
        }    
             
        $scraped['category_id'] = ${'depth'.$key1}->id;

        if (($crawler->filter('.c-product-detail-price__original .amount') === true ) AND ($crawler->filter('.c-product-detail-price__reduced .amount') === true )){
            $scraped['raw_price'] = preg_replace("/[^0-9]/","",$crawler->filter('div.c-product-detail-price__original .amount')->text());
            $scraped['sell_price'] = preg_replace("/[^0-9]/","",$crawler->filter('div.c-product-detail-price__reduced .amount')->text());
            $scraped['discount'] = (($scraped['raw_price'] - $scraped['sell_price']) / $scraped['raw_price'] )*100;
            $item_discount = round($discount,0,PHP_ROUND_HALF_UP);  
        } else {
            $scraped['sell_price'] = preg_replace("/[^0-9]/","",$crawler->filter('div.c-product-detail-price .amount')->text());
            $scraped['raw_price'] = null;
            $scraped['discount'] = null;    
        }   

        $seller_city = trim($crawler->filter('.c-user-identification .qa-seller-location')->text());
        $slug = new Slug;
        $city_slug = $slug->createSlug($seller_city);
        $city = City::firstOrCreate([ 'name' => $seller_city, 'slug' => $city_slug ]);
        //$city -> save();

        $seller['name']= trim($crawler->filter('.c-user-identification .qa-seller-name')->text());
        $seller['image_url'] = $crawler->filter('.c-user-identification img.c-avatar__image')->attr('src') ?: "https://ecs12.tokopedia.net/newimg/cache/100-square/default_v3-shopnophoto.png";
        
        $slug = new Slug;
        $seller['slug'] = $slug->createSlug($seller['name']);
        $seller['marketplace_id'] = $mp->id;
        $seller['city_id'] = $city->id;

        $seller = Seller::firstOrCreate($seller);
        //$seller ->save();
        
        $scraped['seller_id'] = $seller->id;        

        //images
        if ($crawler->filter('.c-product-image-gallery__thumbnails')->count() != 0 )
        {
            $imgs = $crawler->filter('a.c-product-image-gallery__thumbnail')
            ->each (function ($node){
                return trim($node->attr('href'));
            });
            
        } else {
            $imgs[] = $crawler->filter('.c-product-image-gallery a.qa-pd-image')->attr('href');
        }

        $scraped['images'] = serialize($imgs);

        //body
        $crawler -> filter('.qa-pd-description a, .qa-pd-description span, .qa-pd-description img')->each(function($nodes){
            foreach ($nodes as $node) {
                $node->parentNode->removeChild($node);
            }
        });

        $scraped['body'] = trim($crawler->filter('.qa-pd-description')->html());
        //dd($scraped);    
        

        $details = $crawler->filter('.c-product-spec dt, .c-product-spec dd')->each(function($node, $key){
            $odd = $key%2;
                if($odd == 1){
                    return "<dt>".trim($node->text())."</dt>";
                } else {
                    return "<dd>".trim($node->text())."</dd>";
                }   
        });

        $scraped['details'] = "<dl>".implode($details)."</dl>";
        
        $se = new SearchResult;
        $scraped['se'] = $se->Geevv($scraped['title']);

        $scraped['processed'] = 1 ;
        $scraped['views'] = (rand(10,100));

        $tag = new TagService;
        $tags = $tag->createTag($scraped['title']);
        foreach($tags as $t){
            $sl = new Slug;
            $slug = $sl->createSlug($t);

            $save_tag = Tag::firstOrCreate(['name' => $t, 'slug' => $slug]);
            //$save_tag->save();
            $tag_id[] = $save_tag->id;
        }

        $scraped['tags'] = serialize($tag_id);
       
        //$selected_item->update($scraped);
        dd($scraped);
    }


  

    public function phantom(){
        //$url = 'https://www.blibli.com/apple-ipad-pro-10-5-2017-256-gb-tablet-space-gray-wi-fi-cellular-4g-lte-APS.18826.00594.html';
        $url = "https://www.tokopedia.com/appleshock/monitor-lg-led-ips-23mp68vq/?src=featured_product&featuredpos=4_2";
        
        $client = Client::getInstance();
        $client -> getEngine()->setPath('d:\cdownload\phantomjs.exe');
        $request = $client->getMessageFactory()->createRequest($url);
        $response = $client->getMessageFactory()->createResponse();
        //dd($request);
        
        $client->send($request,$response);

//      dd($response);
        $crawler = new Crawler($response->getContent());

//dd($crawler);
        echo $crawler->filter('h1')->text();
        
        //$scraped['title']= str_limit($crawler->filter('h1')->text(),190);
     }

     public function casper(){

        //$url = 'https://www.blibli.com/apple-ipad-pro-10-5-2017-256-gb-tablet-space-gray-wi-fi-cellular-4g-lte-APS.18826.00594.html';
        $url = "https://www.tokopedia.com/appleshock/monitor-lg-led-ips-23mp68vq/?src=featured_product&featuredpos=4_2";

        $casper = new Casper();

        $casper->setOptions([
            'ignore-ssl-errors' => 'yes'
        ]);

        $casper->start('http://www.google.com');

        $casper->fillForm(
        'form[action="/search"]',
        array(
                'q' => 'search'
        ),
        true);

        $casper->run();

        //dd($casper);

     }
    
    
    
}
