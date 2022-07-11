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


//Route::post('MicrobusPerfil', 'App\Http\Controllers\API\MicrobusController@register');

Route::post('login', 'App\Http\Controllers\API\UserController@login');
Route::post('register', 'App\Http\Controllers\API\UserController@register');
Route::post('createDriver', 'App\Http\Controllers\API\ConductorController@register');

Route::get('lineas', 'App\Http\Controllers\API\LineaController@getLineasAll');

Route::post('create', 'App\Http\Controllers\API\RecorridoController@create');

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('user', 'App\Http\Controllers\API\UserController@user');
    Route::put('user', 'App\Http\Controllers\API\UserController@update');
    Route::post('logout', 'App\Http\Controllers\API\UserController@logout');

    Route::post('conductor', 'App\Http\Controllers\API\ConductorController@createDriver');

    Route::post('bus', 'App\Http\Controllers\API\MicrobusController@createBus');
    Route::post('asign', 'App\Http\Controllers\API\MicrobusController@asignBusDriver');
    Route::get('index', 'App\Http\Controllers\API\MicrobusController@getBusToday');

    Route::post('recorrido', 'App\Http\Controllers\API\RecorridoController@create');
    Route::put('/update/{id}', 'App\Http\Controllers\API\RecorridoController@update');

    Route::post('ubicacion', 'App\Http\Controllers\API\RecorridoController@detalleRecorrido');
});
