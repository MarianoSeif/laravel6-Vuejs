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

Route::get('/', 'MainController@index')->name('index');

Route::get('/links', 'MainController@links')->name('links');

Route::get('/about', 'MainController@about')->name('about');

Route::match(['get', 'post'], '/product/create', 'ProductController@create')->name('product_create')->middleware('auth');

Route::get('/product/{product}/show', 'ProductController@show')->name('product_show');

Route::get('/product/{product}/remove', 'ProductController@remove')->name('product_remove')->middleware('auth');

Route::match(['get', 'post'], '/product/{product}/edit', 'ProductController@edit')->name('product_edit')->middleware('auth');

Route::get('/product/{orderBy}', 'MainController@productsIndex')->name('product');

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();
