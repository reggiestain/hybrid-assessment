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

//Guest Routes...
Route::get('/', ['as' => 'home', 'uses' => 'Front\PagesController@home']);
Route::get('register', ['as' => 'register', 'uses' => 'Front\PagesController@register']);
Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);
Route::get('/login', ['as' => 'login', 'uses' => 'Front\PagesController@login']);
Route::post('/login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
//Auth Routes...
Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', ['as' => 'auth.products', 'uses' => 'Auth\ProductController@index']);
    Route::post('/update', ['as' => 'admin.updateconfig', 'uses' => 'Admin\PagesController@storeconfig']); 
    Route::get('/transactions', ['as' => 'transactions', 'uses' => 'Auth\TransactionController@index']);
});
//Authenticated Guest Routes...
Route::group(['prefix' => 'guest','middleware' => ['auth','guest']], function() {
    Route::get('/product/{id}', ['as' => 'product.view', 'uses' => 'Auth\ProductController@view']);   
    Route::get('/balance', ['as' => 'account.balance', 'uses' => 'Auth\AccountBalanceController@edit']); 
    Route::post('/balance', ['as' => 'account.balance', 'uses' => 'Auth\AccountBalanceController@edit']);
    Route::get('/buy/{id}', ['as' => 'buy.product', 'uses' => 'Auth\ProductController@buy']);
});

//Authenticated Admin Routes...
Route::group(['prefix' => 'admin','middleware' => ['auth','admin']], function() {   
    Route::get('/product/edit/{id}', ['as' => 'product.discount', 'uses' => 'Auth\ProductController@edit']); 
    Route::post('/product/update', ['as' => 'product.update', 'uses' => 'Auth\ProductController@update']);
});







