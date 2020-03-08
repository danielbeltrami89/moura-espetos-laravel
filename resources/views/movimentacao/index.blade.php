@extends('layouts.app')

@section('content')

  <!-- Início CardTable -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h1 class="h3 text-gray-800 float-left">Movimentações</h1>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTableMove" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Item</th>
              <th>Origem</th>
              <th>Destino</th>
              <th>Ocorrência</th>
              <th>Responsável</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Id</th>
              <th>Item</th>
              <th>Origem</th>
              <th>Destino</th>
              <th>Ocorrência</th>
              <th>Responsável</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($movimentacoes as $movimentacao)
            <tr>
              <td>{{ $movimentacao->id }}</td>
              <td>{{ $movimentacao->item }}</td>
              <td>{{ $movimentacao->local_orig }}</td>
              <td>{{ $movimentacao->local_dest }}</td>
              <td>{{ Carbon\Carbon::parse($movimentacao->created_at)->sub('3 hours')->format('d/m/Y H:i')	}}</td>
              <td>{{ $movimentacao->responsavel }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- Fim CardTable -->

@endsection