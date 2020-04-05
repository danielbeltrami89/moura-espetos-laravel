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

Route::middleware(['auth','check.adm'])->group( function(){

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

Route::get('/pedidos-cliente/{cliente_id}', 'PedidoController@verPedidosCliente')->name('pedidos-cliente'); 
Route::get('/cliente/meus-dados/{user_id}', 'UserController@verCliente')->name('ver_cliente');
Route::post('/cliente/meus-dados/{user_id}', 'UserController@editarCliente')->name('editar_cliente');



Route::get('/', function() {  return view('cliente/inicio'); })->name('inicio');
Route::get('/faca-seu-pedido', 'ItemController@indexCliente')->name('produtos_cliente');
Route::get('/faca-seu-pedido/teste', 'PedidoController@addPedido')->name('add_pedido'); 

Route::get('/faca-seu-pedido/fazer-pedido', 'PedidoController@fazerPedido')->name('fazer_pedido'); 
Route::post('/faca-seu-pedido/add-carrinho', 'PedidoController@addToCart')->name('add-cart'); 
Route::get('/faca-seu-pedido/carrinho/', function() {  return view('cliente/carrinho'); })->name('cart'); 

Route::patch('update-cart', 'PedidoController@update');
Route::delete('remove-from-cart', 'PedidoController@remove');

Route::get('/pedidos-cliente/{cliente_id}', 'PedidoController@verPedidosCliente')->name('pedidos-cliente'); 

// Gerador de senha manual
Route::get('/generate/password', function() { return bcrypt('aaaaaa'); } );

