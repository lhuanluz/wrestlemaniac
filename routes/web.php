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
    Route::prefix('superstar')->middleware('auth.admin2')->group(function (){
        // Rotas para criar superstars
        Route::get('create-superstar','AdminController@criarSuperstarRedirect')->name('createSuperstarRedirect');
        Route::post('create-superstar/confirm','AdminController@criarSuperstar')->name('createSuperstar');
        // Rotas para dar pontos a superstars
        Route::get('add-points','AdminController@adicionarPontosRedirect')->name('addPointsRedirect');
        Route::post('add-points/confirm','AdminController@adicionarPontos')->name('addPoints');
        // Rotas para dar campeão a superstars
        Route::get('edit-champion','AdminController@editarChampionRedirect')->name('editChampionRedirect');
        Route::post('edit-champion/confirm','AdminController@editarChampion')->name('editChampion');
        // Rotas para editar a foto dos superstars
        Route::get('edit-photo','AdminController@editarFotoRedirect')->name('editPhotoRedirect');
        Route::post('edit-photo/confirm','AdminController@editarFoto')->name('editPhoto');
        // Rotas para editar a brand dos superstars
        Route::get('edit-brand','AdminController@editarBrandRedirect')->name('editBrandRedirect');
        Route::post('edit-brand/confirm','AdminController@editarBrand')->name('editBrand');
        // Rotas para resetar superstars
        Route::get('reset','AdminController@resetarSuperstarRedirect')->name('resetSuperstarRedirect');
        Route::post('reset/confirm','AdminController@resetarSuperstar')->name('resetSuperstar');
        // Rotas para consertar superstars
        Route::get('fix','AdminController@consertarSuperstarRedirect')->name('fixSuperstarRedirect');
        Route::post('fix/confirm','AdminController@consertarSuperstar')->name('fixSuperstar');

    });
    // Rotas para edição de informações do mercado
    Route::prefix('market')->middleware('auth.admin2')->group(function (){
        // Rotas para editar o status do mercado 
        Route::get('edit-status','AdminController@editarMercadoStatusRedirect')->name('editMarketStatusRedirect');
        Route::post('edit-status/confirm','AdminController@editarMercadoStatus')->name('editMarketStatus');
        // Rotas para editar a brand do PPV
        Route::get('edit-ppv-brand','AdminController@editarPpvBrandRedirect')->name('editPpvBrandRedirect');
        Route::post('edit-ppv-brand/confirm','AdminController@editarPpvBrand')->name('editPpvBrand');
        // Rotas para editar a visibilidade do PPV
        Route::get('edit-ppv-visibility','AdminController@editarPpvVisibilidadeRedirect')->name('editPpvVisibilityRedirect');
        Route::post('edit-ppv-visibility/confirm','AdminController@editarPpvVisibilidade')->name('editPpvVisibility');
    });
    // Rotas Para Editar Usuarios
    Route::prefix('user')->middleware('auth.admin3')->group(function (){
        // Rotas para editar o email do usuário
        Route::get('edit-email','AdminController@editarUsuarioEmailRedirect')->name('editUserEmailRedirect');
        Route::post('edit-email/confirm','AdminController@editarUsuarioEmail')->name('editUserEmail');
        // Rotas para editar o nome do usuário
        Route::get('edit-name','AdminController@editarUsuarioNomeRedirect')->name('editUserNameRedirect');
        Route::post('edit-name/confirm','AdminController@editarUsuarioNome')->name('editUserName');
        // Rotas para dar ao usuário permissões ADMIN
        Route::get('create-admin','AdminController@criarAdminRedirect')->name('createAdminRedirect');
        Route::post('create-admin/confirm','AdminController@criarAdmin')->name('createAdmin');
        // Rotas para dar ao usuário o sistema PRO
        Route::get('give-pro','AdminController@darProRedirect')->name('giveProRedirect');
        Route::post('give-pro/confirm','AdminController@darPro')->name('givePro');
        // Rotas para checar usuário
        Route::get('check-user','AdminController@checarUsuarioRedirect')->name('checkUserRedirect');
        Route::post('check-user/confirm','AdminController@checarUsuarioConfirmar')->name('checkUserConfirm');
        Route::post('check-user/view','AdminController@checarUsuario')->name('checkUser');


    });
    Route::prefix('leagues')->middleware('auth.admin3')->group(function (){ 
        Route::get('update','AdminController@atualizarLigas')->name('updateLeagues');

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
    //Rotas para funções relacionadas a icones
    Route::prefix('icons')->group(function(){
        Route::post('addIcons','AdminController@addIcon')->name('addIcon');
        Route::get('addIconRedirect','AdminController@addIconRedirect')->name('addIconRedirect');
        Route::get('editIconNameRedirect','AdminController@editIconNameRedirect')->name('editIconNameRedirect');
        Route::post('editIconName','AdminController@editIconName')->name('editIconName');
        Route::get('editIconTierRedirect','AdminController@editIconTierRedirect')->name('editIconTierRedirect');
        Route::post('editIconTier','AdminController@editIconTier')->name('editIconTier');
        Route::get('editIconPhotoRedirect','AdminController@editIconPhotoRedirect')->name('editIconPhotoRedirect');
        Route::post('editIconPhoto','AdminController@editIconPhoto')->name('editIconPhoto');
    });
    //Rotas para funções relacionadas ao season reset
    Route::prefix('season')->middleware('auth.admin3')->group(function(){
        // Rotas para resetar a season
        Route::get('reset','AdminController@resetarSeasonRedirect')->name('seasonResetRedirect');
        Route::post('reset/confirm','AdminController@resetarSeason')->name('seasonReset');
    });
});
// Fim de rotas para todas as funções derivadas do painel ADMIN

//Rota para todas as funções variadas ao painel de Mercado
Route::prefix('market')->middleware('auth.logado')->group(function () {
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

Route::prefix('league')->middleware('auth.logado')->group(function () {
        Route::get('/','LeagueController@liga')->name('leagueHome');
        Route::get('/quitLeague','LeagueController@sairLiga')->name('leagueQuit');
        Route::post('/joinLeague','LeagueController@entrarLiga')->name('entrarLiga');
        Route::post('/createLeague','LeagueController@criarLiga')->name('criarLiga');
        Route::get('/deleteLeague','LeagueController@deletarLiga')->name('deletarLiga');
});

Route::prefix('iconStore')->middleware('auth.logado')->group(function () {
    Route::get('/','UsuariosController@iconStore')->name('iconStore');
    Route::post('buy','UsuariosController@comprarIcone')->name('buyIcon');

});
//Rotas Rank Usuario Cash
Route::get('statistics','RankingController@statistics')->middleware('auth.logado')->name('statistics');
Route::get('selectPhoto','UsuariosController@selectPhotoRedirect')->middleware('auth.logado')->name('selectPhotoRedirect');
Route::post('selectPhoto/confirm','UsuariosController@selectPhoto')->middleware('auth.logado')->name('selectPhoto');

Route::get('/gameRules', function () {
    return view('gameRules');
})->middleware('auth.logado')->name('gameRules');

Route::get('/', 'InicioController@homeRedirect')->name('home');

Route::get('/faq', function () {
    return view('faq/faq');
})->name('faq');

Route::get('/howToPlay', function () {
    return view('howToPlay');
})->name('howToPlay');

Auth::routes();




/*
Route::get('alterName', 'UsuariosController@alterName')->name('name');
Route::post('alterNameR', 'UsuariosController@alterNameRequest')->name('nameR');
Route::get('alterPass', 'UsuariosController@alterPass')->name('pass');
Route::post('alterPassR', 'UsuariosController@alterPassRequest')->name('passR');
Route::get('/emailConfirm/{code}', 'UsuariosController@emailVerify')->name('verifyEmail');
Route::get('/emailReConfirm', 'UsuariosController@emailReVerify')->name('reVerifyEmail');
Route::get('/changeEmail', 'UsuariosController@changeEmail')->name('changeEmail');
Route::get('/sendChangeEmail','UsuariosController@sendChangeEmail')->name('sEmail');
Route::get('/verifyChangeEmail','UsuariosController@verifyChangeEmailRedirect')->name('vEmailR');
Route::post('/verifyChangeEmail/confirm','UsuariosController@verifyChangeEmail')->name('vEmail');
*/


