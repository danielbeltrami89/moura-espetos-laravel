<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setor as Setor;

class SetorController extends Controller
{
    public function __construct(Setor $setor) {
        $this->setor = $setor;
    }

    public function index() {

        $data = [];
        $data['setores'] = $this->setor->all();

        return view('setor/index', $data);
    }

    public function novo( Request $request, Setor $setor)
    {
        $data = [];

        $data['nome'] = $request->input('nome');
        $data['descricao'] = $request->input('descricao');        

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'nome' => 'required',
    
                ]
            );

            $setor->insert($data);

            session()->flash('alert_sucesso', 'Setor criado com sucesso!');
            return redirect()->route('todos_setores');
        }

        $data['editar'] = 0;

        return view('setor/form', $data);
    }

    public function ver($setor_id) 
    {
        $data = [];
        $data['editar'] = 1;

        $data['setor_id'] = $setor_id;

        $setor_data = $this->setor->find($setor_id);
        $data['nome'] = $setor_data->nome;
        $data['descricao'] = $setor_data->descricao;
         
        return view('setor/form', $data);
    }

    public function editar( Request $request, $setor_id, Setor $setor)
    {

        $data = [];

        $data['nome'] = $request->input('nome');
        $data['descricao'] = $request->input('descricao');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'nome' => 'required',
                ]
            );

            $setor_data = $this->setor->find($setor_id);
            $setor_data->nome = $request->input('nome');
            $setor_data->descricao = $request->input('descricao');
            $setor_data->save();
            
            session()->flash('alert_sucesso', 'Setor editado com sucesso!');
            return redirect()->route('todos_setores');
        }

        $data['editar'] = 0;

        return view('setor/form', $data);
    }

    public function deletar($setor_id)
    {
        $setor_del = $this->setor->find($setor_id);
        
        if ($setor_del != null){
            $setor_del->delete();

            session()->flash('alert_sucesso', 'Setor deletado com sucesso!');
            return redirect()->route('todos_setores');
        
        }

        session()->flash('alert_erro', 'Erro ao deletar setor, tente novamente mais tarde.');
        return redirect()->route('todos_setores');
    } 
}
