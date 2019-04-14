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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//list all articles

Route::get('articles', 'ArticlesController@index');

//list single articles

Route::get('article/{id}', 'ArticlesController@show');

//create new article

Route::post('article', 'ArticlesController@store');

//update article

Route::put('article', 'ArticlesController@store');

//delete article

Route::delete('article/{id}', 'ArticlesController@destroy');