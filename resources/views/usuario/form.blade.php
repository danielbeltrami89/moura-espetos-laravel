@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $editar == 1 ? 'Editar Usuário ' : 'Novo Usuário' }}</h1>

<!-- Início CardForm -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary float-left">Dados do usuário</h6>
    <h6 class="m-0 text-primary float-right">Tipo: {{ $tipo }}</h6>

  </div>
  <div class="card-body">
    <form method="post" action="{{ $editar == 1 ? route('editar_user', [ 'user_id' => $user_id ]) : route('novo_user') }}">  
    {{csrf_field()}}
       
    <input type="hidden" class="form-control" name="tipo" value="{{ $tipo }}">

      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="name">Nome*</label>
          <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $name }}" placeholder="">
          <small class="erro">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group col-md-4">
          <label for="cpf">CPF</label>
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
          <label for="telefone">Telefone*</label>
          <input type="text" class="form-control" name="telefone" value="{{ old('telefone') ? old('telefone') : $telefone }}" placeholder="">
          <small class="erro">{{ $errors->first('telefone') }}</small>
        </div> 
      </div>  

      <div class="form-row">
      <div class="form-group col-md-3">
          <label for="cep">CEP*</label>
          <input type="text" class="form-control" name="cep" value="{{ old('cep') ? old('cep') : $cep }}" placeholder="">
          <small class="erro">{{ $errors->first('cep') }}</small>
        </div>
        <div class="form-group col-md-7">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" name="endereco" value="{{ old('endereco') ? old('endereco') : $endereco }}" placeholder="">
          <small class="erro">{{ $errors->first('endereco') }}</small>
        </div>
        <div class="form-group col-md-2">
          <label for="numero">Número</label>
          <input type="text" class="form-control" name="numero" value="{{ old('numero') ? old('numero') : $numero }}" placeholder="">
          <small class="erro">{{ $errors->first('numero') }}</small>
        </div>
      </div>  

      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="complemento">Complemento</label>
          <input type="text" class="form-control" name="complemento" value="{{ old('complemento') ? old('complemento') : $complemento }}" placeholder="">
          <small class="erro">{{ $errors->first('complemento') }}</small>
        </div>
      </div> 

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" name="bairro" value="{{ old('bairro') ? old('bairro') : $bairro }}" placeholder="">
          <small class="erro">{{ $errors->first('bairro') }}</small>
        </div>
        <div class="form-group col-md-3">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" name="cidade" value="{{ old('cidade') ? old('cidade') : $cidade }}" placeholder="">
          <small class="erro">{{ $errors->first('cidade') }}</small>
        </div>
        <div class="form-group col-md-3">
          <label for="uf">Estado</label>
          <input type="text" class="form-control" name="uf" value="{{ old('uf') ? old('uf') : $uf }}" placeholder="">
          <small class="erro">{{ $errors->first('uf') }}</small>
        </div>
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