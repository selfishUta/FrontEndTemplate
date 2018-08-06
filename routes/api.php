<?php

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
// 	return $request->user();
// });
// Route::get('USER_LOGIN', 'Api\UserController@login');
Route::group(['namespace' => 'Api'], function () {
	Route::get('USER_LOGIN', 'UserController@login');
});