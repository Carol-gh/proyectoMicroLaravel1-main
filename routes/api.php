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
        Route::post('login', 'App\Http\Controllers\AuthController@login');
        Route::post('register', 'App\Http\Controllers\AuthController@register');
        Route::post('logout', 'App\Http\Controllers\AuthController@logout');
        Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
        Route::post('me', 'App\Http\Controllers\AuthController@me');

        //Route::post('UserConductor', 'App\Http\Controllers\ConductorController@register');
        //Route::post('MicrobusPerfil', 'App\Http\Controllers\MicrobusController@register');
    }
);

Route::get('lineas', 'App\Http\Controllers\MicrobusController@getLineasAll');
Route::get('getBus/{conductor}', 'App\Http\Controllers\MicrobusController@getBus');

//NUEVA AUTHENTICATION
Route::post('login', 'App\Http\Controllers\UserController@login');
Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('UserConductor', 'App\Http\Controllers\ConductorController@register');
Route::post('MicrobusPerfil', 'App\Http\Controllers\MicrobusController@register');

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('user', 'App\Http\Controllers\UserController@user');
    Route::put('user', 'App\Http\Controllers\UserController@update');
    Route::post('logout', 'App\Http\Controllers\UserController@logout');
});
