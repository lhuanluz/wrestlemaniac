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
        Route::get('status','MarketController@mercadoStatusRedirect')->name('mercadoStatusRedirect');
        Route::post('status/confirm','MarketController@mercadoStatus')->name('mercadoStatus');
        Route::get('edit-ppv','MarketController@editarPpvRedirect')->name('editarPpvRedirect');
        Route::post('edit-ppv/confirm','MarketController@editarPpv')->name('editarPpv');
    });

    Route::prefix('user')->group(function (){
    Route::get('editarEmail','UsuariosController@editarEmail')->name('editEmail');
    Route::post('editarEmail/confirm','UsuariosController@editarEmailRequest')->name('editEmailR');
    Route::get('editarNome','UsuariosController@editarNome')->name('editNome');
    Route::post('editarNome/confirm','UsuariosController@editarNomeRequest')->name('editNomeR');
    Route::get('editarAdmin','UsuariosController@editarAdmin')->name('editAdmin');
    Route::post('editarAdmin/confirm','UsuariosController@editarAdminRequest')->name('editAdminR');
    });
});
//Rota para todas as funções variadas ao painel de Mercado
Route::prefix('market')->group(function () {
    Route::get('/','MarketController@mercado')->name('mercadoHome');

    Route::prefix('raw')->group(function () {
        Route::get('/','MarketController@mercadoRaw')->name('mercadoRawHome');
        Route::post('buy','MarketController@comprarSuperstarRaw')->name('comprarSuperstarRaw');
        Route::post('sell','MarketController@venderSuperstarRaw')->name('venderSuperstarRaw');
        Route::prefix('price')->group(function () {
            Route::get('asc','MarketController@mercadoRawPreçoCrescente')->name('mercadoRawPriceAsc');
            Route::get('desc','MarketController@mercadoRawPreçoDecrescente')->name('mercadoRawPriceDesc');
        });
    //Rotas para alterações na exbição de Pontos
        Route::prefix('points')->group(function () {
            Route::get('asc','MarketController@mercadoRawPontosCrescente')->name('mercadoRawPointsAsc');
            Route::get('desc','MarketController@mercadoRawPontosDecrescente')->name('mercadoRawPointsDesc');
        });
    });
    Route::prefix('smackdown')->group(function () {
        Route::get('/','MarketController@mercadoSmackdown')->name('mercadoSmackdownHome');
        Route::post('buy','MarketController@comprarSuperstarSmackdown')->name('comprarSuperstarSmackdown');
        Route::post('sell','MarketController@venderSuperstarSmackdown')->name('venderSuperstarSmackdown');
        Route::prefix('price')->group(function () {
            Route::get('asc','MarketController@mercadoSmackdownPreçoCrescente')->name('mercadoSmackdownPriceAsc');
            Route::get('desc','MarketController@mercadoSmackdownPreçoDecrescente')->name('mercadoSmackdownPriceDesc');
        });
    //Rotas para alterações na exbição de Pontos
        Route::prefix('points')->group(function () {
            Route::get('asc','MarketController@mercadoSmackdownPontosCrescente')->name('mercadoSmackdownPointsAsc');
            Route::get('desc','MarketController@mercadoSmackdownPontosDecrescente')->name('mercadoSmackdownPointsDesc');
        });
    });
    Route::prefix('ppv')->group(function () {
        Route::get('/','MarketController@mercadoPpv')->name('mercadoPpvHome');
        Route::post('buy','MarketController@comprarSuperstarPpv')->name('comprarSuperstarPpv');
        Route::post('sell','MarketController@venderSuperstarPpv')->name('venderSuperstarPpv');
        Route::prefix('price')->group(function () {
            Route::get('asc','MarketController@mercadoPpvPreçoCrescente')->name('mercadoPpvPriceAsc');
            Route::get('desc','MarketController@mercadoPpvPreçoDecrescente')->name('mercadoPpvPriceDesc');
        });
    //Rotas para alterações na exbição de Pontos
        Route::prefix('points')->group(function () {
            Route::get('asc','MarketController@mercadoPpvPontosCrescente')->name('mercadoPpvPointsAsc');
            Route::get('desc','MarketController@mercadoPpvPontosDecrescente')->name('mercadoPpvPointsDesc');
        });
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');