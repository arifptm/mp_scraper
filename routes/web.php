<?php

Auth::routes();

Route::get('/', 'PublicController@index');

Route::get('/itm/ct/{slug}', 'ItemController@itemByCity')->name('itembycity');
Route::get('/itm/sl/{slug}', 'ItemController@itemBySeller')->name('itembyseller');
Route::get('/itm/ca/{slug}', 'ItemController@itemByCategory')->name('itembycategory');

Route::get('/{slug}', 'ItemController@publicShow')->name('nodes');

//Route::get('/home', 'HomeController@index')->name('home');













Route::get('/sc/toped', 'TokopediaController@index');

Route::resource('/marketplaces','MarketplaceController', ['except' => ['show']]);
Route::resource('/feeds','FeedController', ['except' => ['show']]);
Route::resource('/cities','CityController', ['except' => ['show', 'create', 'store']]);

Route::resource('/sellers','SellerController', ['except' => ['show']]);
Route::resource('/categories','CategoryController', ['except' => ['show','create','store']]);

Route::resource('/items','ItemController', ['except' => ['index']]);

Route::get('/items', 'ItemController@ItemsList');
Route::get('/items/ca/{id}','ItemController@index');
Route::get('/items/ct/{id}','ItemController@cityList'); 

Route::get('/test', 'TestController@index');
Route::get('/t1', 'TestController@t1');


Route::get('/c/{slug}', 'CategoryController@publicIndex');



Route::get('/seed/bl', 'SeedController@bukalapak');

Route::get('/aa/{id}', 'CategoryController@getChild');



