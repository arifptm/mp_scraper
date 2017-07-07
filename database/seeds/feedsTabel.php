<?php

use Illuminate\Database\Seeder;
use App\Feed;
use App\Marketplace;

class feedsTabel extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$mp = Marketplace::insert(['name' => 'Bukapalak' ]);
    	dd($mp);


        $input = array(
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=2266', 'department' => 'Perawatan & Kecantikan', 'replacer' => 'Kesehatan & Kecantikan'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=2359', 'department' => 'Kesehatan', 'replacer' => 'Kesehatan & Kecantikan'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=159', 'department' => 'Fashion Wanita', 'replacer' => 'Fashion Wanita'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=164', 'department' => 'Fashion Pria', 'replacer' => 'Fashion Pria'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=7', 'department' => 'Handphone', 'replacer' => 'Handphone & Tablet'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=1', 'department' => 'Komputer', 'replacer' => 'Komputer & Laptop'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=510', 'department' => 'Elektronik', 'replacer' => 'Elektronik & Alat Rumah Tangga'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=10', 'department' => 'Kamera', 'replacer' => 'Kamera & Video'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=58', 'department' => 'Hobi & Koleksi', 'replacer' => 'Hobi & Olahraga'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=61', 'department' => 'Olahraga', 'replacer' => 'Hobi & Olahraga'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=64', 'department' => 'Sepeda', 'replacer' => 'Hobi & Olahraga'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=13', 'department' => 'Fashion Anak', 'replacer' => 'Perlengkapan Ibu, Anak & Bayi'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=68', 'department' => 'Perlengkapan Bayi', 'replacer' => 'Perlengkapan Ibu, Anak & Bayi'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=65', 'department' => 'Rumah Tangga', 'replacer' => 'Elektronik & Alat Rumah Tangga'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=139', 'department' => 'Food', 'replacer' => 'Makanan & Minuman'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=19', 'department' => 'Mobil, Part dan Aksesoris', 'replacer' => 'Otomotif & Industrial'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=471', 'department' => 'Motor', 'replacer' => 'Otomotif & Industrial'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=1648', 'department' => 'Industrial', 'replacer' => 'Otomotif & Industrial'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=70', 'department' => 'Perlengkapan Kantor', 'replacer' => 'Perlengkapan Kantor'),
			array( 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=1695', 'department' => 'Tiket & Voucher', 'replacer' => 'Buku, Tiket & Voucher')
		);

		Feed::insert($input);

    }
}
