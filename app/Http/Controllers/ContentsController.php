<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item as Item;
use App\Movimentacao as Movimentacao;
use App\Setor as Setor;
use App\Local as Local;

class ContentsController extends Controller
{

    public function __construct(Movimentacao $movimentacao, 
                                Item $item,
                                Setor $setor,
                                Local $local) 
    {
        $this->item = $item;
        $this->movimentacao = $movimentacao;
        $this->setor = $setor;
        $this->local = $local;        
        
    }

    public function home() {

        $data['itens'] = $this->item->getTop5Itens();
        $data['movimentacoes'] = $this->movimentacao->getTop5Movimentacoes();
        $data['setor_count'] = $this->setor::count();
        $data['local_count'] = $this->local::count();
        $data['item_count'] = $this->item::count();
        $data['moves_count'] = $this->movimentacao::count();
        
        //dd($data);

        return view('contents/home', $data);
    }

    
}
