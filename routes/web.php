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

Route::middleware('auth')->group( function(){

    Route::get('/', 'ContentsController@home')->name('home');

    // Rotas para itens
    Route::get('/itens', 'ItemController@index')->name('todos_itens'); 
    Route::post('/itens/deletar/{item_id}', 'ItemController@deletar')->name('deletar_item'); 
    Route::get('/itens/novo', 'ItemController@novo')->name('novo_item');
    Route::post('/itens/novo', 'ItemController@novo')->name('criar_item');
    Route::get('/itens/editar/{item_id}', 'ItemController@ver')->name('ver_item');
    Route::post('/itens/editar/{item_id}', 'ItemController@editar')->name('editar_item');

    Route::post('/itens/nome_item', 'ItemNomeController@novo')->name('criar_nome_item');
    Route::get('/itens/nome_item', 'ItemNomeController@index')->name('ver_nome_item');
    Route::post('/itens/deletar_nome/{nome_id}', 'ItemNomeController@deletar')->name('deletar_nome_item'); 

    Route::post('/itens/status_item', 'ItemStatusController@novo')->name('criar_status_item');
    Route::get('/itens/status_item', 'ItemStatusController@index')->name('ver_status_item');
    Route::post('/itens/deletar_status/{status_id}', 'ItemStatusController@deletar')->name('deletar_status_item'); 

    Route::post('/itens/tipo_item', 'ItemTipoController@novo')->name('criar_tipo_item');
    Route::get('/itens/tipo_item', 'ItemTipoController@index')->name('ver_tipo_item');
    Route::post('/itens/deletar_tipo/{tipo_id}', 'ItemTipoController@deletar')->name('deletar_tipo_item'); 

    // Rotas para movimentacoees
    Route::get('/movimentacoes', 'MovimentacaoController@index')->name('todas_movimentacoes'); 
    Route::post('/itens/mover/{item_id}/{local_orig_id}/{local_dest_id}', 'MovimentacaoController@mover')->name('mover_item'); 

    // Rotas para locais
    Route::get('/locais', 'LocalController@index')->name('todos_locais'); 
    Route::post('/locais/deletar/{local_id}', 'LocalController@deletar')->name('deletar_local'); 
    Route::get('/locais/novo', 'LocalController@novo')->name('novo_local');
    Route::post('/locais/novo', 'LocalController@novo')->name('criar_local');
    Route::get('/locais/editar/{local_id}', 'LocalController@ver')->name('ver_local');
    Route::post('/locais/editar/{local_id}', 'LocalController@editar')->name('editar_local');

    // Rotas para setores
    Route::get('/setores', 'SetorController@index')->name('todos_setores'); 
    Route::post('/setores/deletar/{setor_id}', 'SetorController@deletar')->name('deletar_setor'); 
    Route::get('/setores/novo', 'SetorController@novo')->name('novo_setor');
    Route::post('/setores/novo', 'SetorController@novo')->name('criar_setor');
    Route::get('/setores/editar/{setor_id}', 'SetorController@ver')->name('ver_setor');
    Route::post('/setores/editar/{setor_id}', 'SetorController@editar')->name('editar_setor');

    // Rotas para fornecedores
    Route::get('/fornecedores', 'FornecedorController@index')->name('todos_fornecedores'); 
    Route::post('/fornecedores/deletar/{fornecedor_id}', 'FornecedorController@deletar')->name('deletar_fornecedor'); 
    Route::get('/fornecedores/novo', 'FornecedorController@novo')->name('novo_fornecedor');
    Route::post('/fornecedores/novo', 'FornecedorController@novo')->name('criar_fornecedor');
    Route::get('/fornecedores/editar/{fornecedor_id}', 'FornecedorController@ver')->name('ver_fornecedor');
    Route::post('/fornecedores/editar/{fornecedor_id}', 'FornecedorController@editar')->name('editar_fornecedor');

    // Rotas para usuários
    Route::get('/usuarios', 'UserController@index')->name('todos_users'); 
    Route::post('/usuarios/deletar/{user_id}', 'UserController@deletar')->name('deletar_user'); 
    Route::get('/usuarios/novo', 'UserController@novo')->name('novo_user');
    Route::post('/usuarios/novo', 'UserController@novo')->name('criar_user');
    Route::get('/usuarios/editar/{user_id}', 'UserController@ver')->name('ver_user');
    Route::post('/usuarios/editar/{user_id}', 'UserController@editar')->name('editar_user');
});

Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Gerador de senha manual
Route::get('/generate/password', function() { return bcrypt('aaaaaa'); } );