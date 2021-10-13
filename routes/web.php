<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/activate/{code}', 'ActivationController@activateUserAcount')
    ->name('user.activate');
Route::get('/resend/{email}', 'ActivationController@resendActivationCode')
    ->name('code.resend');
Route::resource('products', 'ProductController');
Route::get('products/category/{category}', 'HomeController@getProductByCategory')
    ->name("category.products");
Route::get('products/{product}', 'ProductController@show')
    ->name("product.show");
