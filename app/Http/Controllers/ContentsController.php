<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item as Item;
use App\Pedido as Pedido;
use App\User as Cliente;

class ContentsController extends Controller
{

    // public function __construct(Movimentacao $movimentacao, 
    //                             Item $item,
    //                             Setor $setor,
    //                             Local $local) 
    // {
    //     $this->item = $item;
    //     $this->movimentacao = $movimentacao;
    //     $this->setor = $setor;
    //     $this->local = $local;        
        
    // }

    public function __construct(Item $item, Pedido $pedido, Cliente $cliente) {
        $this->item = $item;   
        $this->pedido = $pedido;
        $this->cliente = $cliente;
    }

    public function home() {

        $data['itens'] = $this->item->getTop5Itens();
        $data['item_count'] = $this->item::count();
        $data['pedido_count'] = $this->pedido::count();
        $data['cliente_count'] = $this->cliente::count();
        
        //dd($data);

        return view('contents/home', $data);
    }

    
}
