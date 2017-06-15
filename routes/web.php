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
});

Route::get('/admin','HomeController@adminPanel')->name('painelAdmin');

Route::get('/admin/superstar/create', function() {
    return view('criarSuperstar');
    })->name('criarSuperstar');

Route::get('/admin/superstar/edit','SuperstarsController@editPage')->name('editarSuperstar');

Route::post('/admin/superstar/create/confirm','SuperstarsController@cadastrar');
Route::post('/admin/superstar/edit/confirm','SuperstarsController@editar');
Route::get('/admin/superstar/list','SuperstarsController@listar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
