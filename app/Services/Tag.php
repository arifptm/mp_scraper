<?php

namespace App\Services;
use App\Item;

class Tag {
	public function createTag($string)
	{
		
		$filter = [
			' yang ', 
			' ke ', 
			' dari ',
			' di ',
			' karena ',
			' mie '
		];
		$filtered = str_replace( $filter, ' ', $string );
		$pecah = explode(' ', $filtered);
		
		$cp = count($pecah)/2;
		$cpp = count($pecah);

		if ($cpp > 5)
		{
			$cpp = 5;
		}

			if ($cp%2 != 0){
				$cpp = $cpp-2; 
			} else {
				$cpp = $cpp-3;
			}



		for($i=0;$i<$cpp;$i=$i+2)
		{
//			$p[]=$pecah[$i]." ".$pecah[$i+1]; 
			$p[] = $pecah[$i]." ".$pecah[$i+1];
			$p[] = $pecah[$i+1]." ".$pecah[$i+2];
		}


		return $p;

	}
}