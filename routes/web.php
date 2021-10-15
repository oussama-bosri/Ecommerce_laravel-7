<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
//login logout & register routes
Auth::routes();

//home route
Route::get('/', 'HomeController@index')->name('home');

//activate user account routes
Route::get('/activate/{code}', 'ActivationController@activateUserAcount')
    ->name('user.activate');
Route::get('/resend/{email}', 'ActivationController@resendActivationCode')
    ->name('code.resend');

//products routes
Route::resource('products', 'ProductController');
Route::get('products/category/{category}', 'HomeController@getProductByCategory')
    ->name("category.products");
Route::get('products/{product}', 'ProductController@show')
    ->name("product.show");
    
//cart route
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/add/cart/{product}', 'CartController@addProductToCart')->name('add.cart');
Route::put('/update/{product}/cart', 'CartController@updateProductOnCart')->name('update.cart');
Route::delete('/remove/{product}/cart', 'CartController@removeProductFromCart')->name('remove.cart');
