<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

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

    // ------------ Cliente -------------
    public function verPedidosCliente(Pedido $pedido, $cliente_id) {
        
        $data = [];
        $data['pedidos'] = $this->pedido->getPedidosCliente($cliente_id);

        //dd($data);

        return view('cliente/pedidos-cliente', $data);
    }

    public function addPedido(Request $request, Pedido $pedido, ItemPedido $itemPedido) {
        
        $pedido->valor_total = 0;
        $pedido->status = 'Novo';
        $pedido->telefone = '1195';
        $salvou = $pedido->save(); 
        if ($salvou) {
            $itemPedido = new ItemPedido();
            $itemPedido->pedido_id = $pedido->id;
            //$itemPedido->item_id = $request->get('id');
            $itemPedido->item_id = 1;
            $itemPedido->save(); 
        }
        //dd($pedido->id);

        return Redirect::back()->with('msg_return', 'Pedido criado com sucesso!');
    }

    public function fazerPedido(Request $request, Pedido $pedido, ItemPedido $itemPedido) {
        
        $telefone = session()->get('tel');
        //dd($telefone);
        if ($telefone != null) {
            $pedido = new Pedido();
            $pedido->status = 'Novo';
            $pedido->telefone = $telefone;
            $pedido->valor_total = 0;
            $itens_pedido = [];
            $itens_pedido = session()->get('cart');
            $pedido->save();

            $total = 0;
            foreach ($itens_pedido as $item) {
                //dd($item);
                for ($i=0; $i < $item["qnt"]; $i++) { 
                    $itemPedido = new ItemPedido();
                    $itemPedido->pedido_id = $pedido->id;
                    $itemPedido->item_id = $item["id"];
                    $total = $total + $item["valor"];
                    //dd($itemPedido);
                    $itemPedido->save(); 
                }
            }
            $pedido->valor_total = $total;
            $pedido->save();
            
            //dd($total);
    
            session()->forget('cart');
            return Redirect::back()->with('msg_return', 'Pedido criado com sucesso!');
        } else {
            return Redirect::back()->with('msg_return', 'Faça login para fazer seu pedido!');
        }
        
    }

    // Funcoes carrinho usando sessao
    public function addToCart(Request $request, Item $item)
    {
        $id = $request->get('id');
        $item = $this->item->find($id); 
 
        if(!$item) {
 
            //abort(404);
            dd($item);
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first item
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "id" => $id,
                        "nome" => $item->nome,
                        "qnt" => 1,
                        "valor" => $item->valor,
                        "descricao" => $item->descricao,
                        "tipo" => $item->tipo
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('msg_return', 'Item adicionado ao carrinho com sucesso!');
        }
 
        // if cart not empty then check if this item exist then increment qnt
        if(isset($cart[$id])) {
 
            $cart[$id]['qnt']++;
 
            session()->put('cart', $cart);

            return redirect()->back()->with('msg_return', 'Item adicionado ao carrinho com sucesso!');
 
        }
 
        // if item not exist in cart then add to cart with qnt = 1
        $cart[$id] = [
            "id" => $id,
            "nome" => $item->nome,
            "qnt" => 1,
            "valor" => $item->valor,
            "descricao" => $item->descricao,
            "tipo" => $item->tipo
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('msg_return', 'Item adicionado ao carrinho com sucesso!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->qnt)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["qnt"] = $request->qnt;
 
            session()->put('cart', $cart);
            session()->flash('msg_return', 'Carrinho atualizado.');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
 
            session()->flash('msg_return', 'Produto removido!');
        }
    }
}
