<?php

Auth::routes();

Route::get('/', 'PublicController@index')->name('frontpage');

Route::get('/pg/{slug}', 'PageController@publicShow')->name('pages');

Route::post('/q/search', 'ItemController@searchResult');



Route::prefix('itm')->group(function(){
	Route::get('ct/{slug}', 'ItemController@itemByCity')->name('itembycity');
	Route::get('sl/{slug}', 'ItemController@itemBySeller')->name('itembyseller');
	Route::get('ca/{slug}', 'ItemController@itemByCategory')->name('itembycategory');
	Route::get('subca/{slug}', 'ItemController@itemBySubCategory')->name('itembysubcategory');
	Route::get('mk/{slug}', 'ItemController@itemByMarketplace')->name('itembymarketplace');
});

Route::prefix('ls')->group(function(){
	Route::get('marketplace', 'MarketplaceController@list')->name('marketplace_list');
	Route::get('city', 'CityController@list')->name('city_list');
	Route::get('seller', 'SellerController@list')->name('seller_list');
	Route::get('product', 'ItemController@list')->name('item_list');
	Route::get('search', 'ItemController@searchResult')->name('search_result');
});



Route::prefix('admin')->group(function(){
	Route::middleware([])->group(function () {
		Route::resource('marketplaces','MarketplaceController', ['except' => ['show']]);
		Route::resource('pages','PageController', ['except' => []]);
		Route::resource('items','ItemController', ['except' => []]);
		Route::resource('feeds','FeedController', ['except' => ['show']]);
		Route::resource('cities','CityController', ['except' => ['show', 'create', 'store']]);
		Route::resource('sellers','SellerController', ['except' => ['show']]);
		Route::resource('categories','CategoryController', ['except' => ['show','create','store']]);
		Route::resource('replacers','ReplacerController', ['except' => []]);

		Route::get('pending/{slug}', 'ItemController@pending');
		Route::get('soldout/{slug}', 'ItemController@soldout');
		Route::get('linkcheck/{slug}', 'LinkCheckerController@yetStat');
		Route::get('linkcheck/{slug}/run', 'LinkCheckerController@run');
	});
});


Route::get('/items/ca/{id}','ItemController@index');
Route::get('/items/ct/{id}','ItemController@cityList'); 


Route::get('/c/{slug}', 'CategoryController@publicIndex');

Route::get('/seed/bl', 'SeedController@bukalapak');
Route::get('/seed/tp', 'SeedController@tokopedia');

Route::get('/aa/{id}', 'CategoryController@getChild');


Route::prefix('sc')->group(function(){
	Route::get('bl', 'scraper\BukalapakController@scrape');
	Route::get('tp', 'scraper\TokopediaController@scrape');
});






Route::get('/{slug}', 'ItemController@publicShow')->name('nodes');

Route::get('/p/tes', 'TestController@test');
Route::get('/tes/cek', 'TestController@cek');
Route::get('/tes/cekse', 'TestController@cekse');
Route::get('/tes/cektp', 'TestController@cektp');
