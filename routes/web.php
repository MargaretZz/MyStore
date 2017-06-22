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

Route::get('/', 'FrontController@index');
Route::get('/product/{category}', 'FrontController@getProductByCategory');
Route::get('/cart/add/{id}', 'FrontController@addCart');
Route::get('/cart', 'FrontController@getCart');
Route::get('/cart/delete/{id}', 'FrontController@deleteCart');
Route::get('/order', 'FrontController@order');
Route::get('/order/post', 'FrontController@orderPost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/category/add', 'HomeController@addCategory');
    Route::post('/category/post', 'HomeController@postCategory');
    Route::get('/category/list', 'HomeController@index');
    Route::get('/category/delete/{id?}', 'HomeController@deleteCategory');

    Route::get('/product/list/{category?}', 'HomeController@listProduct');
    Route::get('/product/add', 'HomeController@addProduct');
    Route::post('/product/post', 'HomeController@postProduct');
    Route::get('/product/delete/{id?}', 'HomeController@deleteProduct');
});




