<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;

class UserController extends Controller
{
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function index() {

        $data = [];
        $data['users'] = $this->user->getUsers();

        return view('usuario/index', $data);
    }

    public function novo( Request $request, User $user )
    {

        $data = [];

        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        //$data['cpf'] = $request->input('cpf');
        $data['telefone'] = $request->input('telefone');
        $data['cep'] = $request->input('cep');
        $data['endereco'] = $request->input('endereco');
        $data['numero'] = $request->input('numero');
        $data['complemento'] = $request->input('complemento');
        $data['bairro'] = $request->input('bairro');
        $data['cidade'] = $request->input('cidade');
        $data['uf'] = $request->input('uf');

        $data['tipo'] = "cliente";
        $data['password'] = $request->input('password');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'telefone' => 'required',
                    'password' => 'confirmed|min:6',
                ]
            );

            $data['password'] = bcrypt($data['password']);
            $user->insert($data);

            session()->flash('alert_sucesso', 'Usuário criado com sucesso!');
            return redirect()->route('todos_users');
        }

        $data['editar'] = 0;

        //dd($data);

        return view('usuario/form', $data);
    }

    public function ver($user_id) 
    {
        $data = [];
        $data['editar'] = 1;

        $data['user_id'] = $user_id;

        $user_data = $this->user->find($user_id);
        $data['name'] = $user_data->name;
        $data['email'] = $user_data->email;
        $data['cpf'] = $user_data->cpf;
        $data['telefone'] = $user_data->telefone;

        $data['cep'] = $user_data->cep;
        $data['endereco'] = $user_data->endereco;
        $data['numero'] = $user_data->numero;
        $data['complemento'] = $user_data->complemento;
        $data['bairro'] = $user_data->bairro;
        $data['cidade'] = $user_data->cidade;
        $data['uf'] = $user_data->uf;

        $data['tipo'] = $user_data->tipo;
         
        return view('usuario/form', $data);
    }

    public function verCliente($user_id) 
    {
        $data = [];
        $data['editar'] = 1;

        $data['user_id'] = $user_id;

        $user_data = $this->user->find($user_id);
        $data['name'] = $user_data->name;
        $data['email'] = $user_data->email;
        $data['cpf'] = $user_data->cpf;
        $data['telefone'] = $user_data->telefone;

        $data['cep'] = $user_data->cep;
        $data['endereco'] = $user_data->endereco;
        $data['numero'] = $user_data->numero;
        $data['complemento'] = $user_data->complemento;
        $data['bairro'] = $user_data->bairro;
        $data['cidade'] = $user_data->cidade;
        $data['uf'] = $user_data->uf;

        $data['tipo'] = $user_data->tipo;
         
        return view('cliente/meus-dados', $data);
    }

    public function editarCliente( Request $request, $user_id, User $user)
    {

        $data = [];

        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['cpf'] = $request->input('cpf');
        $data['telefone'] = $request->input('telefone');

        $data['cep'] = $request->input('cep');
        $data['endereco'] = $request->input('endereco');
        $data['numero'] = $request->input('numero');
        $data['complemento'] = $request->input('complemento');
        $data['bairro'] = $request->input('bairro');
        $data['cidade'] = $request->input('cidade');
        $data['uf'] = $request->input('uf');

        $data['password'] = $request->input('password');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'telefone' => 'required',
                    'password' => 'nullable|confirmed|min:6',
                ]
            );

            $user_data = $this->user->find($user_id);
            $user_data->name = $request->input('name');
            $user_data->email = $request->input('email');
            $user_data->cpf = $request->input('cpf');
            $user_data->telefone = $request->input('telefone');

            $user_data->cep = $request->input('cep');
            $user_data->endereco = $request->input('endereco');
            $user_data->numero = $request->input('numero');
            $user_data->complemento = $request->input('complemento');
            $user_data->bairro = $request->input('bairro');
            $user_data->cidade = $request->input('cidade');
            $user_data->uf = $request->input('uf');

            $user_data->password = bcrypt($request->input('password'));
            $user_data->save();
            
            session()->flash('msg_return', 'Usuário editado com sucesso!');
            return redirect()->route('ver_cliente', [ 'user_id' => $user_id ]);
        }

        $data['editar'] = 0;

        return view('usuario/form', $data);
    }

    public function editar( Request $request, $user_id, User $user)
    {

        $data = [];

        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['cpf'] = $request->input('cpf');
        $data['telefone'] = $request->input('telefone');
        $data['tipo'] = $request->input('tipo');

        $data['cep'] = $request->input('cep');
        $data['endereco'] = $request->input('endereco');
        $data['numero'] = $request->input('numero');
        $data['complemento'] = $request->input('complemento');
        $data['bairro'] = $request->input('bairro');
        $data['cidade'] = $request->input('cidade');
        $data['uf'] = $request->input('uf');

        $data['password'] = $request->input('password');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'telefone' => 'required',
                    'password' => 'nullable|confirmed|min:6',
                ]
            );

            $user_data = $this->user->find($user_id);
            $user_data->name = $request->input('name');
            $user_data->email = $request->input('email');
            $user_data->cpf = $request->input('cpf');
            $user_data->telefone = $request->input('telefone');
            $user_data->tipo = $request->input('tipo');
            $user_data->password = bcrypt($request->input('password'));
            $user_data->save();
            
            session()->flash('alert_sucesso', 'Usuário editado com sucesso!');
            return redirect()->route('todos_users');
        }

        $data['editar'] = 0;

        return view('usuario/form', $data);
    }

    public function deletar($user_id)
    {
        $user_del = $this->user->find($user_id);
        
        if ($user_del != null){
            $user_del->delete();

            session()->flash('alert_sucesso', 'Usuário deletado com sucesso!');
            return redirect()->route('todos_users');
        
        }

        session()->flash('alert_erro', 'Erro ao deletar usuário, tente novamente mais tarde.');
        return redirect()->route('todos_users');
    } 
    
}
