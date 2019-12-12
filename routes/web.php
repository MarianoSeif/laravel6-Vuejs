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

Route::get('/vueapp', 'MainController@vueapp')->name('vueapp');

//Route::get('/api/products', 'MainController@returnProducts')->name('returnProducts');


Route::resource('product', 'ProductsController');

Auth::routes();

Route::get('/welcome', function () {
    return view('welcome');
});
