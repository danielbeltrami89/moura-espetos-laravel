<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido as Pedido;
use App\Item as Item;
use App\ItemPedido as ItemPedido;
    
class ItensPedidoController extends Controller {

    public function __construct(Pedido $pedido, Item $item, ItemPedido $itemPedido) 
    {
        $this->pedido = $pedido;
        $this->item = $item;
        $this->itemPedido = $itemPedido;
    }

    public function index() {

        $data = [];
        $data['pedidos'] = $this->pedido->getPedidos();

        return view('pedidos/index', $data);
    }

    public function addPedidoTeste(Pedido $pedido) {
            $data = [];

            $data['valor_total'] = '25,00' ;
            $data['status'] = 'novo';
            $data['telefone'] = '00000000000';
            
            $pedido->insert($data);

            session()->flash('alert_sucesso', 'Pedido criado com sucesso!');
            return redirect()->route('todos_pedidos');
    }
   
    // public function novo( Request $request, Item $item )
    // {

    //     $data = [];

    //     $data['nome'] = $request->input('nome');
    //     $data['descricao'] = $request->input('descricao');
    //     $data['tipo'] = $request->input('tipo');
    //     $data['valor'] = $request->input('valor');
    //     $data['imagem'] = $request->input('imagem');

    //     if( $request->isMethod('post'))
    //     {
    //         $this->validate(
    //             $request,
    //             [
    //                 'nome' => 'required',
    //                 'descricao' => 'required',
    //                 'valor' => 'required',
    //             ]
    //         );

    //         $item->insert($data);

    //         session()->flash('alert_sucesso', 'Item criado com sucesso!');
    //         return redirect()->route('todos_itens');
    //     }

    //     $data['editar'] = 0;

    //     //dd($data);

    //     return view('item/form', $data);
    // }

    // public function ver($item_id) 
    // {
    //     $data = [];
    //     $data['editar'] = 1;

    //     $data['item_id'] = $item_id;

    //     $item_data = $this->item->find($item_id);
    //     $data['nome'] = $item_data->nome;
    //     $data['descricao'] = $item_data->descricao;
    //     $data['tipo'] = $item_data->tipo;
    //     $data['valor'] = $item_data->valor;
    //     $data['imagem'] = $item_data->imagem;
         
    //     //dd($data);

    //     return view('item/form', $data);
    // }

    // public function editar( Request $request, $item_id, Item $item)
    // {

    //     $data = [];

    //     $data['nome'] = $request->input('nome');
    //     $data['descricao'] = $request->input('descricao');
    //     $data['tipo'] = $request->input('tipo');
    //     $data['valor'] = $request->input('valor');
    //     $data['imagem'] = $request->input('imagem');

    //     if( $request->isMethod('post'))
    //     {
    //         $this->validate(
    //             $request,
    //             [
    //                 'nome' => 'required',
    //                 'descricao' => 'required',
    //                 'valor' => 'required',
    //             ]
    //         );

    //         $item_data = $this->item->find($item_id);
    //         $item_data->nome = $request->input('nome');
    //         $item_data->descricao = $request->input('descricao');
    //         $item_data->imagem = $request->input('iamgem');
    //         $item_data->tipo = $request->input('tipo');
    //         $item_data->valor = $request->input('valor');     
    //         $item_data->save();
            
    //         session()->flash('alert_sucesso', 'Item editado com sucesso!');
    //         return redirect()->route('todos_itens');
    //     }

    //     $data['editar'] = 0;

    //     return view('item/form', $data);
    // }

    // public function deletar($item_id)
    // {
    //     $item_del = $this->item->find($item_id);
        
    //     if ($item_del != null){
    //         $item_del->delete();

    //         session()->flash('alert_sucesso', 'Item deletado com sucesso!');
    //         return redirect()->route('todos_itens');
        
    //     }

    //     session()->flash('alert_erro', 'Erro ao deletar item, tente novamente mais tarde.');
    //     return redirect()->route('todos_itens');
    // } 
    

}
