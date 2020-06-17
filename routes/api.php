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

// api table supplier
Route::post('supplier/register', 'SupplierController@store');
Route::get('supplier/index', 'SupplierController@index');
Route::get('supplier/search/{id}', 'SupplierController@show');
Route::put('supplier/update/{id}', 'SupplierController@update');
Route::delete('supplier/delete/{id}', 'SupplierController@destroy');

// api table staff
Route::post('staff/register', 'StaffController@store');
Route::get('staff/index', 'StaffController@index');
Route::get('staff/search/{id}', 'StaffController@show');
Route::put('staff/update/{id}', 'StaffController@update');
Route::delete('staff/delete/{id}', 'StaffController@destroy');

// api table sale_transaction
Route::post('sale_transaction/register', 'SaleTransactionController@store');
Route::get('sale_transaction/index', 'SaleTransactionController@index');
Route::get('sale_transaction/search/{id}', 'SaleTransactionController@show');
Route::put('sale_transaction/update/{id}', 'SaleTransactionController@update');
Route::delete('sale_transaction/delete/{id}', 'SaleTransactionController@destroy');

// api table category
Route::post('category/register', 'CategoryController@store');
Route::get('category/index', 'CategoryController@index');
Route::get('category/search/{id}', 'CategoryController@show');
Route::put('category/update/{id}', 'CategoryController@update');
Route::delete('category/delete/{id}', 'CategoryController@destroy');