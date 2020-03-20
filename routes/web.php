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

    Route::get('/painel', 'ContentsController@home')->name('home');

    // Rotas para itens
    Route::get('/painel/itens', 'ItemController@index')->name('todos_itens'); 
    Route::post('/painel/itens/deletar/{item_id}', 'ItemController@deletar')->name('deletar_item'); 
    Route::get('/painel/itens/novo', 'ItemController@novo')->name('novo_item');
    Route::post('/painel/itens/novo', 'ItemController@novo')->name('salvar_item');
    Route::get('/painel/itens/editar/{item_id}', 'ItemController@ver')->name('ver_item');
    Route::post('/painel/itens/editar/{item_id}', 'ItemController@editar')->name('editar_item');

    //Rotas para pedidos
    Route::get('/painel/pedidos', 'PedidoController@index')->name('todos_pedidos'); 
    Route::get('/painel/pedidos/teste', 'PedidoController@salvarPedido')->name('teste'); 
    Route::get('/painel/pedidos/editar/{pedido_id}', 'PedidoController@ver')->name('ver_pedido');
    Route::post('/painel/pedidos/editar/{pedido_id}', 'PedidoController@editar')->name('editar_pedido'); 

    // Rotas para usuários
    Route::get('/painel/usuarios', 'UserController@index')->name('todos_users'); 
    Route::post('/painel/usuarios/deletar/{user_id}', 'UserController@deletar')->name('deletar_user'); 
    Route::get('/painel/usuarios/novo', 'UserController@novo')->name('novo_user');
    Route::get('/painel/usuarios/editar/{user_id}', 'UserController@ver')->name('ver_user');
    Route::post('/painel/usuarios/editar/{user_id}', 'UserController@editar')->name('editar_user');
});

Auth::routes();
Route::post('/', 'Auth\LoginController@logout')->name('logout');

Route::get('/', function() {  return view('/inicio'); })->name('inicio');

// Gerador de senha manual
Route::get('/generate/password', function() { return bcrypt('aaaaaa'); } );