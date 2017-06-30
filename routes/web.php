<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sc/toped', 'TokopediaController@index');

Route::resource('/marketplaces','MarketplaceController', ['except' => ['show']]);
Route::resource('/categories','CategoryController', ['except' => ['show']]);
Route::resource('/feeds','FeedController', ['except' => ['show']]);
Route::resource('/cities','CityController', ['except' => ['show']]);
Route::resource('/sellers','SellerController', ['except' => ['show']]);
Route::resource('/items','ItemController', ['except' => ['show']]);

Route::get('/test', 'TestController@index');
