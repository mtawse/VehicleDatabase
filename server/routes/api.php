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


Route::group(['prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['prefix' => 'manufacturers'], function () {

        Route::get('{manufacturer}/models', 'ManufacturerController@getModels')
            ->where('manufacturer', '[0-9]+');
        Route::get('{manufacturer}/vehicles', 'ManufacturerController@getVehicles')
            ->where('manufacturer', '[0-9]+');
        Route::get('{manufacturer}', 'ManufacturerController@show')
            ->where('manufacturer', '[0-9]+');
        Route::get('/', 'ManufacturerController@index');

    });

    Route::group(['prefix' => 'models'], function () {

        Route::get('{model}/vehicles', 'ModelController@getVehicles')
            ->where('model', '[0-9]+');
        Route::get('{model}', 'ModelController@show')
            ->where('model', '[0-9]+');
        Route::get('/', 'ModelController@index');

    });

    Route::group(['prefix' => 'vehicles'], function () {

        Route::get('{vehicle}', 'VehicleController@show')
            ->where('vehicle', '[0-9]+');
        Route::get('/', 'VehicleController@index');

    });

    Route::group(['prefix' => 'owners'], function () {

        Route::get('{owner}/vehicles', 'OwnerController@getVehicles')
            ->where('owner', '[0-9]+');
        Route::get('{owner}', 'OwnerController@show')
            ->where('owner', '[0-9]+');
        Route::get('/', 'OwnerController@index');

    });
});




Route::fallback(function(){
    return response()->json(['message' => 'Not Found.'], 404);
})->name('api.fallback.404');
