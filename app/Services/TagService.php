<?php

namespace App\Services;
use App\Item;

class TagService {
	public function createTag($string)
	{
		
		$filter1 = [			
			' yang ', 
			' akan ',
			' dan ', 
			' ke ', 
			' dari ',
			' di ',
			' karena ',
			' mie ',
			' dijual '
		];

		$filter2 = ['.',',',';','(',')','[',']','|'];
		
		$string = trim($string);
		$string = preg_replace('/[^a-zA-Z0-9]\s/',"", $string);
		$string = preg_replace(array('/\b\w{1,2}\b/','/\s+/'),array('',' '),$string);		
		$string = str_ireplace( $filter1, ' ', $string );
		$string = str_replace( '  ', ' ', $string );		
		$string = str_replace($filter2,'', $string);

		$pecah = explode(' ', $string);
		$pecah = array_slice($pecah, 0, 10);
		
		$cp = count($pecah);

		for($i=0;$i < $cp-1;$i=$i+1)
		{
			$p[] = $pecah[$i]." ".$pecah[$i+1];			
		}
	
		if ($cp == 1)
		{
			$p[]=$pecah[0];	
		}
		

		return $p;

	}
}