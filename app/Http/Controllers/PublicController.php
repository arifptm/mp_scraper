<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;



class PublicController extends Controller
{
	public function index()
	{
  //     $title = 'Katalog produk dan seller marketplace Indonesia';
  //     $desc = 'Tempat mencari dan memilih barang murah berkualitas di berbagai marketplace Indonesa secara cepat dan tepat. Bandingakan harga di Tokopedia, Bukalapak, Elevenia, Shopee, Bhineka, Qoo10 Indonesia dan lainnya.';
  //     $key = ['katalog produk', 'produk terbaru', 'daftar harga', 'harga murah', 'cek harga', 'harga diskon', 'promo murah', 'produk murah', 'perbandingan harga', 'jual beli', 'info harga', 'info lengkap', 'barang baru', 'barang bekas', 'rekomendasi', 'mesin pencari', 'marketplace indonesia'];

  //     SEOMeta::setTitle($title);
  //     SEOMeta::setDescription($desc);
  //     SEOmeta::setKeywords($key);

  //     Opengraph::setUrl(\Request::url());      
  //     Opengraph::addProperty('type', 'product');
  //     Opengraph::addProperty('image', 'http://google.com');
  //     Opengraph::addProperty('title', $title);
  //     Opengraph::addProperty('description', $desc);
        
  //     Twitter::setSite('@LuizVinicius73');
  //     Twitter::setTitle('Homepage');
		// Twitter::addValue('creator', 'produk');


		return view('public.index');	
	}
}