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


Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {

    Route::post('login', 'JwtAuthController@login');
    Route::post('logout', 'JwtAuthController@logout');
    Route::post('refresh', 'JwtAuthController@refresh');
    Route::post('me', 'JwtAuthController@me');

});

Route::group(['middleware' => 'auth:api'], function() {

    Route::resource('manufacturers', 'ManufacturerController')->only(['index', 'show']);
    Route::resource('manufacturers.models', 'Manufacturer\ModelController')->only(['index']);
    Route::resource('manufacturers.vehicles', 'Manufacturer\VehicleController')->only(['index']);


    Route::resource('models', 'ModelController')->only(['index', 'show']);
    Route::resource('models.vehicles', 'Model\VehicleController')->only(['index']);

    Route::resource('vehicles', 'VehicleController')->only(['index', 'show']);

    Route::resource('owners', 'OwnerController')->only(['index', 'show']);
    Route::resource('owners.vehicles', 'Owner\VehicleController')->only(['index']);

});




Route::fallback(function(){
    return response()->json(['message' => 'Not Found.'], 404);
})->name('api.fallback.404');
