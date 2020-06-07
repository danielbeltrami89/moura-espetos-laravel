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


Route::middleware(['auth','check.user'])->group( function(){
 
    Route::get('/pedidos-cliente/{id}', 'PedidoController@verPedidosCliente')->name('pedidos-cliente'); 
    Route::get('/pedidos-cliente/{id}/pedido/{pedido_id}', 'PedidoController@verPedidoCliente')->name('pedido-cliente');
    Route::get('/cliente/{id}', 'UserController@verCliente')->name('ver_cliente');
    Route::post('/cliente/{id}', 'UserController@editarCliente')->name('editar_cliente');

    Route::get('/pedidos-cliente/{id}/pedido/{pedido_id}/confirmar', 'PagamentoController@pagarPedido')->name('pagar-pedido');
    Route::get('/pedidos-cliente/{id}/pedido/{pedido_id}/{response}', 'PagamentoController@pagarResponse')->name('pagar-response');

});

Auth::routes();

Route::post('/', 'Auth\LoginController@logout')->name('logout');


Route::get('/', function() {  return view('cliente/inicio'); })->name('inicio');
Route::get('/faca-seu-pedido', 'ItemController@indexCliente')->name('produtos_cliente');

Route::get('/faca-seu-pedido/fazer-pedido', 'PedidoController@fazerPedido')->name('fazer_pedido'); 
Route::post('/faca-seu-pedido/add-carrinho', 'PedidoController@addToCart')->name('add-cart'); 
Route::get('/faca-seu-pedido/carrinho', function() { return view('cliente/carrinho'); })->name('cart'); 
Route::patch('update-cart', 'PedidoController@update');
Route::delete('remove-from-cart', 'PedidoController@remove');

Route::get('/mercadopago', 'PagamentoController@pagar');
Route::get('/envia', 'PagamentoController@envia');


