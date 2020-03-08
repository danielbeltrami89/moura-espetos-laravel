@extends('layouts.app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">{{ $editar == 1 ? 'Editar Fornecedor '.$fornecedor_id : 'Novo Fornecedor' }}</h1>
<p class="mb-4">Veja ou edite um fornecedor. </p>

<!-- Início CardForm -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Dados do fornecedor</h6>
  </div>
  <div class="card-body">
    <form method="post" action="{{ $editar == 1 ? route('editar_fornecedor', [ 'fornecedor_id' => $fornecedor_id ]) : route('criar_fornecedor') }}">  
    {{csrf_field()}}
       
      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="cnpj">CNPJ/CPF*</label>
          <input type="text" class="form-control" name="cnpj" id="cpfcnpj" value="{{ old('cnpj') ? old('cnpj') : $cnpj }}" placeholder="">
          <small class="erro">{{ $errors->first('cnpj') }}</small>
        </div>
        <div class="form-group col-md-4">
          <label for="telefone">Telefone</label>
          <input type="text" class="form-control" name="telefone" value="{{ old('telefone') ? old('telefone') : $telefone }}" placeholder="">
          <small class="erro">{{ $errors->first('telefone') }}</small>
        </div>
      </div>

      <div class="form-group">
        <label for="razao">Razão social*</label>
        <input type="text" class="form-control" name="razao" value="{{ old('razao') ? old('razao') : $razao }}" placeholder="">
        <small class="erro">{{ $errors->first('razao') }}</small>
      </div> 

      <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
</div>
<!-- Fim CardForm -->

@endsection