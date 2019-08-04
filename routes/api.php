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

Route::post('/companies', 'CompaniesController@regist');
Route::post('/jobs', 'JobsController@regist');
Route::patch('/jobs', 'JobsController@update');
Route::get('/jobs', 'JobsController@show');
Route::get('/jobs/search', 'JobsController@search');