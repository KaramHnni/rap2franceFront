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

	Route::post('/news/getMoreNews','Api\News\IndexController@getMoreNews')->name('news.getMoreNews');
	Route::post('/categories/getMoreNews','Api\Categories\IndexController@getMoreNews');
	Route::get('/categories/{slug}/get','Api\Categories\IndexController@getCategorie');
	Route::post('/editors/getMoreNews','Api\Editors\IndexController@getMoreNews'); 



