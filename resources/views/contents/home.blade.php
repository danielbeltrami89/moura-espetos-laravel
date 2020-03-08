
@extends('layouts.app')

@section('content')


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Painel</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Itens</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $item_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Setores</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $setor_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-university fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Locais</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $local_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Movimentações</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $moves_count }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dolly fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h1 class="h3 text-gray-800 float-left">Útimos itens adicionados</h1>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTableHome" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Status</th>
              <th>Setor</th>
              <th>Local</th>
              <th>Responsável</th>
            </tr>
          </thead>
          <tbody>
          @foreach($itens as $item)
            <tr>
              <td><a href="{{ route('ver_item', ['item_id' => $item->id ]) }}">{{ $item->id }}</a></td>
              <td>{{ $item->nome }}</td>
              <td>{{ $item->status }}</td>
              <td>{{ $item->setor }}</td>
              <td>{{ $item->local }}</td>
              <td>{{ $item->user }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Início CardTable -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h1 class="h3 text-gray-800 float-left">Útimas movimentações</h1>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTableHome" width="100%" cellspacing="0">
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

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Desenvolvimento</h6>
                </div>
                <div class="card-body">
                    <p>Desenvolvido em Laravel pela TI do LABO. Versão 1.1.6</p>
                </div>
            </div>
        </div>
    </div>

@endsection