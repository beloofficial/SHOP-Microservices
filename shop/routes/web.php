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

Route::get('/getUser','UserController@getUser');

Route::get('/main/{category?}','MainPageController@show');

Route::get('/product/{product}','ProductPageController@showProduct');

Route::get('/login1','AuthController@showLogin');
Route::post('/login1','AuthController@login');

Route::get('/register1','AuthController@showRegister');
Route::post('/register1','AuthController@register');

Route::post('/logout','AuthController@logout');

Route::get('/updateProfile','AuthController@updateProfile');

Route::get('/deleteProfile','AuthController@deleteProfile');

Route::match(['get'],'/basket',['uses'=>'BasketController@execude','as'=>'basket']);

Route::match(['post'],'/basket',['uses'=>'BasketController@add_basket','as'=>'add_basket']);

Route::match(['post'],'/update_basket',['uses'=>'BasketController@update_basket','as'=>'update_basket']);

Route::match(['get'],'/basket/delete/{id}',['uses'=>'BasketController@delete_basket','as'=>'delete_basket']);

Route::match(['get'],'/basket/empty',['uses'=>'BasketController@empty_basket','as'=>'empty_basket']);

Route::match(['get'],'/fill',['uses'=>'BasketController@fill','as'=>'fill']);


