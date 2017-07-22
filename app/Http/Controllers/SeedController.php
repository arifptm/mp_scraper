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

    public function tokopedia()
    {
    	$mp = Marketplace::firstOrCreate(['name' => 'Tokopedia', 'slug' => 'tokopedia' ]);

    	if ($mp->wasRecentlyCreated === true)
    	{
	        echo "<p>Marketplace <strong>$mp->name</strong> berhasil dibuat !</p>";
	        $input = [
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=1758' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=1759' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=1760' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=78' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=79' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=61' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=715' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=56' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=65' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=288' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=297' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=60' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=578' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=63' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=62' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=57' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=984' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=983' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=642' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=54' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=55' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=35' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=8' ],
				[ 'marketplace_id' => $mp->id, 'url' => 'https://ace.tokopedia.com/search/product/v3?fshop=1&ob=9&rows=25&device=desktop&source=directory&sc=20' ]
			];

			Feed::insert($input);
			echo "Feed: <strong>$mp->name</strong> berhasil dibuat !";
		} else {
			echo "<p>Marketplace <strong>$mp->name</strong> sudah ada</p>";
		}

    }
}
