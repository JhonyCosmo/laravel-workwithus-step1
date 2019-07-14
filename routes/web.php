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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pessoas/criar','PessoasController@create')->name('form_criar_pessoa');
Route::post('/pessoas/criar','PessoasController@store');
Route::get('/pessoas','PessoasController@index')->name('listar_pessoas');
Route::delete('/pessoas/{pessoa}','PessoasController@destroy');


Route::get('/contas/criar/{pessoa}','ContasController@create')->name('form_criar_conta');
Route::post('/contas/criar/{pessoa}','ContasController@store');
Route::get('/pessoas/{pessoa}/contas','ContasController@index')->name('listar_contas');
Route::delete('/contas/{conta}','ContasController@destroy');

