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

Route::post('login', 'App\Http\Controllers\API\UserController@login');
Route::post('register', 'App\Http\Controllers\API\UserController@register');
Route::get('showbuses', 'App\Http\Controllers\API\RecorridoController@getCoordinates');

Route::post('login/driver', 'App\Http\Controllers\API\ConductorController@loginApp');
Route::get('driver/{id}', 'App\Http\Controllers\API\ConductorController@getConductor');
Route::get('buses/{id}', 'App\Http\Controllers\API\MicrobusController@getBus');
Route::get('lineas', 'App\Http\Controllers\API\LineaController@getLineasAll');
Route::post('recorrido/{conductor}', 'App\Http\Controllers\API\RecorridoController@createTrack');
Route::put('/update/{id}', 'App\Http\Controllers\API\RecorridoController@update');
Route::put('/finish/{id}', 'App\Http\Controllers\API\RecorridoController@finishRecorrido');
Route::post('salir', 'App\Http\Controllers\API\RecorridoController@saveRetiro');
Route::get('coordinates/{linea}/{tipo}', 'App\Http\Controllers\API\RecorridoController@ubicaciones');
