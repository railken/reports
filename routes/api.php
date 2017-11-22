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

Route::group(['prefix' => 'v1'], function() {
    Route::post('/reports', ['uses' => '\App\Http\Controllers\ReportsController@create']);
    Route::get('/reports/{uid}', ['uses' => '\App\Http\Controllers\ReportsController@show']);
    Route::put('/reports/{uid}', ['uses' => '\App\Http\Controllers\ReportsController@update']);
});
