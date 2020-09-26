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
Route::get('/list-cart', 'CartController@listCart');
Route::get('/get-quanty-cart', 'CartController@getQuantyCart');
Route::get('/Delete-Item-Cart/{id}', 'CartController@deleteCart');

