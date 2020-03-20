@extends('layouts.app')

@section('content')

  <!-- Início CardTable -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h1 class="h3 text-gray-800 float-left">Pedidos</h1>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTableMove" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Código</th>
              <th>Cliente</th>
              <th>Telefone</th>
              <th>Total</th>
              <th>Status</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Código</th>
              <th>Cliente</th>
              <th>Telefone</th>
              <th>Total</th>
              <th>Status</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($pedidos as $pedido)
            <tr>
              <td><a href="{{ route('ver_pedido', ['pedido_id' => $pedido->id ]) }}">#{{ $pedido->id }}</a></td>
              <td>{{ $pedido->cliente_nome }}</td>
              <td>{{ $pedido->cliente_telefone }}</td>
              <td>{{ $pedido->valor_total }}</td>
              <td>{{ $pedido->status }}</td>
              <td>{{ Carbon\Carbon::parse($pedido->created_at)->sub('3 hours')->format('d/m/Y H:i')	}}</td>
              <td style="text-align:center"> 
                  <a href="{{ route('ver_pedido', ['pedido_id' => $pedido->id ]) }}"><i class="fas fa-edit mx-2"></i></a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Fim CardTable -->

@endsection