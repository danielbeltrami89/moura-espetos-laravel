<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use App\Setor as Setor;

class UserController extends Controller
{
    public function __construct(User $user, Setor $setor) {
        $this->user = $user;
        $this->setor = $setor;
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
        $data['cpf'] = $request->input('cpf');
        $data['funcao'] = $request->input('funcao');
        $data['setor_id'] = $request->input('setor_id');
        $data['password'] = $request->input('password');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'cpf' => 'required|min:14',
                    'password' => 'confirmed|min:6',
                ]
            );

            $data['password'] = bcrypt($data['password']);
            $user->insert($data);

            session()->flash('alert_sucesso', 'Usuário criado com sucesso!');
            return redirect()->route('todos_users');
        }

        $data['editar'] = 0;
        $data['setores'] = $this->setor->getSetores();

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
        $data['funcao'] = $user_data->funcao;
        $data['setor_id'] = $user_data->setor_id;
        $data['setores'] = $this->setor->all();
         
        return view('usuario/form', $data);
    }

    public function editar( Request $request, $user_id, User $user)
    {

        $data = [];

        $data['name'] = $request->input('name');
        $data['email'] = $request->input('email');
        $data['cpf'] = $request->input('cpf');
        $data['funcao'] = $request->input('funcao');
        $data['setor_id'] = $request->input('setor_id');
        $data['password'] = $request->input('password');

        if( $request->isMethod('post'))
        {
            $this->validate(
                $request,
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'cpf' => 'required|min:14',
                    'password' => 'nullable|confirmed|min:6',
                ]
            );

            $user_data = $this->user->find($user_id);
            $user_data->name = $request->input('name');
            $user_data->email = $request->input('email');
            $user_data->cpf = $request->input('cpf');
            $user_data->funcao = $request->input('funcao');
            $user_data->setor_id = $request->input('setor_id');
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
