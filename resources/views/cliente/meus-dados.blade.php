@extends('layouts-cliente.app-simples')

@section('content')

  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">

              <!-- Início CardForm -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                 <p class="h4 text-gray-800 text-center mt-2">Meus dados</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{ route('editar_cliente', [ 'user_id' => $user_id ]) }}">  
                  {{csrf_field()}}
                    
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="name">Nome*</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $name }}" >
                        <small class="erro">{{ $errors->first('name') }}</small>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpfcnpj" value="{{ old('cpf') ? old('cpf') : $cpf }}" >
                        <small class="erro">{{ $errors->first('cpf') }}</small>
                      </div>        
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-7">
                        <label for="email">E-mail*</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $email }}" autocomplete="off">
                        <small class="erro">{{ $errors->first('email') }}</small>
                      </div>

                      <div class="form-group col-md-5">
                        <label for="telefone">Telefone*</label>
                        <input type="text" class="form-control" name="telefone" value="{{ old('telefone') ? old('telefone') : $telefone }}" >
                        <small class="erro">{{ $errors->first('telefone') }}</small>
                      </div> 
                    </div>  

                    <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="cep">CEP*</label>
                        <input type="text" class="form-control" name="cep" value="{{ old('cep') ? old('cep') : $cep }}" >
                        <small class="erro">{{ $errors->first('cep') }}</small>
                      </div>
                      <div class="form-group col-md-7">
                        <label for="endereco">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="{{ old('endereco') ? old('endereco') : $endereco }}" >
                        <small class="erro">{{ $errors->first('endereco') }}</small>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="numero">Número</label>
                        <input type="text" class="form-control" name="numero" value="{{ old('numero') ? old('numero') : $numero }}" >
                        <small class="erro">{{ $errors->first('numero') }}</small>
                      </div>
                    </div>  

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" name="complemento" value="{{ old('complemento') ? old('complemento') : $complemento }}" >
                        <small class="erro">{{ $errors->first('complemento') }}</small>
                      </div>
                    </div> 

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" name="bairro" value="{{ old('bairro') ? old('bairro') : $bairro }}" >
                        <small class="erro">{{ $errors->first('bairro') }}</small>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" value="{{ old('cidade') ? old('cidade') : $cidade }}" >
                        <small class="erro">{{ $errors->first('cidade') }}</small>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="uf">Estado</label>
                        <input type="text" class="form-control" name="uf" value="{{ old('uf') ? old('uf') : $uf }}" >
                        <small class="erro">{{ $errors->first('uf') }}</small>
                      </div>
                    </div>   

                    <hr class="my-4">    

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" autocomplete="off">
                        <small class="erro">{{ $errors->first('password') }}</small>
                      </div>
                      
                      <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirmar senha</label>
                        <input type="password" class="form-control" name="password_confirmation" >
                      </div>
                      <p class="text-sm-right">*Caso não queira alterar a senha basta deixar os campos de senha em branco.</p>

                    </div> 
                    
                    <button type="submit" class="btn btn-primary float-right px-5">Salvar</button>
                  </form>
                </div>
              </div>
              <!-- Fim CardForm -->
            </div>
        </div>
    </div>
  </main>

@endsection
