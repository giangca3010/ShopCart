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

Route::get('/', 'CartController@index');
Route::get('/Add-Cart/{id}', 'CartController@addToCart');
Route::get('/Delete-Item-Cart/{id}', 'CartController@deleteCart');
Route::get('/get-quanty-cart', 'CartController@getQuantyCart');

Route::get('/List-Cart', 'CartController@viewListCart');
Route::get('/Delete-Item-List-Cart/{id}', 'CartController@deleteItemListCart');
Route::get('/Save-Item-List-Cart/{id}/{quanty}', 'CartController@saveItemListCart');




