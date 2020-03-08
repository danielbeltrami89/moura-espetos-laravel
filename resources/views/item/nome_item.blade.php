@extends('layouts.app')

@section('content')
        <!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Nome de Itens</h1>
<p class="mb-4">Crie nome de itens para facilitar o cadastro de itens.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Novo nome de Itens</h6>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('criar_nome_item') }}">
    {{ csrf_field() }}
      <div class="form-row">
        <div class="form-group col-md-12">
            <label for="nome">Nome*</label>
            <div class="input-group">
                <input type="text" class="form-control width100" name="nome" value="" placeholder=""> 
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </div>
            <small class="erro">{{ $errors->first('nome') }}</small>
        </div>         
      </div>
    </form>
  </div>
</div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h1 class="h3 text-gray-800 float-left">Itens</h1>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 10%">Id</th>
              <th>Nome</th>
              <th style="width: 20%">Ações</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
            <th>Id</th>
              <th>Nome</th>
              <th>Ações</th>
            </tr>
          </tfoot>
          <tbody>
          @foreach($nome_itens as $item)
            <tr>
              <td>{{ $item->id }}</a></td>
              <td>{{ $item->nome }}</td>
              <td style="text-align:center"> 
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
         var url = '{{ route("deletar_nome_item", ":id") }}';
         url = url.replace(':id', id);
         $("#deleteForm").attr('action', url);
         document.getElementById("mod-id").innerHTML = id;
     }

     function formSubmit() {
         $("#deleteForm").submit();
     }
  </script>

  <!-- Fim Modal -->

@endsection