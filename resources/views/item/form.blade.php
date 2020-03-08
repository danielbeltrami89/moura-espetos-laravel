@extends('layouts.app')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $editar == 1 ? 'Editar Item '.$item_id : 'Novo Item' }}</h1>
<p class="mb-4">Veja ou edite um item do inventário. O usuário que está efetuando a edição ou inserção será o responsável.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Dados do item </h6>
  </div>
  <div class="card-body">
    <form method="post" action="{{ $editar == 1 ? route('editar_item', [ 'item_id' => $item_id ]) : route('criar_item') }}">
    {{ csrf_field() }}
      <input type="hidden" name="user_id" value="{{ $user_id }}">
      <input type="hidden" name="fornecedor_id" value="1">

      <div class="form-row">
          <div class="form-group col-md-6">
            <datalist id="nome_item" name="nome_item"> 
              @foreach( $nomes_array as $nomes )
                <option value="{{ $nomes->nome }}" >{{ $nomes->nome }}</option>
              @endforeach
            </datalist>
            <label for="nome">Nome*</label>
            <input type="text" class="form-control" name="nome" list="nome_item" value="{{ old('nome') ? old('nome') : $nome }}" autocomplete="off"/> 
          
          <!-- <input type="text" class="form-control" name="nome" value="{{ old('nome') ? old('nome') : $nome }}" placeholder=""> -->
          <small class="erro">{{ $errors->first('nome') }}</small>
        </div>
        <div class="form-group col-md-6">
          <label for="cod_patrimonio">Código do patrimônio*</label>
          <input type="text" class="form-control" name="cod_patrimonio" value="{{ old('cod_patrimonio') ? old('cod_patrimonio') : $cod_patrimonio }}" placeholder="">
          <small class="erro">{{ $errors->first('cod_patrimonio') }}</small>
        </div>    
      </div>

      <div class="form-group">
        <label for="descricao">Descrição</label>
        <input type="text" class="form-control" name="descricao" value="{{ old('descricao') ? old('descricao') : $descricao }}" placeholder="">
        <small class="erro">{{ $errors->first('descricao') }}</small>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="valor">Valor patrimonial*</label>
          <input type="text" class="form-control" name="valor" value="{{ old('valor') ? old('valor') : $valor }}" pattern="^\$\d{1,3}(.\d{3})*(\,\d+)?$" value="" data-type="currency" placeholder="R$ 0,000.00">
          <small class="erro">{{ $errors->first('valor') }}</small>
        </div>
        <div class="form-group col-md-4">
          <label for="entrada">Data da compra</label>
          <input type="date" class="form-control" name="entrada" value="{{ old('entrada') ? old('entrada') : $entrada }}" placeholder="00/00/000">
          <small class="erro">{{ $errors->first('entrada') }}</small>
        </div>  
        <div class="form-group col-md-4">
          <label for="nota">Nota fiscal</label>
          <input type="text" class="form-control" name="nota" value="{{ old('nota') ? old('nota') : $nota }}" placeholder="">
          <small class="erro">{{ $errors->first('nota') }}</small>
        </div>  
      </div>

      <div class="form-row">

        <div class="form-group col-md-6">
          <label for="status_id">Status</label> <a href="{{ route('criar_status_item') }}"><i class="fas fa-plus-circle" title="Novo Status"></i></a>
          <select name="status_id" class="form-control">
            @foreach( $status_array as $stat )
              <option value="{{ $stat->id }}" {{ $status_id == $stat->id ? 'selected="selected"' : '' }}>{{ $stat->nome }}</option>
            @endforeach
          </select>
        </div>   

        <div class="form-group col-md-6">
          <label for="tipo_id">Tipo</label> <a href="{{ route('criar_tipo_item') }}"><i class="fas fa-plus-circle" title="Novo Tipo"></i></a>
          <select name="tipo_id" class="form-control">
          @foreach( $tipos_array as $tipos )
              <option value="{{ $tipos->id }}" {{ $tipo_id == $tipos->id ? 'selected="selected"' : '' }}>{{ $tipos->nome }}</option>
            @endforeach
          </select>
        </div>

        
      </div>


      <div class="form-row">

      <div class="form-group col-md-4">
          <label for="setor_id">Setor</label> <a href="{{ route('novo_setor') }}"><i class="fas fa-plus-circle" title="Novo Setor"></i></a>
          <select name="setor_id" class="form-control">
            @foreach( $setores as $setor )
              <option value="{{ $setor->id }}" {{ $setor_id == $setor->id ? 'selected="selected"' : '' }}>{{ $setor->nome }}</option>
            @endforeach
          </select>
          <small class="erro">{{ $errors->first('setor_id') }}</small>
        </div>

        <div class="form-group col-md-4">
          <label for="local_id">Local</label> <a href="{{ route('novo_local') }}"><i class="fas fa-plus-circle" title="Novo Local"></i></a>
          <select name="local_id" class="form-control">
            @foreach( $locais as $local )
              <option value="{{ $local->id }}" {{ $local_id == $local->id ? 'selected="selected"' : '' }}>{{ $local->nome }}</option>
            @endforeach
          </select>
          <small class="erro">{{ $errors->first('local_id') }}</small>
        </div>
        
        <div class="form-group col-md-4">
          <label for="fornecedor_id">Fornecedor</label> <a href="{{ route('novo_fornecedor') }}"><i class="fas fa-plus-circle" title="Novo fornecedor"></i></a>
          <select name="fornecedor_id" class="form-control">
            @foreach( $fornecedores as $fornecedor )
              <option value="{{ $fornecedor->id }}" {{ $fornecedor_id == $fornecedor->id ? 'selected="selected"' : '' }}>{{ $fornecedor->razao }}</option>
            @endforeach
          </select>
          <small class="erro">{{ $errors->first('fornecedor_id') }}</small>
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>

@endsection