@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $editar == 1 ? 'Editar Usuário ' : 'Novo Usuário' }}</h1>

<!-- Início CardForm -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Dados do usuário</h6>
  </div>
  <div class="card-body">
    <form method="post" action="{{ $editar == 1 ? route('editar_user', [ 'user_id' => $user_id ]) : route('criar_user') }}">  
    {{csrf_field()}}
       
      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="name">Nome*</label>
          <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $name }}" placeholder="">
          <small class="erro">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group col-md-4">
          <label for="cpf">CPF*</label>
          <input type="text" class="form-control" name="cpf" id="cpfcnpj" value="{{ old('cpf') ? old('cpf') : $cpf }}" placeholder="">
          <small class="erro">{{ $errors->first('cpf') }}</small>
        </div>        
      </div>

      <div class="form-row">
        <div class="form-group col-md-7">
          <label for="email">E-mail*</label>
          <input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $email }}" placeholder="">
          <small class="erro">{{ $errors->first('email') }}</small>
        </div>

        <div class="form-group col-md-5">
          <label for="setor_id">Setor</label>
          <select name="setor_id" class="form-control">
            @foreach( $setores as $setor )
              <option value="{{ $setor->id }}" {{ $setor_id == $setor->id ? 'selected="selected"' : '' }}>{{ $setor->nome }}</option>
            @endforeach
          </select>
          <small class="erro">{{ $errors->first('setor_id') }}</small>
        </div> 
      </div>  

      <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" name="funcao" value="Coordenador" 
            {{ $funcao == 'Coordenador' ? 'checked="checked"' : '' }}
            {{ session()->get('func') != 'Coordenador' ? 'disabled="disabled"' : '' }}
          >
          <label class="form-check-label" for="funcao">Coordenador</label>
      </div>

      <hr class="my-4">    

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="password">Senha</label>
          <input type="password" class="form-control" name="password" placeholder="">
          <small class="erro">{{ $errors->first('password') }}</small>
        </div>
        
        <div class="form-group col-md-6">
          <label for="password_confirmation">Confirmar senha</label>
          <input type="password" class="form-control" name="password_confirmation" placeholder="">
        </div>
        <p class="text-sm-right">{{ $editar == 1 ? '*Caso não queira alterar a senha basta deixar os campos de senha em branco.' : '' }}</p>

      </div> 
      
      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>
<!-- Fim CardForm -->

@endsection