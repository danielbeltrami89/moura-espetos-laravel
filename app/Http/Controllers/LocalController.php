<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Local as Local;

class LocalController extends Controller
{
    public function __construct(Local $local) {
        $this->local = $local;
    }

    public function index() {

        $data = [];
        $data['locais'] = $this->local->all();

        //dd($data);

        return view('local/index', $data);
    }

    public function novo( Request $request, Local $local)
    {

        $data = [];

        $data['nome'] = $request->input('nome');
        $data['endereco'] = $request->input('endereco');
        $data['numero'] = $request->input('numero');
        $data['bairro'] = $request->input('bairro');
        $data['cidade'] = $request->input('cidade');
        $data['estado'] = $request->input('estado');
        $data['cep'] = $request->input('cep');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'nome' => 'required',
                ]
            );

            $local->insert($data);

            session()->flash('alert_sucesso', 'Local criado com sucesso!');
            return redirect()->route('todos_locais');
        }

        $data['editar'] = 0;
        //dd($data);

        return view('local/form', $data);
    }

    public function ver($local_id) 
    {
        $data = [];
        $data['editar'] = 1;

        $data['local_id'] = $local_id;

        $local_data = $this->local->find($local_id);
        $data['nome'] = $local_data->nome;
        $data['endereco'] = $local_data->endereco;
        $data['numero'] = $local_data->numero;
        $data['bairro'] = $local_data->bairro;
        $data['cidade'] = $local_data->cidade;
        $data['estado'] = $local_data->estado;
        $data['cep'] = $local_data->cep;
         
        return view('local/form', $data);
    }

    public function editar( Request $request, $local_id, Local $local)
    {

        $data = [];

        $data['nome'] = $request->input('nome');
        $data['endereco'] = $request->input('endereco');
        $data['numero'] = $request->input('numero');
        $data['bairro'] = $request->input('bairro');
        $data['cidade'] = $request->input('cidade');
        $data['estado'] = $request->input('estado');
        $data['cep'] = $request->input('cep');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'nome' => 'required',
                ]
            );

            $local_data = $this->local->find($local_id);
            $local_data->nome = $request->input('nome');
            $local_data->endereco = $request->input('endereco');
            $local_data->numero = $request->input('numero');
            $local_data->bairro = $request->input('bairro');
            $local_data->cidade = $request->input('cidade');
            $local_data->estado = $request->input('estado');
            $local_data->cep = $request->input('cep');
            $local_data->save();
            
            session()->flash('alert_sucesso', 'Local editado com sucesso!');
            return redirect()->route('todos_locais');
        }

        $data['editar'] = 0;

        return view('local/form', $data);
    }

    public function deletar($local_id)
    {
        $local_del = $this->local->find($local_id);
        
        if ($local_del != null){
            $local_del->delete();

            session()->flash('alert_sucesso', 'Local deletado com sucesso!');
            return redirect()->route('todos_locais');
        
        }

        session()->flash('alert_erro', 'Erro ao deletar local, tente novamente mais tarde.');
        return redirect()->route('todos_locais');
    } 
    
}
