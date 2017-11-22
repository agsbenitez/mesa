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

Route::resource('datatables', 'DatatablesController', [
    'anyData' => 'datatables.data',
    'getIndex' => 'datables',

]);

Route::get('datatables', 'DatatablesController@index');
Route::get('/anyData', 'DatatablesController@anyData')->name('datatable.anyData');

