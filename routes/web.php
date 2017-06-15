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
    return view('home');
})->name('inicio');



Route::prefix('admin')->group(function (){
    Route::get('/','HomeController@adminPanel')->name('painelAdmin');
    Route::prefix('superstar')->group(function (){
        Route::get('edit','SuperstarsController@editPage')->name('editarSuperstar');
        Route::post('create/confirm','SuperstarsController@cadastrar');
        Route::post('edit/confirm','SuperstarsController@editar');
        Route::get('/list','SuperstarsController@listar');
        Route::get('create','SuperstarsController@criarSuperstar')->name('criarSuperstar');

    });
});

Route::prefix('market')->group(function () {
    Route::get('/','SuperstarsController@mercado')->name('mercadoHome');
    Route::prefix('price')->group(function () {
        Route::get('/asc','SuperstarsController@mercadoPreçoCrescente')->name('mercadoPriceAsc');
        Route::get('desc','SuperstarsController@mercadoPreçoDecrescente')->name('mercadoPriceDesc');
    });
    Route::prefix('points')->group(function () {
        Route::get('asc','SuperstarsController@mercadoPontosCrescente')->name('mercadoPointsAsc');
        Route::get('desc','SuperstarsController@mercadoPontosDecrescente')->name('mercadoPointsDesc');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
