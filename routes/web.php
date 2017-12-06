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
    return view('default');
});

Route::get('/MesaDeEntradas', function(){
    return view('mesadeentradas');
});
Route::get('estados', function (){
    return view('Estados/estados');
});


Route::get('/vue', function(){
    return view('dash');
});
Route::resource('expediente', 'ExpedienteController');
Route::resource('area', 'AreaController');
Route::resource('estado', 'EstadoController', ['except' => 'show', 'create']);


Route::get('datatables', 'DatatablesController@index');
Route::get('/Data', 'DatatablesController@getIndex')->name('datatable.getIndex');



Route::get('grid', function (){
    return view('grilla');
});

