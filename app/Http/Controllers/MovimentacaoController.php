<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimentacao as Movimentacao;
use App\Item as Item;

class MovimentacaoController extends Controller
{

    public function __construct(Movimentacao $movimentacao, Item $item) 
    {
        $this->movimentacao = $movimentacao;
        $this->item = $item;
    }

    public function index() {

        $data = [];
        $data['movimentacoes'] = $this->movimentacao->getMovimentacoes();

        return view('movimentacao/index', $data);
    }
    
    public function mover(Movimentacao $movimentacao, $item_id, $local_orig_id, $local_dest_id)
    {

        $move = new Movimentacao; 
        $move->item_id = $item_id;
        $move->local_entrada_id = $local_orig_id;
        $move->local_saida_id = $local_dest_id;
        $move->responsavel_id = session()->get('id');
        $move->save();

        if (isset($move->id)){
            $move_id = $move->id;             

            $item_data = $this->item->find($item_id);
            $item_data->local_id = $local_dest_id;

            if ($item_data->save()){
                session()->flash('alert_sucesso', 'Movimentação criada com sucesso!');
            } else {
                $item_del = $this->movimentacao->find($move_id);
                if ($item_del != null){
                    $item_del->delete();
        
                    $movimentacao->apagaUltima();
                    session()->flash('alert_erro', 'Erro a realizar a movimentação!');                                
                }                
            }           
        } else {
            session()->flash('alert_erro', 'Erro a realizar a movimentação!');
        }        
        return redirect()->route('todos_itens');
    } 
    
}
