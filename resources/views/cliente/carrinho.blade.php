@extends('layouts-cliente.app-simples')

@section('content')
  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">
                    <p class="h4 text-gray-800 text-center mt-2">Carrinho</p>
                    </div>

                    <div class="card-body">
                      <div class="form-row justify-content-md-center">
                       <table id="cart" class="table table-hover table-condensed">
                            <thead>
                            <tr>
                                <th style="width:50%">Produto</th>
                                <th style="width:10%">Valor</th>
                                <th style="width:8%">Quantidade</th>
                                <th style="width:22%" class="text-center">Sub-total</th>
                                <th style="width:10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                    
                            <?php $total = 0 ?>
                    
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                    
                                    <?php $total += $details['valor'] * $details['qnt'] ?>
                    
                                    <tr>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <h5 class="nomargin">{{ $details['nome'] }}</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">R$ {{ $details['valor'] }}</td>
                                        <td data-th="Quantity">
                                            <input type="number" value="{{ $details['qnt'] }}" class="form-control qnt" />
                                        </td>
                                        <td data-th="Subtotal" class="text-center">R${{ $details['valor'] * $details['qnt'] }}</td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}"><i class="fas fa-sync-alt"></i></button>
                                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                    
                            </tbody>
                            <tfoot>
                            <tr class="visible-xs">
                            </tr>
                            <tr>
                                <td><a href="{{ url('/faca-seu-pedido') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue comprando</a></td>
                                <td colspan="2" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>Total R${{ $total }}</strong></td>
                                <td>
                                    <a href="{{ route('fazer_pedido') }}" class="btn btn-primary"> Finalizar compra</a>
                                </td>

                            </tr>
                            </tfoot>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>

  <script type="text/javascript">
        $(".update-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), qnt: ele.parents("tr").find(".qnt").val()},
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Remover item?")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>
@endsection