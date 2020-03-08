@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $editar == 1 ? 'Editar Local '.$local_id : 'Novo Local' }}</h1>
<p class="mb-4">Veja ou edite um local de inventário. </p>

<!-- Início CardForm -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Dados do local</h6>
  </div>
  <div class="card-body">
    <form method="post" action="{{ $editar == 1 ? route('editar_local', [ 'local_id' => $local_id ]) : route('criar_local') }}">  
    {{csrf_field()}}
      <div class="form-group">
        <label for="nome">Nome*</label>
        <input type="text" class="form-control" name="nome" value="{{ old('nome') ? old('nome') : $nome }}" placeholder="Nome de identificação do local">
        <small class="erro">{{ $errors->first('nome') }}</small>
      </div>  
      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="endereco">Endereço</label>
          <input type="text" class="form-control" name="endereco" value="{{ old('endereco') ? old('endereco') : $endereco }}" placeholder="Ex.: Rua do Meio">
          <small class="erro">{{ $errors->first('endereco') }}</small>
        </div>
        <div class="form-group col-md-4">
          <label for="numero">Número</label>
          <input type="text" class="form-control" name="numero" value="{{ old('numero') ? old('numero') : $numero }}" placeholder="Ex.: 1029">
          <small class="erro">{{ $errors->first('numero') }}</small>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="bairro">Bairro</label>
          <input type="text" class="form-control" name="bairro" value="{{ old('bairro') ? old('bairro') : $bairro }}" placeholder="Ex.: Centro">
          <small class="erro">{{ $errors->first('bairro') }}</small>
        </div>
        <div class="form-group col-md-3">
          <label for="cidade">Cidade</label>
          <input type="text" class="form-control" name="cidade" value="{{ old('cidade') ? old('cidade') : $cidade }}" placeholder="Ex.: Poções">
          <small class="erro">{{ $errors->first('cidade') }}</small>
        </div>  
        <div class="form-group col-md-2">
        <label for="estado">Estado</label>
          <select name="estado" class="form-control">
            <option selected>BA</option>
            <option>MG</option>
            <option>SP</option>
          </select>
          <small class="erro">{{ $errors->first('estado') }}</small>
        </div> 
        <div class="form-group col-md-3">
          <label for="cep">CEP</label>
          <input type="text" class="form-control" name="cep" value="{{ old('cep') ? old('cep') : $cep }}" placeholder="xxxxx-xxx *digite também o hífem">
          <small class="erro">{{ $errors->first('cep') }}</small>
        </div>   
      </div>

      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>
<!-- Fim CardForm -->

@endsection