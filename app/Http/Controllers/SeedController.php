<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marketplace;
use App\Feed;

class SeedController extends Controller
{
    public function bukalapak()
    {
    	$mp = Marketplace::firstOrCreate(['name' => 'Bukalapak' ]);

    	if ($mp->wasRecentlyCreated === true)
    	{
	        echo "<p>Marketplace <strong>$mp->name</strong> berhasil dibuat !</p>";
	        $input = [
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=2266', 'department' => 'Perawatan & Kecantikan', 'replacer' => 'Kesehatan & Kecantikan'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=2359', 'department' => 'Kesehatan', 'replacer' => 'Kesehatan & Kecantikan'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=159', 'department' => 'Fashion Wanita', 'replacer' => 'Fashion Wanita'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=164', 'department' => 'Fashion Pria', 'replacer' => 'Fashion Pria'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=7', 'department' => 'Handphone', 'replacer' => 'Handphone & Tablet'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=1', 'department' => 'Komputer', 'replacer' => 'Komputer & Laptop'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=510', 'department' => 'Elektronik', 'replacer' => 'Elektronik & Alat Rumah Tangga'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=10', 'department' => 'Kamera', 'replacer' => 'Kamera & Video'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=58', 'department' => 'Hobi & Koleksi', 'replacer' => 'Hobi & Olahraga'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=61', 'department' => 'Olahraga', 'replacer' => 'Hobi & Olahraga'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=64', 'department' => 'Sepeda', 'replacer' => 'Hobi & Olahraga'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=13', 'department' => 'Fashion Anak', 'replacer' => 'Perlengkapan Ibu, Anak & Bayi'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=68', 'department' => 'Perlengkapan Bayi', 'replacer' => 'Perlengkapan Ibu, Anak & Bayi'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=65', 'department' => 'Rumah Tangga', 'replacer' => 'Elektronik & Alat Rumah Tangga'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=139', 'department' => 'Food', 'replacer' => 'Makanan & Minuman'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=19', 'department' => 'Mobil, Part dan Aksesoris', 'replacer' => 'Otomotif & Industrial'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=471', 'department' => 'Motor', 'replacer' => 'Otomotif & Industrial'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=1648', 'department' => 'Industrial', 'replacer' => 'Otomotif & Industrial'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=70', 'department' => 'Perlengkapan Kantor', 'replacer' => 'Perlengkapan Kantor'],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://www.bukalapak.com/feed/feed.rss?category_id=1695', 'department' => 'Tiket & Voucher', 'replacer' => 'Buku, Tiket & Voucher']
			];

			Feed::insert($input);
			echo "Feed: <strong>$mp->name</strong> berhasil dibuat !";
		} else {
			echo "<p>Marketplace <strong>$mp->name</strong> sudah ada</p>";
		}

    }
}
