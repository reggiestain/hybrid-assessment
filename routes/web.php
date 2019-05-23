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
//Route::group(['middleware' => ['isVerified']], function() {
Route::get('/', ['as' => 'home', 'uses' => 'Front\PagesController@home']);
Route::get('/contact', ['as' => 'contact', 'uses' => 'Front\PagesController@contact']);
Route::get('/option/{id}', ['as' => 'options', 'uses' => 'Front\PagesController@options']);
Route::get('/register', ['as' => 'register', 'uses' => 'Front\PagesController@register']);
Route::post('/register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);
Route::resource('/cart', 'Front\CartController');
Route::post('cart/switchToSaveForlater/{product}', ['as' => 'cart.saveforlater', 'uses' => 'Front\CartController@SwitchTosaveForLater']);
Route::put('cart/update/{product}', ['as' => 'cart.update', 'uses' => 'Front\CartController@update']);
Route::delete('saveForLater/destroy/{product}', ['as' => 'saveforlater.destroy', 'uses' => 'Front\SaveForLaterController@destroy']);
Route::post('saveForLater/switchToCart/{product}', ['as' => 'saveForLater.switchToCart', 'uses' => 'Front\SaveForLaterController@switchToCart']);
Route::get('/cart/add/{id}/{size?}', ['as' => 'cart.add', 'uses' => 'Front\CartController@add']);
Route::get('/policy', ['as' => 'policy', 'uses' => 'Front\PagesController@policy']);
Route::get('/back', ['as' => 'back', 'uses' => 'Front\PagesController@back']);
Route::get('/checkout', ['as' => 'checkout', 'uses' => 'Front\CartController@checkout']);
Route::post('checkout/confirmPayment', ['as' => 'checkout.payment', 'uses' => 'Front\CheckoutController@confirm']);
Route::get('/checkout/paymentNotice', ['as' => 'checkout.notice', 'uses' => 'Front\CheckoutController@itn']);

Route::get('/login', ['as' => 'login', 'uses' => 'Front\PagesController@login']);
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::post('/login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
//});
Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')->name('email-verification.error');
Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')->name('email-verification.check');
Route::get('resend-verification/token', 'Auth\RegisterController@resendToken')->name('resend-verification.token');
//Auth Routes...
Route::group(['middleware' => ['auth','isVerified']], function() {
    // Email Verification Routes...
    
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
    Route::get('/dashboard', ['as' => 'auth.products', 'uses' => 'Auth\ProductController@index']);
    Route::post('/update', ['as' => 'admin.updateconfig', 'uses' => 'Admin\PagesController@storeconfig']);
    Route::get('/transactions', ['as' => 'transactions', 'uses' => 'Auth\TransactionController@index']);
});

//Authenticated Guest Routes...
Route::group(['prefix' => 'guest', 'middleware' => ['auth', 'guest']], function() {
    Route::get('/product/{id}', ['as' => 'product.view', 'uses' => 'Auth\ProductController@view']);
    Route::get('/balance', ['as' => 'account.balance', 'uses' => 'Auth\AccountBalanceController@edit']);
    Route::post('/balance', ['as' => 'account.balance', 'uses' => 'Auth\AccountBalanceController@edit']);
    Route::get('/buy/{id}', ['as' => 'buy.product', 'uses' => 'Auth\ProductController@buy']);
    Route::get('/profile', ['as' => 'account', 'uses' => 'Auth\PagesController@profile']);
});
Route::resource('/cart/item', 'Front\CartController');
//Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//Authenticated Admin Routes...
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/product/edit/{id}', ['as' => 'product.discount', 'uses' => 'Auth\ProductController@edit']);
    Route::post('/product/update', ['as' => 'product.update', 'uses' => 'Auth\ProductController@update']);
});





