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
        Route::get('edit-champion','SuperstarsController@editarChampionRedirect')->name('editarChampionRedirect');
        Route::post('edit-champion/confirm','SuperstarsController@editarChampion')->name('editarChampion');
        Route::get('edit-photo','SuperstarsController@editarFotoRedirect')->name('editarFotoRedirect');
        Route::post('edit-photo/confirm','SuperstarsController@editarFoto')->name('editarFoto');
        Route::get('edit-brand','SuperstarsController@editarBrandRedirect')->name('editarBrandRedirect');
        Route::post('edit-brand/confirm','SuperstarsController@editarBrand')->name('editarBrand');

    });
    Route::prefix('market')->group(function (){
        Route::get('edit','SuperstarsController@editPage')->name('editarSuperstar');
    });
});
//Rota para todas as funções variadas ao painel de Mercado
Route::prefix('market')->group(function () {
    Route::get('/','SuperstarsController@mercado')->name('mercadoHome');

    Route::prefix('raw')->group(function () {
        Route::get('/','SuperstarsController@mercadoRaw')->name('mercadoRawHome');
        Route::post('buy','SuperstarsController@comprarSuperstarRaw')->name('comprarSuperstarRaw');
        Route::post('sell','SuperstarsController@venderSuperstarRaw')->name('venderSuperstarRaw');
        Route::prefix('price')->group(function () {
            Route::get('asc','SuperstarsController@mercadoRawPreçoCrescente')->name('mercadoRawPriceAsc');
            Route::get('desc','SuperstarsController@mercadoRawPreçoDecrescente')->name('mercadoRawPriceDesc');
        });
    //Rotas para alterações na exbição de Pontos
        Route::prefix('points')->group(function () {
            Route::get('asc','SuperstarsController@mercadoRawPontosCrescente')->name('mercadoRawPointsAsc');
            Route::get('desc','SuperstarsController@mercadoRawPontosDecrescente')->name('mercadoRawPointsDesc');
        });
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
