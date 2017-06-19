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


//Rota para todas as funções variadas ao painel de ADMIN
Route::prefix('admin')->group(function (){
    Route::get('/','HomeController@adminPanel')->name('painelAdmin');

    Route::prefix('superstar')->group(function (){
        Route::get('edit','SuperstarsController@editPage')->name('editarSuperstar');
        Route::post('create/confirm','SuperstarsController@cadastrar')->name('confirmarCriação');
        Route::post('edit/confirm','SuperstarsController@editar')->name('confirmarEdição');
        Route::get('create','SuperstarsController@criarSuperstar')->name('criarSuperstar');
        Route::get('/edit-champion','SuperstarsController@editarChampionRedirect')->name('editarChampionRedirect');
        Route::post('/edit-champion/confirm','SuperstarsController@editarChampion')->name('editarChampion');
        Route::get('/edit-photo','SuperstarsController@editarFotoRedirect')->name('editarFotoRedirect');
        Route::post('/edit-photo/confirm','SuperstarsController@editarFoto')->name('editarFoto');
        Route::get('/edit-brand','SuperstarsController@editarBrandRedirect')->name('editarBrandRedirect');
        Route::post('/edit-brand/confirm','SuperstarsController@editarBrand')->name('editarBrand');

    });
});
//Rota para todas as funções variadas ao painel de Mercado
Route::prefix('market')->group(function () {
    Route::get('/','SuperstarsController@mercado')->name('mercadoHome');
    //Rotas para alterações na exbição de preço
    Route::prefix('price')->group(function () {
        Route::get('/asc','SuperstarsController@mercadoPreçoCrescente')->name('mercadoPriceAsc');
        Route::get('desc','SuperstarsController@mercadoPreçoDecrescente')->name('mercadoPriceDesc');
    });
    //Rotas para alterações na exbição de Pontos
    Route::prefix('points')->group(function () {
        Route::get('asc','SuperstarsController@mercadoPontosCrescente')->name('mercadoPointsAsc');
        Route::get('desc','SuperstarsController@mercadoPontosDecrescente')->name('mercadoPointsDesc');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
