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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('manufacturers', 'ManufacturerController@index');
Route::get('manufacturers/{manufacturer}/models', 'ManufacturerController@getModels')
    ->where('manufacturer', '[0-9]+');
Route::get('manufacturers/{manufacturer}/vehicles', 'ManufacturerController@getVehicles')
    ->where('manufacturer', '[0-9]+');
Route::get('manufacturers/{manufacturer}', 'ManufacturerController@show')
    ->where('manufacturer', '[0-9]+');


Route::get('vehicles', 'VehicleController@index');
Route::get('vehicles/{vehicle}', 'VehicleController@show')
    ->where('vehicle', '[0-9]+');



Route::fallback(function(){
    return response()->json(['message' => 'Not Found.'], 404);
})->name('api.fallback.404');
