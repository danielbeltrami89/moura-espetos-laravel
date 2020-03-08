@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $editar == 1 ? 'Editar setor '.$setor_id : 'Novo setor' }}</h1>
<p class="mb-4">Veja ou edite um setor. </p>

<!-- Início CardForm -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Dados do setor</h6>
  </div>
  <div class="card-body">
    <form method="post" action="{{ $editar == 1 ? route('editar_setor', [ 'setor_id' => $setor_id ]) : route('criar_setor') }}">  
    {{csrf_field()}}
      <div class="form-group">
        <label for="nome">Nome*</label>
        <input type="text" class="form-control" name="nome" value="{{ old('nome') ? old('nome') : $nome }}" placeholder="">
        <small class="erro">{{ $errors->first('nome') }}</small>
      </div>  
    
      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" name="descricao" value="{{ old('descricao') ? old('descricao') : $descricao }}" placeholder="">
        <small class="erro">{{ $errors->first('descricao') }}</small>
      </div>
      
      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>
<!-- Fim CardForm -->

@endsection