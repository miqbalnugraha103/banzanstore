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

Route::get('/', 'HomeController@index');
Route::get('/kategori/{kategori}/{page}', 'KategoriController@index');
Route::get('/barang/{toko}/{barang}', 'BarangController@index');
Route::get('/cara-pesan', 'CarapesanController@index');
Route::get('/keranjang', 'CartController@index');
Route::get('/cari/{nama}/{page}', 'SearchController@index');
Route::post('/checkout', 'CartController@checkout');
Route::post('/addkeranjang', 'CartController@addCart');
Route::get('/deletekeranjang/{index}', 'CartController@deleteCart');
Route::get('/deletekeranjang/{index}/{operasi}', 'CartController@editCart');
