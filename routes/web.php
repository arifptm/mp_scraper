<?php

Auth::routes();

Route::get('/', 'PublicController@index')->name('frontpage');

Route::prefix('itm')->group(function(){
	Route::get('ct/{slug}', 'ItemController@itemByCity')->name('itembycity');
	Route::get('sl/{slug}', 'ItemController@itemBySeller')->name('itembyseller');
	Route::get('ca/{slug}', 'ItemController@itemByCategory')->name('itembycategory');
	Route::get('mk/{slug}', 'ItemController@itemByMarketplace')->name('itembymarketplace');
});

Route::prefix('ls')->group(function(){
	Route::get('marketplace', 'MarketplaceController@list')->name('marketplace_list');
	Route::get('city', 'CityController@list')->name('city_list');
	Route::get('seller', 'SellerController@list')->name('seller_list');
	Route::get('product', 'ItemController@list')->name('item_list');
});


Route::get('/pg/{slug}', 'PageController@publicShow')->name('pages');

Route::get('/{slug}', 'ItemController@publicShow')->name('nodes');


Route::get('/aa/a', function(){
	return App\Item::search('kamera')->where('title','!=', '')->get();
});

Route::get('/aa/b', 'SearchController@sc');



//Route::get('/home', 'HomeController@index')->name('home');













Route::get('/sc/toped', 'TokopediaController@index');

Route::prefix('admin')->group(function(){
	Route::middleware([])->group(function () {
		Route::resource('marketplaces','MarketplaceController', ['except' => ['show']]);
		Route::resource('pages','PagesController', ['except' => []]);
	});

});



Route::resource('/feeds','FeedController', ['except' => ['show']]);
Route::resource('/cities','CityController', ['except' => ['show', 'create', 'store']]);

Route::resource('/sellers','SellerController', ['except' => ['show']]);
Route::resource('/categories','CategoryController', ['except' => ['show','create','store']]);

Route::resource('/items','ItemController', ['except' => ['index']]);

Route::get('/items', 'ItemController@ItemsList');
Route::get('/items/ca/{id}','ItemController@index');
Route::get('/items/ct/{id}','ItemController@cityList'); 





Route::get('/c/{slug}', 'CategoryController@publicIndex');



Route::get('/seed/bl', 'SeedController@bukalapak');

Route::get('/aa/{id}', 'CategoryController@getChild');
Route::get('/sc/bl', 'TestController@bl');