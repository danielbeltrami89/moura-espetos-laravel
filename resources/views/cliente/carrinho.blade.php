@extends('layouts-cliente.app-simples')

@section('content')
  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 my-5">
                <div class="card">
                    <div class="card-header">
                    <p class="h4 text-gray-800 text-center mt-2">Carrinho</p>
                    </div>

                    <div class="card-body">
                      <div class="form-row" style="overflow-x:auto;">
                       <table id="cart" class="table table-hover table-condensed mb-0">
                            <thead>
                            <tr>
                                <th style="width:5%">Id</th>
                                <th style="width:50%">Produto</th>
                                <th style="width:15%">Valor</th>
                                <th style="width:10%">Qnt</th>
                                <th style="width:15%" class="text-center">Sub-total</th>
                                <th style="width:5%"></th>
                            </tr>
                            </thead>
                            <tbody>
                    
                            <?php $total = 0 ?>
                    
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                    
                                    <?php $total += $details['valor'] * $details['qnt'] ?>
                    
                                    <tr>    
                                        <td data-th="Id">
                                            <input hidden value="{{ $id }}" class="form-control id" />
                                            {{ $id }}
                                        </td>
                                        <td data-th="Product">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <h6 class="nomargin">{{ $details['nome'] }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">R$ {{ $details['valor'] }}</td>
                                        <td data-th="Quantity">
                                            <input type="number" value="{{ $details['qnt'] }}" class="form-control qnt" />
                                        </td>
                                        <td data-th="Subtotal" class="text-center">R$ {{ $details['valor'] * $details['qnt'] }}</td>
                                        <td class="actions" data-th="">
                                            <!-- <button class="btn btn-info btn-sm update-cart" data-id="{{-- $id --}}"><i class="fas fa-sync-alt"></i></button> -->
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
                                    <td colspan="4" class="hidden-xs text-right">Frete</br><strong>Total + frete</strong></td>
                                    <td colspan="2" class="hidden-xs text-right">R$ 5.00</br><strong>R$ {{ $total + 5 }}</strong></td>
                                </tr>

                                <tr>
                                    <td colspan="3">
                                        <a href="{{ url('/faca-seu-pedido') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue comprando</a>
                                    </td>
                                    <td colspan="3">
                                        <a href="{{ route('fazer_pedido') }}" class="btn btn-primary float-right"> Confirmar pedido <i class="fa fa-angle-right"></i></a>
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

    $(".qnt").change(function(e) {
        e.preventDefault();
        var ele = $(this);

        $.ajax({
            url: '{{ url('update-cart') }}',
            method: "patch",
            data: {_token: '{{ csrf_token() }}', id: ele.parents("tr").find(".id").val(), qnt: ele.parents("tr").find(".qnt").val()},
            success: function (response) {
                window.location.reload();
            }
        });
    });
        // $(".update-cart").click(function (e) {
        //     e.preventDefault();

        //     var ele = $(this);

        //     $.ajax({
        //         url: '{{ url('update-cart') }}',
        //         method: "patch",
        //         data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), qnt: ele.parents("tr").find(".qnt").val()},
        //         success: function (response) {
        //             window.location.reload();
        //         }
        //     });
        // });

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