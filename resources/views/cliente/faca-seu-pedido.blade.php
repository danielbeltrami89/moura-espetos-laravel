
<!doctype html>
<html>

@include('layouts-cliente.header')

  <body>
   
    @include('layouts-cliente.topbar')

    <div class="position-relative overflow-hidden m-md-3 text-center bg-dark">
      <img class="img" src="{{ asset('img/img_admin/banner.png') }}" style="width: 100%">
    </div>
    
    <div class="card-columns px-5">

      @foreach($itens as $item)
      <a href="" class="custom-card"data-toggle="modal"
        data-id="{{ $item->id }}"
        data-title="{{ $item->nome }}"
        data-desc="{{ $item->descricao }}"
        data-img="{{ url("storage/imagem_itens/{$item->imagem}") }}"
        data-target="#itemModal" >
        <div class="card " style="width: auto; display: inline-block">
          <img class="card-img-top" src="{{ url("storage/imagem_itens/{$item->imagem}") }}">
          <div class="card-body">
            <h6>{{ $item->nome }}</h6>
            <small class="card-text">{{ str_limit($item->descricao, $limit = 150, $end = '...') }}</small>
            <h6>R$ {{ $item->valor }}</h6>
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
            <h4 class="modal-title" id="item-title"></h4>
            <p id="item-desc"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <span class="pull-right">
              {!! Form::open(['route' => 'add_pedido']) !!}
              {!! Form::hidden('id', '', ['id' => 'item-id']) !!}
                <button type="submit" class="btn btn-primary">Adicionar ao pedido</button>
              {!! Form::close() !!}
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="msgModal" 
        tabindex="-1" role="dialog" 
        aria-labelledby="msgModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h4 class="modal-title" id="msgModalLabel">Adicionado ao carrinho com sucesso!</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      $(function() {
        $('#itemModal').on("show.bs.modal", function (e) {
            $("#item-title").html($(e.relatedTarget).data('title'));    
            $("#item-desc").html($(e.relatedTarget).data('desc'));
            $('#item-img').attr('src',$(e.relatedTarget).data('img'));
            $("#item-id").val($(e.relatedTarget).data('id'));
        });
    });
    </script>

    @if(!empty(Session::get('msg_return')))
    <script>
    $(function() {
        $('#msgModal').modal('show');
    });
    </script>
    @endif

    @include('layouts-cliente.footer')

  </body>
</html>