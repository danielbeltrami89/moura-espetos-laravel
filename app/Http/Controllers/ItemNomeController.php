<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NomeItem as NomeItem;

class ItemNomeController extends Controller
{
    public function __construct(NomeItem $nomeItem) {
        $this->nomeItem = $nomeItem;
    }

    public function index() {

        $data = [];
        $data['nome_itens'] = $this->nomeItem->all();

        //dd($data);

        return view('item/nome_item', $data);
    }

    public function novo( Request $request, NomeItem $nomeItem)
    {

        $data = [];

        $data['nome'] = $request->input('nome');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'nome' => 'required',
                ]
            );

            $nomeItem->insert($data);

            session()->flash('alert_sucesso', 'Nome do item criado com sucesso!');
            return redirect()->route('ver_nome_item');
        }

        return view('itens/nome_item', $data);
    }

    public function deletar($nomeItem_id)
    {
        $nomeItem_del = $this->nomeItem->find($nomeItem_id);
        
        if ($nomeItem_del != null){
            $nomeItem_del->delete();

            session()->flash('alert_sucesso', 'Nome do item deletado com sucesso!');
            return redirect()->route('ver_nome_item');
        
        }

        session()->flash('alert_erro', 'Erro ao deletar nome do item, tente novamente mais tarde.');
        return redirect()->route('ver_nome_item');
    } 
    
}
