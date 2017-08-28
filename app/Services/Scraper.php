<?php
namespace App\Services;
use App\Item;
use App\Category;
use App\Feed;
use App\Marketplace;
use App\Replacer;
use Goutte;

use JonnyW\PhantomJs\Client;


class Scraper
{
	public function feedProcessor($mk_slug)
	{
		$mp = Marketplace::whereSlug($mk_slug)->first();     	
    	$feed = Feed::where('marketplace_id', $mp->id)->whereEnabled('1')->whereProcessed('0');

   		if ($feed->count() != 0){
    		$selected_feed = $feed->get()->random();

    		$crawler = Goutte::request('GET', $selected_feed->url);
      		
            if ($mp->slug == "bukalapak"){

                $urls = $crawler->filter('item > guid')->each (function ($node){
    						return trim($node->text());
    					});   	

    	     	foreach ($urls as $url) {
    	     		$url = str_replace('/m.bukalapak','/www.bukalapak', $url); // special bukalapak
                    $url = trim($url);
                    $item =Item::firstOrNew(['item_url' => $url]);
                    $item->feed_id = $selected_feed->id;
                    $item->save();
    	     	}	
            } 


            if ($mp->slug == "tokopedia"){                
                $crawler = json_decode(file_get_contents($selected_feed->url));
                foreach ($crawler->data->products as $item){
                    $title = explode('?trkid=',$item->url);
                    $item = Item::firstOrNew(['item_url' => $title[0]]);
                    $item->feed_id = $selected_feed->id;
                    $item->save();
                }                    
            }
            
            if ($mp->slug == "blibli"){

                $urls = $crawler->filter('.product-list a.single-product')->each (function ($node){
                            return explode('?ds=',trim($node->attr('href')))[0];
                        });     

                foreach ($urls as $url) {
                    $item =Item::firstOrNew(['item_url' => $url]);
                    $item->feed_id = $selected_feed->id;
                    $item->save();
                }   
            }    

            if ($mp->slug == "lazada"){      
                if ( $crawler->filter('.product_list .product-card')->count()) {
                    $urls = $crawler->filter('.product_list .product-card')->each (function ($node){
                        return $node->attr('data-original');
                    });
                } elseif ($crawler->filter('.c-product-card__description a.c-product-card__name')->count()){ 
                     $urls = $crawler->filter('.c-product-card__description a.c-product-card__name')->each (function ($node){
                        $itm = $node->attr('href');
                        $itm = explode('?ff=', $itm)[0];
                        return 'http://www.lazada.co.id'.$itm;
                    });
                }     

                foreach ($urls as $url) {
                    $item =Item::firstOrNew(['item_url' => $url]);
                    $item->feed_id = $selected_feed->id;
                    $item->save();
                }   
            }                 
 
    		Feed::whereId($selected_feed->id)->update(['processed' => 1]);
    	}
    	return $mp;
	}	





	public function selectItem($mp)
	{
	    $select = Item::whereIn('feed_id', $mp->feed->pluck('id'))->whereProcessed(0)->get();
            
        if ($select->count() != 0 ){
        	$selected_item = $select->random();
        	return $selected_item;
        } else {
        	Feed::whereMarketplace_id($mp->id)->update(['processed' => 0]);
        	return "$mp->name Feed Reset";
        }    	
    }

    public function getCatId($cats)
    {
    	$depth0 = null;
        foreach ($cats as $key=>$cat)
        {
            $key1 = $key+1;
            $rep = Replacer::whereDepartment($cat)->whereLevel($key)->first();
            if (count($rep) != 0){
                $cat = $rep->replacer;               
            }            

            $slug = new Slug;
            $cat_slug = $slug -> createSlug($cat);

            ${'depth'.$key1} = Category::firstOrCreate([
                'name' => $cat, 
                'level' => $key, 
                'parent' => ${'depth'.$key}['id'],
                'slug' => $cat_slug 
            ]);            
        }      
        return ${'depth'.$key1}->id;
    }

    public function checkRootCat($cat){
        $root = Category::whereLevel(0)->pluck('name')->toArray();
        if (in_array( $cat , $root )){
            return true;
        } else {
            return false;
        }
    }

    public function clearStyle($v){
        $dom = new \DOMDocument;
        $dom->loadHTML($v);
        $xpath = new \DOMXPath($dom);
        $nodes = $xpath->query('//*[@style]');
        foreach ($nodes as $node) {
            $node->removeAttribute('style');
        }
        return $dom->saveHTML();
    }

    public function letsCurl($url){   
        $agents = array(
            'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1',
            'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.9) Gecko/20100508 SeaMonkey/2.0.4',
            'Mozilla/5.0 (Windows; U; MSIE 7.0; Windows NT 6.0; en-US)',
            'Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_6_7; da-dk) AppleWebKit/533.21.1 (KHTML, like Gecko) Version/5.0.5 Safari/533.21.1'
        );

        $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
        $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Keep-Alive: 300";
        $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $header[] = "Accept-Language: en-us,en;q=0.5";
        $header[] = "Pragma: ";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_USERAGENT,$agents[array_rand($agents)]);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function getBody($url){
        $client = Client::getInstance();
        $client->isLazy();
        $client -> getEngine()->setPath(env('PHANTOMJS_PATH'));
        $request = $client->getMessageFactory()->createRequest($url);
        $request->setTimeout(10000);
        $response = $client->getMessageFactory()->createResponse();        
        $client->send($request,$response);    
        return $response;
    }

    public static function getImage($imgs, $mp_slug){
        $i = unserialize($imgs);

        if ($mp_slug == 'tokopedia'){        
            $images['teaser'] = str_replace('/img/product-1/', '/img/cache/300-square/product-1/', $i);
            $images['node'] = str_replace('/img/product-1/', '/img/cache/300-square/product-1/',  $i);
            $images['thumb'] = str_replace('/img/product-1/', '/img/cache/100-square/product-1/',  $i);
        }

        if ($mp_slug == 'bukalapak'){        
            $images['node'] = str_replace('/m-1000-1000/', '/s-300-300/', $i);
            $images['teaser'] = str_replace('/m-1000-1000/', '/s-240-240/', $i);
            $images['thumb'] = str_replace('/m-1000-1000/', '/s-50-50/', $i);
        }
        if ($mp_slug == 'lazada'){        
            $images['teaser'] = str_replace('-gallery.', '-webp-catalog_233.', $i);
            $images['teaser'] = str_replace('-gallery_44x44.', '-webp-catalog_233.', $images['teaser'] );
            $images['node'] = str_replace('-gallery.', '-webp-product.',  $i);           
            $images['node'] = str_replace('-gallery_44x44.', '-webp-product_340x340.',  $images['node']);
            $images['thumb'] = str_replace('-gallery.', '-webp-gallery.',  $i);
            $images['thumb'] = str_replace('-gallery_44x44.', '-webp-gallery_44x44.',  $images['thumb']);
        }
        if ($mp_slug == 'blibli'){        
            $images['teaser'] = str_replace('/thumbnail/', '/medium/', $i);
            $images['node'] = str_replace('/thumbnail/', '/full/',  $i);
            $images['thumb'] = str_replace('/thumbnail/', '/thumbnail/',  $i);
        }
        if ($mp_slug == 'mataharimall'){        
            $images['teaser'] = str_replace('/p/', '/tx200/', $i);
            $images['node'] = str_replace('/p/', '/tx400/',  $i);
            $images['thumb'] = str_replace('/p/', '/tx200/',  $i);
        }        

        return $images;
    }
    	
}