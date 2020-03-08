@extends('layouts.app')

@section('content')
        
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h1 class="h3 text-gray-800 float-left">Itens</h1>
      <a class="btn btn-primary float-right" href="{{ route('novo_item') }}" role="button">Adicionar item</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
              <th>Status</th>
              <th>Setor</th>
              <th>Local</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>Id</th>
              <th>Nome</th>
              <th>Status</th>
              <th>Setor</th>
              <th>Local</th>
              <th>Ações</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($itens as $item)
            <tr>
              <td><a href="{{ route('ver_item', ['item_id' => $item->id ]) }}">{{ $item->id }}</a></td>
              <td>{{ $item->nome }}</td>
              <td>{{ $item->status }}</td>
              <td>{{ $item->setor }}</td>
              <td>{{ $item->local }}</td>
              <td style="text-align:center"> 
                  <a id="moverBtn" href="javascript:;" data-toggle="modal" onclick="moverData({{ $item->id }}, '{{ $item->nome }}', '{{ $item->local_id}}')" data-target="#moverModal"><i class="fas fa-dolly"></i></a>                   
                  <a href="{{ route('ver_item', ['item_id' => $item->id ]) }}"><i class="fas fa-edit mx-2"></i></a>
                  <a href="javascript:;" data-toggle="modal" onclick="deleteData({{ $item->id }})" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Início Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Excluir?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Deseja realmente excluir o item <b><span id="mod-id"></span></b>? Essa ação não pode ser desfeita.</p>
        </div>
        <div class="modal-footer">
          <form action="" id="deleteForm" method="post">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>          
              {{ csrf_field() }}
              {{ method_field('POST') }}
            <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Sim, excluir</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
     function deleteData(id) {
         var id = id;
         var url = '{{ route("deletar_item", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
         document.getElementById("mod-id").innerHTML = id;
     }

     function formSubmit() {
         $("#deleteForm").submit();
     }
  </script>


  <div class="modal fade" id="moverModal" tabindex="-1" role="dialog" aria-labelledby="moverModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Mover item <b><span id="mov_id"></span> - <span id="mov_nome"></span></b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="moverForm" method="post">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="form-group">
              <label for="localOrigem">Local de origem</label>
              <input class="form-control" id="localOrigem" type="text" placeholder="" disabled>
            </div>
            <input type="hidden" id="localOrigemId" >
            
            <div class="form-group">
              <label for="local_id">Local de destino</label>
              <select id="local_id" class="form-control">
                
              </select>
            </div>

            <button type="submit" name="" class="btn btn-primary float-right" data-dismiss="modal" onclick="formSubmitMover()">Mover</button>
          </form>
        </div>
        <div class="modal-footer">
          <small>Ao mover o item ficará registrado no indíce de movimentações, caso queira corrigir a localização do item use a função editar da lista.</small>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
     function moverData(id, nome, local) {
        $('#mov_id').text(id);
        $('#mov_nome').text(nome);

        var locais = [
          @foreach($locais as $local )
          {id: "{{ $local->id }}", nome: "{{ $local->nome }}" },
          @endforeach
        ]

        var localList = document.getElementById("local_id");
        $("#local_id").empty();
        for (i=0; i<locais.length; i++){
          var loc = document.createElement("option");
          loc.value = locais[i].id;
          loc.text = locais[i].nome;
          localList.options.add(loc, i);
          if (locais[i].id == local) {
            $('#localOrigem').val(locais[i].nome); 
            $('#localOrigemId').val(locais[i].id);   
          }          
        }                       
     }

     function formSubmitMover() {
        var item_id = $('#mov_id').text();
        var local_orig_id = $('#localOrigemId').val();
        var local_dest_id = $('#local_id option:selected').val();
        
        var url = '/itens/mover/item_id/local_orig_id/local_dest_id';
        url = url.replace('item_id', item_id);
        url = url.replace('local_orig_id', local_orig_id);
        url = url.replace('local_dest_id', local_dest_id);
        $("#moverForm").attr('action', url);

        $("#moverForm").submit();
     }
  </script>

  
  <!-- Fim Modal -->

@endsection