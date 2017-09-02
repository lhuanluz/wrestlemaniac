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



// Início de rotas para todas as funções derivadas do painel ADMIN
Route::prefix('admin')->middleware('auth.admin')->group(function (){
    //Rota para a home do painel admin
    Route::get('/','AdminController@adminPanel')->name('painelAdmin');

    // Rotas para edição de informações de superstars
    Route::prefix('superstar')->group(function (){
        // Rotas para criar superstars
        Route::get('create-superstar','AdminController@criarSuperstarRedirect')->name('createSuperstarRedirect');
        Route::post('create-superstar/confirm','AdminController@criarSuperstar')->name('createSuperstar');
        // Rotas para dar pontos a superstars
        Route::get('add-points','AdminController@adicionarPontosRedirect')->name('addPointsRedirect');
        Route::post('add-points/confirm','AdminController@adicionarPontos')->name('addPoints');
        // Rotas para dar campeão a superstars
        Route::get('edit-champion','AdminController@editarChampionRedirect')->name('editChampionRedirect');
        Route::post('edit-champion/confirm','AdminController@editarChampion')->name('editChampion');

    });
    Route::prefix('market')->group(function (){
        Route::get('status','MarketController@mercadoStatusRedirect')->name('mercadoStatusRedirect');
        Route::post('status/confirm','MarketController@mercadoStatus')->name('mercadoStatus');
        Route::get('edit-ppv','MarketController@editarPpvRedirect')->name('editarPpvRedirect');
        Route::post('edit-ppv/confirm','MarketController@editarPpv')->name('editarPpv');
        Route::get('show-ppv','MarketController@exibirPpvRedirect')->name('exibirPpvRedirect');
        Route::post('show-ppv/confirm','MarketController@exibirPpv')->name('exibirPpv');
    });
    //Rotas Para Editar Usuarios
    Route::prefix('user')->group(function (){
        Route::get('editEmail','UsuariosController@editarEmail')->name('editEmail');
        Route::post('editEmail/confirm','UsuariosController@editarEmailRequest')->name('editEmailR');
        Route::get('editNome','UsuariosController@editarNome')->name('editNome');
        Route::post('editNome/confirm','UsuariosController@editarNomeRequest')->name('editNomeR');
        Route::get('editAdmin','UsuariosController@editarAdmin')->name('editAdmin');
        Route::post('editAdmin/confirm','UsuariosController@editarAdminRequest')->name('editAdminR');
        Route::get('givePro','UsuariosController@giveProRedirect')->name('giveProRedirect');
        Route::post('givePro/confirm','UsuariosController@givePro')->name('givePro');
    });
    Route::prefix('leagues')->group(function (){ 
        Route::get('update','LeagueController@atualizarLigas')->name('atualizarLigas');

    });
    Route::prefix('photos')->group(function (){
        Route::get('add','UsuariosController@addPhotoRedirect')->name('addPhotoRedirect');
        Route::post('add/confirm','UsuariosController@addPhoto')->name('addPhoto');
    });
    //Rotas para avisos
    Route::prefix('warning')->group(function (){
        Route::get('create','AvisoController@createWarning')->name('cWarning');
        Route::post('create/confirm','AvisoController@createWarningRequest')->name('cWarningR');
        Route::get('delete','AvisoController@deleteWarning')->name('dWarning');
        Route::post('delete/confirm','AvisoController@deleteWarningRequest')->name('dWarningR');

    });
});
// Fim de rotas para todas as funções derivadas do painel ADMIN

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

Route::prefix('league')->group(function () {
        Route::get('/','LeagueController@liga')->name('leagueHome');
        Route::get('/quitLeague','LeagueController@sairLiga')->name('leagueQuit');
        Route::post('/joinLeague','LeagueController@entrarLiga')->name('entrarLiga');
        Route::post('/createLeague','LeagueController@criarLiga')->name('criarLiga');
        Route::get('/deleteLeague','LeagueController@deletarLiga')->name('deletarLiga');
    });
//Rotas Rank Usuario Cash
Route::get('statistics','RankingController@statistics')->name('statistics');
Route::get('selectPhoto','UsuariosController@selectPhotoRedirect')->name('selectPhotoRedirect');
Route::post('selectPhoto/confirm','UsuariosController@selectPhoto')->name('selectPhoto');

Route::get('/gameRules', function () {
    return view('gameRules');
})->name('gameRules');

Route::get('/howToPlay', function () {
    return view('howToPlay');
})->name('howToPlay');


Auth::routes();
//Rotas Rank Points Superstar
Route::get('rankSuperstarPoints','RankingController@rankSuperstarPoints')->name('rankSuperstarPoints');
Route::get('rankSuperstarPoints','RankingController@rankSuperstarRawPoints')->name('rankSuperstarRawPoints');
Route::get('rankSuperstarPoints','RankingController@rankSuperstarSdPoints')->name('rankSuperstarSdPoints');
Route::get('/', 'InicioController@homeRedirect')->name('home');


Route::get('/faq', function () {
    return view('faq/faq');
})->name('faq');
