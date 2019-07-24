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

Route::get('/', 'PagesController@front')->name('front');
Route::get('/tablets', 'PagesController@productTypes')->name('product.type');
Route::get('/product/{id}', 'ProductsController@product')->name('product');
