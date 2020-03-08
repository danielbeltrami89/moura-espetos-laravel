<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tipo as Tipo;

class ItemTipoController extends Controller
{
    public function __construct(Tipo $tipoItem) {
        $this->tipoItem = $tipoItem;
    }

    public function index() {

        $data = [];
        $data['tipo_itens'] = $this->tipoItem->all();

        //dd($data);

        return view('item/tipo_item', $data);
    }

    public function novo( Request $request, Tipo $tipoItem)
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

            $tipoItem->insert($data);

            session()->flash('alert_sucesso', 'Tipo criado com sucesso!');
            return redirect()->route('ver_tipo_item');
        }

        return view('itens/tipo_item', $data);
    }

    public function deletar($tipoItem_id)
    {
        $tipoItem_del = $this->tipoItem->find($tipoItem_id);
        
        if ($tipoItem_del != null){
            $tipoItem_del->delete();

            session()->flash('alert_sucesso', 'Tipo deletado com sucesso!');
            return redirect()->route('ver_tipo_item');
        
        }

        session()->flash('alert_erro', 'Erro ao deletar tipo, tente novamente mais tarde.');
        return redirect()->route('ver_tipo_item');
    } 
    
}
