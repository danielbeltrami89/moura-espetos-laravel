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
    <form method="post" action="{{ $editar == 1 ? route('editar_item', [ 'item_id' => $item_id ]) : route('salvar_item') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="row">
      <div class="col-md-6">
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
          <textarea class="form-control" name="descricao" rows="7" >{{ old('descricao') ? old('descricao') : $descricao }}</textarea>
          <small class="erro">{{ $errors->first('descricao') }}</small>
        </div>

        <div class="form-row">
          <div class="form-group col">
            <label for="tipo_id">Tipo</label>
            <select name="tipo" class="form-control">
              <option value="Marmita"{{ $tipo == "Marmita" ? 'selected="selected"' : '' }}>Marmita</option>
              <option value="Espeto"{{ $tipo == "Espeto" ? 'selected="selected"' : '' }}>Espeto</option>
              <option value="Lanche"{{ $tipo == "Lanche" ? 'selected="selected"' : '' }}>Lanche</option>
            </select>
          </div>
        </div>

      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="imagem">Imagem do menu</label><br>
          <img class="img w-100" 
            src="{{ $imagem ? url("storage/imagem_itens/{$imagem}") : url("storage/imagem_itens/no-image.png") }}" 
          ><br><br>
          <input type="file" name="image" class="form-control">
        </div>
      </div>

    </div>
    
    <div class="row">
      <div class="col">
        <button type="submit" class="btn btn-primary float-right px-5 mt-3">Salvar</button>
      </div>
    </div>
    
    </form>
  </div>
</div>

@endsection