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
    return view('ola');
   // return view('welcome');
});


Route::group(['prefix' => 'login'], function() {
    
    Route::get('/', 'LoginController@index')->name('login');
    Route::post('/logar', 'LoginController@logar')->name('logar');
});




Route::get('lutadores/cadastrar', 'LutadoresController@cadastrar');
Route::get('lutadores/listar/{identificador}', 'LutadoresController@listar');
Route::get('times/cadastrar', 'TimesController@cadastrar');
