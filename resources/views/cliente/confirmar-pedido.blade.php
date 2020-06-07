@extends('layouts-cliente.app-simples')

@section('content')

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 my-5">
                <div class="card">
                    <div class="card-header">
                    <p class="h4 text-gray-800 text-center mt-2">Confirme seu pedido</p> 
                    </div>

                    <div class="card-body">
                    <form method="post" action="{{ route('editar_pedido', [ 'pedido_id' => $pedido[0]->id ]) }}">
                    {{ csrf_field() }}

                      <div class="form-row justify-content-md-center">
                        <div class="form-group col-md-11">
                          <h6 class="float-right">Status do pedido: <strong>{{ $pedido[0]->status }}</strong></h6>
                        </div>
                      </div>

                      <div class="form-row justify-content-md-center">
                        <div class="form-group col-md-11">
                          <h5>Nome: <strong>{{ $pedido[0]->cliente_nome }}</strong></h5>
                        </div> 
                      </div>

                      <div class="form-row justify-content-md-center">
                        <div class="form-group col-md-11">
                          <h6>Seu telefone: <strong>{{ $pedido[0]->cliente_telefone }}</strong></h6>
                        </div>
                      </div>

                      <div class="form-row justify-content-md-center">
                        <div class="form-group col-md-11">
                          <p>Endereço entrega: <strong>{{ $pedido[0]->cliente_endereco }}, {{ $pedido[0]->cliente_endereco_n }} - {{ $pedido[0]->cliente_endereco_b }}, {{ $pedido[0]->cliente_endereco_c }}</strong></p>
                        </div>
                      </div>
                      <div class="form-row justify-content-md-center">
                        <div class="form-group col-md-11">
                          <p>Complemento: <strong>{{ $pedido[0]->cliente_endereco_c }}</strong></p>
                        </div>
                      </div>

                      <div class="form-row justify-content-md-center">
                        <table class="table col-md-11">
                          <thead>
                            <tr>
                              <th scope="col">Menu</th>
                              <th scope="col" class="text-right">Preço</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($itens_pedido as $itens)
                            <tr>
                              <td>{{ $itens->item_nome }}</td>
                              <td class="text-right">R$ {{ $itens->item_valor }}</td>
                            </tr>
                          @endforeach
                          </tbody>
                        </table>
                      </div>
                      
                      <div class="form-row justify-content-md-center">
                        <div class="form-group col-md-11">
                          <div class="float-right"><h6>Frete: R$ <strong>5.00</strong></h6></div>
                        </div>
                      </div>
                      
                      <div class="form-row justify-content-md-center">
                        <div class="form-group col-md-11">
                          <div class="float-right"><h5>Total + frete: R$ <strong>{{ $pedido[0]->valor_total + 5 }}</strong></h5></div>
                        </div>
                      </div>
                    
                    </form>

                    <div class="form-row justify-content-md-center">
                      <div class="form-group col-md-5">
                        <a href="{{ url('/faca-seu-pedido/carrinho') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Voltar ao carrinho</a>
                      </div>

                      <div class="form-group col-md-4"></div>

                      <div class="form-group col-md-2">
                        <form action="/processar_pagamento" method="POST">
                          <script
                          src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                          data-preference-id="{{ $preference->id }}">
                          </script>
                        </form>
                      </div>
                    </div>
                  </div>
                    
                </div>
                <div class="form-row justify-content-md-center">
                  <div class="form-group col-md-11">
                      <small>*caso queira atualizar ou adicionar alguma informação, edite seus dados em "Meus dados"</small>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </main>


 
@endsection