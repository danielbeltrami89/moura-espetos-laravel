@extends('layouts.app')

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Pedido #{{ $pedido[0]->id }}</h4>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('editar_pedido', [ 'pedido_id' => $pedido[0]->id ]) }}">
    {{ csrf_field() }}

      <div class="form-row justify-content-md-center">
       <p></br></p>
      </div>

      <div class="form-row justify-content-md-center">
        <div class="form-group col-md-7">
          <h5><b>{{ $pedido[0]->cliente_nome }}</b></h5>
        </div> 

        <div class="form-group col-md-2">
          <h6>{{ $pedido[0]->cliente_telefone }}</h6>
        </div>

        <div class="form-group col-md-2">
          <select name="status" class="form-control">
            <option value="Novo"{{ $pedido[0]->status == "Novo" ? 'selected="selected"' : '' }}>Novo</option>    
            <option value="Aguardando pagamento"{{ $pedido[0]->status == "Aguardando pagamento" ? 'selected="selected"' : '' }}>Aguardando pagamento</option>
            <option value="Preparando"{{ $pedido[0]->status == "Preparando" ? 'selected="selected"' : '' }}>Preparando</option>
            <option value="Pronto"{{ $pedido[0]->status == "Pronto" ? 'selected="selected"' : '' }}>Pronto</option>
            <option value="Entregue"{{ $pedido[0]->status == "Entregue" ? 'selected="selected"' : '' }}>Entregue</option>
            <option value="Finalizado"{{ $pedido[0]->status == "Finalizado" ? 'selected="selected"' : '' }}>Finalizado</option>
            <option value="Cancelado"{{ $pedido[0]->status == "Cancelado" ? 'selected="selected"' : '' }}>Cancelado</option>
          </select>
        </div>
      </div>

      <div class="form-row justify-content-md-center">
        <div class="form-group col-md-11">
          <p>{{ $pedido[0]->cliente_endereco }}</p>
        </div>
      </div>

      <div class="form-row justify-content-md-center">
        <table class="table col-md-11">
          <thead>
            <tr>
              <th scope="col">Qnt</th>
              <th scope="col">Menu</th>
              <th scope="col" class="text-right">Preço</th>
            </tr>
          </thead>
          <tbody>
          @foreach($itens_pedido as $itens)
            <tr>
              <th scope="row">1</th>
              <td>{{ $itens->item_nome }}</td>
              <td class="text-right">R$ {{ $itens->item_valor }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
      
      <div class="form-row justify-content-md-center">
        <div class="form-group col-md-9">
        </div> 

        <div class="form-group col-md-2">
          <div class="float-right"><h5>Total: <b>{{ $pedido[0]->valor_total }}</b></h5></div>
        </div>
      </div>

      <div class="form-row justify-content-md-center">
        <div class="form-group col-md-11">
          <p></br></p>
          <button type="submit" class="btn btn-primary float-right">Salvar</button>
        </div>
      </div>
     
    </form>
  </div>
</div>

@endsection