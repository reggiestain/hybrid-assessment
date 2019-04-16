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
Route::get('/option/{id}', ['as' => 'options', 'uses' => 'Front\PagesController@options']);
Route::get('/register', ['as' => 'register', 'uses' => 'Front\PagesController@register']);
Route::post('/register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);
Route::resource('/cart', 'Front\CartController');
Route::get('/cart/pupolar', 'Front\CartController@index');
Route::get('/cart/add/{id}', ['as' => 'cart.add', 'uses' =>'Front\CartController@add']);
//Route::put('/cart/update/{id}', ['as' => 'cart.update', 'uses'=>'Front\CartController@update']);

Route::get('/login', ['as' => 'login', 'uses' => 'Front\PagesController@login']);
Route::post('/login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@handleProviderCallback');
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







