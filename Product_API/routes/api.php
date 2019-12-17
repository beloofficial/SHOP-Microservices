<?php

use Illuminate\Http\Request;

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


Route::post('/categories/create','CategoryController@store');
Route::get('/categories','CategoryController@getCategories');
Route::get('/category/{category}','CategoryController@getCategory');
Route::put('/category/{category}','CategoryController@update');
Route::delete('/category/{category}','CategoryController@destroy');


Route::post('/products/create','ProductController@store');
Route::get('/products','ProductController@getProducts');
Route::get('/products/category/{category}','ProductController@getProductsByCategory');
Route::get('/product/{product}','ProductController@getProduct');
Route::put('/product/{product}','ProductController@update');
Route::delete('/product/{product}','ProductController@destroy');

