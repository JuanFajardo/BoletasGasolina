<?php

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

Route::get('/', function () {
    if ( !isset( \Auth::user()->id ) )
      return view('auth.login');
    else
      return view('gamp');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/Proyecto', 'ProyectoController');
Route::resource('/Boleta', 'BoletaController');
Route::resource('/Cambio', 'CambioController');

Route::get('/Reporte', 'ReporteController@index');
Route::post('/Reporte', 'ReporteController@reporte');

Route::get('/clave', 'ReporteController@claveGet')->name('usuario.clave');
Route::post('/clave', 'ReporteController@clavePost')->name('usuario.cambiar');
