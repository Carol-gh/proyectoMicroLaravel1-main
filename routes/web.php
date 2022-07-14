<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
//	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons');
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

});

    //conductor
    Route::group(['prefix' => 'Conductor'], function () {
        Route::get('/conductorMicrobus', [App\Http\Controllers\ConductorControllerA::class,'view'])->name('conductorMicrobus.view');
		Route::get('/crearConductor', [App\Http\Controllers\ConductorControllerA::class,'create'])->name('conductorMicrobus.create');
    Route::post('/registerConductor', [App\Http\Controllers\ConductorControllerA::class,'sendData'])->name('conductorMicrobus.register');

  });
	  // microbus
	  Route::group(['prefix' => 'Microbus'], function () {
   Route::get('/Microbus', [App\Http\Controllers\MicrobusControllerA::class,'index'])->name('microbus.index');
  Route::get('/crearMicrobus', [App\Http\Controllers\MicrobusControllerA::class,'create'])->name('microbus.create');
  Route::post('/registrarMicrobus', [App\Http\Controllers\MicrobusControllerA::class,'sendData'])->name('microbus.register');
  Route::get('/lineas', [App\Http\Controllers\MicrobusControllerA::class,'getLineasAll'])->name('microbus.lineas');


    });



