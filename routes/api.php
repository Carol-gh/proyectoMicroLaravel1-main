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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'], function ($router) {
        Route::post('login', 'App\Http\Controllers\API\AuthController@login');
        Route::post('register', 'App\Http\Controllers\API\AuthController@register');
        Route::post('logout', 'App\Http\Controllers\API\AuthController@logout');
        Route::post('refresh', 'App\Http\Controllers\API\AuthController@refresh');
        Route::post('me', 'App\Http\Controllers\API\AuthController@me');

        //Route::post('UserConductor', 'App\Http\Controllers\ConductorController@register');
        //Route::post('MicrobusPerfil', 'App\Http\Controllers\MicrobusController@register');
    }
);

//NUEVA AUTHENTICATION
Route::post('login', 'App\Http\Controllers\API\UserController@login');
Route::post('register', 'App\Http\Controllers\API\UserController@register');
Route::post('UserConductor', 'App\Http\Controllers\API\ConductorController@register');
Route::post('MicrobusPerfil', 'App\Http\Controllers\API\MicrobusController@register');
Route::get('lineas', 'App\Http\Controllers\API\MicrobusController@getLineasAll');
Route::post('create', 'App\Http\Controllers\API\RecorridoController@create');
Route::get('getBus/{user}', 'App\Http\Controllers\API\MicrobusController@getBus');

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('user', 'App\Http\Controllers\API\UserController@user');
    Route::put('user', 'App\Http\Controllers\API\UserController@update');
    Route::post('logout', 'App\Http\Controllers\API\UserController@logout');

    Route::get('getBus', 'App\Http\Controllers\API\MicrobusController@getBusAuth');

    Route::post('create', 'App\Http\Controllers\API\RecorridoController@create');
    Route::put('/update/{id}', 'App\Http\Controllers\API\RecorridoController@update');

    Route::post('ubicacion', 'App\Http\Controllers\API\RecorridoController@detalleRecorrido');
});
