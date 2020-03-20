@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $editar == 1 ? 'Editar Item '.$item_id : 'Novo Item' }}</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Dados do item </h6>
  </div>
  <div class="card-body">
    <form method="post" action="{{ $editar == 1 ? route('editar_item', [ 'item_id' => $item_id ]) : route('salvar_item') }}">
    {{ csrf_field() }}

      <div class="form-row">
          <div class="form-group col-md-8">
            <label for="nome">Nome*</label>
            <input type="text" class="form-control" name="nome" list="nome_item" value="{{ old('nome') ? old('nome') : $nome }}" autocomplete="off"/> 
          <small class="erro">{{ $errors->first('nome') }}</small>
        </div> 
        <div class="form-group col-md-4">
          <label for="valor">Valor</label>
          <input type="text" class="form-control" name="valor" value="{{ old('valor') ? old('valor') : $valor }}" pattern="^\$\d{1,3}(.\d{3})*(\,\d+)?$" placeholder="R$ 00,00">
          <small class="erro">{{ $errors->first('valor') }}</small>
        </div>
      </div>

      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" name="descricao" value="{{ old('descricao') ? old('descricao') : $descricao }}" placeholder="">
        <small class="erro">{{ $errors->first('descricao') }}</small>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="tipo_id">Tipo</label>
          <select name="tipo" class="form-control">
            <option value="Marmita"{{ $tipo == "Marmita" ? 'selected="selected"' : '' }}>Marmita</option>
            <option value="Espeto"{{ $tipo == "Espeto" ? 'selected="selected"' : '' }}>Espeto</option>
            <option value="Lanche"{{ $tipo == "Lanche" ? 'selected="selected"' : '' }}>Lanche</option>
          </select>
        </div>
      </div>

      <div class="form-row"></div>

      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>

@endsection