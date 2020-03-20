<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item as Item;
    
class ItemController extends Controller {

    public function __construct(Item $item) 
    {
        $this->item = $item;
    }

    public function index() {

        $data = [];
        $data['itens'] = $this->item->getItens();

        return view('item/index', $data);
    }

    public function novo( Request $request, Item $item )
    {
        $item_data = $item;
        $item_data->nome = $request->input('nome');
        $item_data->descricao = $request->input('descricao');
        $item_data->imagem = $request->input('iamgem');
        $item_data->tipo = $request->input('tipo');
        $item_data->valor = str_replace(',', '.', $request->input('valor'));      
        
        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'nome' => 'required',
                    'descricao' => 'required',
                    'valor' => 'required',
                ]
            );
            $item_data->save();

            session()->flash('alert_sucesso', 'Item criado com sucesso!');
            return redirect()->route('todos_itens');
        }

        $data['nome'] = $item_data->nome;
        $data['descricao'] = $item_data->descricao;
        $data['tipo'] = $item_data->tipo;
        $data['valor'] = $item_data->valor;
        $data['imagem'] = $item_data->imagem;
        $data['editar'] = 0;

        //dd($data);

        return view('item/form',$data);
    }

    public function ver($item_id) 
    {
        $data = [];
        $data['editar'] = 1;

        $data['item_id'] = $item_id;

        $item_data = $this->item->find($item_id);
        $data['nome'] = $item_data->nome;
        $data['descricao'] = $item_data->descricao;
        $data['tipo'] = $item_data->tipo;
        $data['valor'] = str_replace('.', ',',  $item_data->valor);
        $data['imagem'] = $item_data->imagem;
         
        //dd($data);

        return view('item/form', $data);
    }

    public function editar(Request $request, $item_id, Item $item)
    {
        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'nome' => 'required',
                    'descricao' => 'required',
                    'valor' => 'required',
                ]
            );

            $item_data = $this->item->find($item_id);
            $item_data->nome = $request->input('nome');
            $item_data->descricao = $request->input('descricao');
            $item_data->imagem = $request->input('iamgem');
            $item_data->tipo = $request->input('tipo');
            $item_data->valor = str_replace(',', '.', $request->input('valor'));          
            $item_data->save();
            
            session()->flash('alert_sucesso', 'Item editado com sucesso!');
            return redirect()->route('todos_itens');
        }
    }

    public function deletar($item_id)
    {
        $item_del = $this->item->find($item_id);
        
        if ($item_del != null){
            $item_del->delete();

            session()->flash('alert_sucesso', 'Item deletado com sucesso!');
            return redirect()->route('todos_itens');
        
        }

        session()->flash('alert_erro', 'Erro ao deletar item, tente novamente mais tarde.');
        return redirect()->route('todos_itens');
    } 
    

}
