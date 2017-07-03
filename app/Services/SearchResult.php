<?php
namespace App\Services;

use Goutte;

class SearchResult
{
    public function geevv($key)
    {
		$q = preg_replace("/[^A-Za-z0-9 ]/", ' ', $key);
		$q = urlencode($q);
		$url = "https://geevv.com/search?type=web&q=". $q;

		$crawler = Goutte::request('GET', $url );

		$r = $crawler->filter('div.list-ins .list')->each(function($node){
			if (strpos( $node->html() , "ads_search") === false ){
				$item['link'] = $node->filter('.link a')->attr('href');
				$title = trim($node->filter('.title')->text());
				$item['title'] = str_replace("...", "", $title);
				$desc = trim($node->filter('p')->text());
				$item['desc'] =  str_replace("...", "", $desc);
				return $item;
			}
		});
		$results = array_values(array_filter($r));

		if (isset($results)){
	 		$result ="";
		 	foreach ($results as $i=>$val){	
		 		if ($i == 0 OR $i == 3 ){
		 			$web = Goutte::request('GET',$val['link']);
					
		 			$result .= "<p>";
		 			$result .= "<a rel='nofollow' href='".$web->getUri()."'>".$val['title']."</a><br />";
		 		}
		 		$result .= $val['desc'].". ";		
		 		if ($i == count($results)-1 or $i == 2 ){
		 			$result .= "</p>";
		 		}
		 	}
		 } else {
		 	$result = '';
		 	}
		 return $result;
	
    }
}