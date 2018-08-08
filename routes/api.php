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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => '/v1', 'middleware' => 'guest'], function () {
	//search property by parameter
	Route::get('search', 'PropertyController@search');
	//get all property
	Route::get('properties','PropertyController@index');
	// get specific property
	Route::get('property/{id}','PropertyController@show');
	// delete a property
	Route::delete('property/{id}','PropertyController@destroy');
	// update existing property
	Route::put('property','PropertyController@store');
	// create new property
	Route::post('property','PropertyController@store');
});
