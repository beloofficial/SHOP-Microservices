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

Route::post('/order/create','OrderController@store');

Route::post('/order/{order}/pay','OrderController@payStore');

Route::put('/order/{order}/cancel','OrderController@cancelOrder');

Route::put('/order/{order}','OrderController@update');
