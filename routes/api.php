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

// Religion
Route::get('religion/all','Api\ReligionController@index');
Route::post('religion/save','Api\ReligionController@create');
Route::get('religion/delete/{id}','Api\ReligionController@delete');
Route::post('religion/getById','Api\ReligionController@getById');
// End Religion
