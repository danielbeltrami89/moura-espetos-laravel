<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido as Pedido;
use App\Item as Item;
use App\User as Cliente;
use App\ItemPedido as ItemPedido;
    
class PedidoController extends Controller {

    public function __construct(Pedido $pedido, Item $item, Cliente $cliente, ItemPedido $itemPedido) 
    {
        $this->pedido = $pedido;
        $this->item = $item;
        $this->cliente = $cliente;
        $this->itemPedido = $itemPedido;
    }

    public function index() {

        $data = [];
        $data['pedidos'] = $this->pedido->getPedidos();

        return view('pedido/index', $data);
    }

    public function salvarPedido(Pedido $pedido, ItemPedido $itemPedido) {
        
        $pedido->valor_total = 0;
        $pedido->status = 'novo';
        $pedido->telefone = '00000000000';
        $salvou = $pedido->save(); 
        if ($salvou) {
            $itemPedido = new ItemPedido();
            $itemPedido->pedido_id = $pedido->id;
            $itemPedido->item_id = 1;
            $itemPedido->save(); 

            $itemPedido2 = new ItemPedido();
            $itemPedido2->pedido_id = $pedido->id;
            $itemPedido2->item_id = 2;
            $itemPedido2->save(); 
        }
        dd($pedido->id);

        session()->flash('alert_sucesso', 'Pedido criado com sucesso!');
        return redirect()->route('todos_pedidos');
    }

   
    public function ver(Pedido $pedido, $pedido_id, ItemPedido $itemPedido) {
        
        $data = [];
        $data['pedido'] = $this->pedido->getPedido($pedido_id);
        $data['itens_pedido'] = $this->itemPedido->getItensPedido($pedido_id);
            
        //dd($data);

        return view('pedido/form', $data);
    }


    public function editar(Request $request, Pedido $pedido, $pedido_id) {
        
        if( $request->isMethod('post')) {

            $pedido_data = $this->pedido->find($pedido_id);
            $pedido_data->status = $request->input('status');         
            $pedido_data->save();
            
            session()->flash('alert_sucesso', 'Pedido editado com sucesso!');
            return redirect()->route('todos_pedidos');
        }
    }
}
