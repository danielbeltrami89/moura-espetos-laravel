<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item as Item;
// use App\Movimentacao as Movimentacao;
// use App\Setor as Setor;
// use App\Local as Local;

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

    public function __construct(Item $item) {
        $this->item = $item;   
    }

    public function home() {

        $data['itens'] = $this->item->getTop5Itens();
        $data['item_count'] = $this->item::count();
        
        //dd($data);

        return view('contents/home', $data);
    }

    
}
