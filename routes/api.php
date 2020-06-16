<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// api table products
Route::get('product', 'ProductController@product');
Route::get('product/{id}', 'ProductController@productById');
Route::post('product', 'ProductController@createProduct');
Route::put('product/{product_id}', 'ProductController@updateProduct');
Route::delete('product/{product_id}', 'ProductController@deleteProduct');

// api table customer
Route::get('customer', 'CustomerController@customer');
Route::get('customer/{id}', 'CustomerController@customerById');
Route::post('customer', 'CustomerController@createCustomer');
Route::put('customer/{customer_id}', 'CustomerController@updateCustomer');
Route::delete('customer/{customer_id}', 'CustomerController@deleteCustomer');

// api table order
Route::get('order', 'OrderController@order');
Route::get('order/{id}', 'OrderController@orderById');
Route::post('order', 'OrderController@createOrder');
Route::put('order/{payment_id}', 'OrderController@updateOrder');
Route::delete('order/{payment_id}', 'OrderController@deleteOrder');