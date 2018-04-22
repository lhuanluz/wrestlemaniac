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
        Route::get('create-superstar','SuperstarsController@criarSuperstarRedirect')->name('createSuperstarRedirect');
        Route::post('create-superstar/confirm','SuperstarsController@criarSuperstar')->name('createSuperstar');
        // Rotas para dar pontos a superstars
        Route::get('add-points','SuperstarsController@adicionarPontosRedirect')->name('addPointsRedirect');
        Route::post('add-points/confirm','SuperstarsController@adicionarPontos')->name('addPoints');
        // Rotas para dar campeão a superstars
        Route::get('edit-champion','SuperstarsController@editarChampionRedirect')->name('editChampionRedirect');
        Route::post('edit-champion/confirm','SuperstarsController@editarChampion')->name('editChampion');
        // Rotas para editar a foto dos superstars
        Route::get('edit-photo','SuperstarsController@editarFotoRedirect')->name('editPhotoRedirect');
        Route::post('edit-photo/confirm','SuperstarsController@editarFoto')->name('editPhoto');
        // Rotas para editar a brand dos superstars
        Route::get('edit-brand','SuperstarsController@editarBrandRedirect')->name('editBrandRedirect');
        Route::post('edit-brand/confirm','SuperstarsController@editarBrand')->name('editBrand');
        // Rotas para resetar superstars
        Route::get('reset','SuperstarsController@resetarSuperstarRedirect')->name('resetSuperstarRedirect');
        Route::post('reset/confirm','SuperstarsController@resetarSuperstar')->name('resetSuperstar');
        // Rotas para consertar superstars
        Route::get('fix','SuperstarsController@consertarSuperstarRedirect')->name('fixSuperstarRedirect');
        Route::post('fix/confirm','SuperstarsController@consertarSuperstar')->name('fixSuperstar');

    });
    // Rotas para edição de informações do mercado
    Route::prefix('market')->middleware('auth.admin2')->group(function (){
        // Rotas para editar o status do mercado 
        Route::get('edit-status','MarketController@editarMercadoStatusRedirect')->name('editMarketStatusRedirect');
        Route::post('edit-status/confirm','MarketController@editarMercadoStatus')->name('editMarketStatus');
        // Rotas para editar a brand do PPV
        Route::get('edit-ppv-brand','MarketController@editarPpvBrandRedirect')->name('editPpvBrandRedirect');
        Route::post('edit-ppv-brand/confirm','MarketController@editarPpvBrand')->name('editPpvBrand');
        // Rotas para editar a visibilidade do PPV
        Route::get('edit-ppv-visibility','MarketController@editarPpvVisibilidadeRedirect')->name('editPpvVisibilityRedirect');
        Route::post('edit-ppv-visibility/confirm','MarketController@editarPpvVisibilidade')->name('editPpvVisibility');
        // Rotas para editar o nome do PPV
        Route::get('edit-ppv-name','MarketController@editarPpvNomeRedirect')->name('editPpvNameRedirect');
        Route::post('edit-ppv-name/confirm','MarketController@editarPpvNome')->name('editPpvName');
    });
    // Rotas Para Editar Usuarios
    Route::prefix('user')->middleware('auth.admin3')->group(function (){
        // Rotas para editar o email do usuário
        Route::get('edit-email','UsuariosController@editarUsuarioEmailRedirect')->name('editUserEmailRedirect');
        Route::post('edit-email/confirm','UsuariosController@editarUsuarioEmail')->name('editUserEmail');
        // Rotas para editar o nome do usuário
        Route::get('edit-name','UsuariosController@editarUsuarioNomeRedirect')->name('editUserNameRedirect');
        Route::post('edit-name/confirm','UsuariosController@editarUsuarioNome')->name('editUserName');
        // Rotas para dar ao usuário permissões ADMIN
        Route::get('create-admin','UsuariosController@criarAdminRedirect')->name('createAdminRedirect');
        Route::post('create-admin/confirm','UsuariosController@criarAdmin')->name('createAdmin');
        // Rotas para dar ao usuário o sistema PRO
        Route::get('give-pro','UsuariosController@darProRedirect')->name('giveProRedirect');
        Route::post('give-pro/confirm','UsuariosController@darPro')->name('givePro');
        // Rotas para checar usuário
        Route::get('check-user','UsuariosController@checarUsuarioRedirect')->name('checkUserRedirect');
        Route::post('check-user/confirm','UsuariosController@checarUsuarioConfirmar')->name('checkUserConfirm');
        Route::post('check-user/view','UsuariosController@checarUsuario')->name('checkUser');


    });
    Route::prefix('leagues')->middleware('auth.admin3')->group(function (){ 
        Route::get('update','LeagueController@atualizarLigas')->name('updateLeagues');

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
        Route::post('addIcons','IconController@addIcon')->name('addIcon');
        Route::get('addIconRedirect','IconController@addIconRedirect')->name('addIconRedirect');
        Route::get('editIconNameRedirect','IconController@editIconNameRedirect')->name('editIconNameRedirect');
        Route::post('editIconName','IconController@editIconName')->name('editIconName');
        Route::get('editIconTierRedirect','IconController@editIconTierRedirect')->name('editIconTierRedirect');
        Route::post('editIconTier','IconController@editIconTier')->name('editIconTier');
        Route::get('editIconPhotoRedirect','IconController@editIconPhotoRedirect')->name('editIconPhotoRedirect');
        Route::post('editIconPhoto','IconController@editIconPhoto')->name('editIconPhoto');
        Route::get('giveIcon','IconController@darIconRedirct')->name('giveIconRedirect');
        Route::post('giveIcon/confirm','IconController@darIcon')->name('giveIcon');

    });
    //Rotas para funções relacionadas ao season reset
    Route::prefix('season')->middleware('auth.admin3')->group(function(){
        // Rotas para resetar a season
        Route::get('reset','SeasonController@resetarSeasonRedirect')->name('seasonResetRedirect');
        Route::post('reset/confirm','SeasonController@resetarSeason')->name('seasonReset');
    });
    Route::prefix('belts')->middleware('auth.admin3')->group(function(){
        // Rotas para resetar a season
        Route::get('config','BeltController@configurarBelts')->name('configBelts');
        Route::get('verify','BeltController@verificarBelts')->name('verifyBelts');
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

Route::prefix('icon-store')->middleware('auth.logado')->group(function () {
    Route::get('/','UsuariosController@iconStore')->name('iconStore');
    Route::post('buy','UsuariosController@comprarIcone')->name('buyIcon');

});
//Rotas Rank Usuario Cash
Route::get('statistics','RankingController@statistics')->middleware('auth.logado')->name('statistics');
Route::get('selectPhoto','UsuariosController@escolhaDeIconRedirect')->middleware('auth.logado')->name('selectPhotoRedirect');
Route::post('selectPhoto/confirm','UsuariosController@selecionarIcon')->middleware('auth.logado')->name('selectPhoto');

Route::get('/gameRules', function () {
    return view('gameRules');
})->middleware('auth.logado')->name('gameRules');

Route::get('/howToPlay', function () {
    return view('howToPlay');
})->name('howToPlay');


Auth::routes();
Route::get('/', 'InicioController@homeRedirect')->name('home');

Route::get('/faq', function () {
    return view('faq/faq');
})->name('faq');

Route::get('/howToPlay', function () {
    return view('howToPlay');
})->name('howToPlay');

Auth::routes();





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



