<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor as Fornecedor;

class FornecedorController extends Controller
{
    public function __construct(Fornecedor $fornecedor) {
        $this->fornecedor = $fornecedor;
    }

    public function index() {

        $data = [];
        $data['fornecedores'] = $this->fornecedor->all();

        return view('fornecedor/index', $data);
    }

    public function novo( Request $request, Fornecedor $fornecedor)
    {
        $data = [];

        $data['cnpj'] = $request->input('cnpj');
        $data['razao'] = $request->input('razao');
        $data['telefone'] = $request->input('telefone');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'cnpj' => 'required',
                    'razao' => 'required',
                ]
            );

            $fornecedor->insert($data);

            session()->flash('alert_sucesso', 'Fornecedor criado com sucesso!');
            return redirect()->route('todos_fornecedores');
        }

        $data['editar'] = 0;

        return view('fornecedor/form', $data);
    }

    public function ver($fornecedor_id) 
    {
        $data = [];
        $data['editar'] = 1;

        $data['fornecedor_id'] = $fornecedor_id;

        $fornecedor_data = $this->fornecedor->find($fornecedor_id);
        $data['cnpj'] = $fornecedor_data->cnpj;
        $data['razao'] = $fornecedor_data->razao;
        $data['telefone'] = $fornecedor_data->telefone;
         
        return view('fornecedor/form', $data);
    }

    public function editar( Request $request, $fornecedor_id, Fornecedor $fornecedor)
    {

        $data = [];

        $data['cnpj'] = $request->input('cnpj');
        $data['razao'] = $request->input('razao');
        $data['telefone'] = $request->input('telefone');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'cnpj' => 'required',
                    'razao' => 'required',
                ]
            );

            $fornecedor_data = $this->fornecedor->find($fornecedor_id);
            $fornecedor_data->cnpj = $request->input('cnpj');
            $fornecedor_data->razao = $request->input('razao');
            $fornecedor_data->telefone = $request->input('telefone');
            $fornecedor_data->save();
            
            session()->flash('alert_sucesso', 'fornecedor editado com sucesso!');
            return redirect()->route('todos_fornecedores');
        }

        $data['editar'] = 0;

        return view('fornecedor/form', $data);
    }

    public function deletar($fornecedor_id)
    {
        $fornecedor_del = $this->fornecedor->find($fornecedor_id);
        
        if ($fornecedor_del != null){
            $fornecedor_del->delete();

            session()->flash('alert_sucesso', 'Fornecedor deletado com sucesso!');
            return redirect()->route('todos_fornecedores');
        
        }

        session()->flash('alert_erro', 'Erro ao deletar fornecedor, tente novamente mais tarde.');
        return redirect()->route('todos_fornecedores');
    } 
    
}
