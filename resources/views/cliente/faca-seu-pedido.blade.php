@extends('layouts-cliente.app')

@section('content')

    <div class="position-relative overflow-hidden m-md-3 text-center bg-dark">
      <img class="img" src="{{ asset('img/img_admin/banner-produtos.png') }}" style="width: 100%">
    </div>
    
    <div class="card-columns px-5">

      @foreach($itens as $item)
      <a href="" class="custom-card" 
        data-toggle="modal"
        data-id="{{ $item->id }}"
        data-title="{{ $item->nome }}"
        data-desc="{{ $item->descricao }}"
        data-valor="R$ {{ $item->valor }}"
        data-img="{{ url("storage/imagem_itens/{$item->imagem}") }}"
        data-target="#itemModal" >
        <div class="card " style="width: auto; display: inline-block">
          <img class="card-img-top" src="{{ url("storage/imagem_itens/{$item->imagem}") }}">
          <div class="card-body">
            <h5 class="card-title">R$ {{ $item->valor }}</h5>
            <hr>
            <!-- <p class="text-muted">{{-- str_limit($item->descricao, $limit = 50, $end = '...') --}}</p></br> -->
            <div style="height:40px">
              <h6 class="card-text">{{ str_limit($item->nome, $limit = 50, $end = '...') }}</h6>
            </div>
          </div>
        </div>
      </a>
      @endforeach

      </div>

      <div class="modal fade" id="itemModal" 
        tabindex="-1" role="dialog" 
        aria-labelledby="itemModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <img  id="item-img" class="img" src="" style="width: 100%">
          <div class="modal-body">
            <h3 class="modal-title" id="item-valor"></h3>
            <h4 class="modal-title" id="item-title"></h4>
            <p id="item-desc"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <span class="pull-right">
              {!! Form::open(['route' => 'add-cart']) !!}
              {!! Form::hidden('id', '', ['id' => 'item-id']) !!}
                <button type="submit" class="btn btn-primary">Adicionar ao pedido</button>
              {!! Form::close() !!}
            </span>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $(function() {
        $('#itemModal').on("show.bs.modal", function (e) {
            $("#item-title").html($(e.relatedTarget).data('title'));    
            $("#item-desc").html($(e.relatedTarget).data('desc'));
            $("#item-valor").html($(e.relatedTarget).data('valor'));
            $('#item-img').attr('src',$(e.relatedTarget).data('img'));
            $("#item-id").val($(e.relatedTarget).data('id'));
        });
    });
    </script>

    @endsection