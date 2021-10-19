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
Route::get('/cart', 'CartController@index')
     ->name('cart.index');
Route::post('/add/cart/{product}', 'CartController@addProductToCart')
     ->name('add.cart');
Route::put('/update/{product}/cart', 'CartController@updateProductOnCart')
    ->name('update.cart');
Route::delete('/remove/{product}/cart', 'CartController@removeProductFromCart')
     ->name('remove.cart');

//Payment route
Route::get('/handle-payment', 'PaypalPaymentContoller@handlePayment')
     ->name('make.payment');
Route::get('/success-payment', 'PaypalPaymentContoller@paymentSuccess')
    ->name('success.payment');
Route::get('/cancel-payment', 'PaypalPaymentContoller@paymentCancel')
     ->name('cancel.payment');

//Admin route
Route::get('/admin', 'AdminContoller@index')
     ->name('admin.index');
Route::get('/admin/login', 'AdminContoller@showAdminLoginForm')
     ->name('admin.login');
Route::post('/admin/login', 'AdminContoller@adminLogin')
     ->name('admin.login');
Route::get('/admin/logout', 'AdminContoller@adminLogout')
     ->name('admin.logout');
Route::get('/admin/products', 'AdminContoller@getProducts')
     ->name('admin.products');
Route::get('/admin/orders', 'AdminContoller@getOrders')
     ->name('admin.orders');
