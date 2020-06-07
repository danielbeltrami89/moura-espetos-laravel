@extends('layouts-cliente.app-simples')

@section('content')

  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">
                    <p class="h4 text-gray-800 text-center mt-2">Meus pedidos</p>
                    </div>

                    <div class="card-body">
                      <div class="form-row justify-content-md-center">
                        <table class="table col-md-11">
                          <thead>
                            <tr>
                              <th scope="col">N• Pedido</th>
                              <th scope="col">Status</th>
                              <th scope="col" class="text-right">Valor</th>     
                               <th scope="col"></th>

                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pedidos as $pedido)
                            <tr>
                              <th scope="row">{{ $pedido->id }}</th>
                              <td>{{ $pedido->status }}</td>
                              <td class="text-right">R$ {{ $pedido->valor_total }}</td>
                              <td>                                            
                                <a class="btn btn-primary float-right btn-sm" href="{{ route('pedido-cliente', ['cliente_id' => session()->get('id'), 'pedido_id' => $pedido->id ]) }}">Ver pedido</a>
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  
@endsection