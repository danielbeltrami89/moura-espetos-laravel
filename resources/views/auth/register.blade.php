<!doctype html>
<html lang="en" class="h-100">

  @include('layouts-cliente.header')

    <script type="text/javascript">
        
    </script>

  <body class="d-flex flex-column h-100">
    
  @include('layouts-cliente.topbar')

  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">
                    <p class="h4 text-gray-800 text-center mt-2">Cadastro</p>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nome -->
                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">Nome*</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-right">E-mail*</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- CPF -->
                            <!-- <div class="form-group row">
                                <label for="cpf" class="col-md-3 col-form-label text-md-right">CPF</label>

                                <div class="col-md-7">
                                    <input id="cpf" type="text" class="form-control {{-- @error('cpf') is-invalid @enderror --}}"
                                        name="cpf" value="{{-- old('cpf') --}}" required autocomplete="cpf" maxlength="14" 
                                        onkeydown="javascript: fMasc( this, mCPF );"
                                     >

                                    {{-- @error('cpf') --}}
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{-- $message --}}</strong>
                                        </span>
                                    {{-- @enderror --}}
                                </div>
                            </div> -->
                            
                            <!-- Telefone -->
                            <div class="form-group row">
                                <label for="telefone" class="col-md-3 col-form-label text-md-right">Telefone*</label>

                                <div class="col-md-7">
                                    <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror" 
                                    name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone" maxlength="14" 
                                        onkeydown="javascript: fMasc( this, mTel );">

                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr></hr>

                            <!-- CEP -->
                            <div class="form-group row">
                                <label for="cep" class="col-md-3 col-form-label text-md-right">CEP*</label>

                                <div class="col-md-7">
                                    <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror" 
                                    name="cep" value="{{ old('cep') }}" required autocomplete="cep" maxlength="9">

                                    @error('cep')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Endereco -->
                            <div class="form-group row">
                                <label for="endereco" class="col-md-3 col-form-label text-md-right">Endereço</label>

                                <div class="col-md-7">
                                    <input id="endereco" type="endereco" class="form-control @error('endereco') is-invalid @enderror" name="endereco" value="{{ old('endereco') }}" required autocomplete="endereco">

                                    @error('endereco')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Numero -->
                            <div class="form-group row">
                                <label for="numero" class="col-md-3 col-form-label text-md-right">Número</label>

                                <div class="col-md-7">
                                    <input id="numero" type="numero" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero">

                                    @error('numero')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Complemteno -->
                            <div class="form-group row">
                                <label for="complemento" class="col-md-3 col-form-label text-md-right">Complemento</label>

                                <div class="col-md-7">
                                    <input id="complemento" type="complemento" class="form-control @error('complemento') is-invalid @enderror" name="complemento" value="{{ old('complemento') }}" autocomplete="complemento">

                                    @error('complemento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Bairro -->
                            <div class="form-group row">
                                <label for="bairro" class="col-md-3 col-form-label text-md-right">Bairro</label>

                                <div class="col-md-7">
                                    <input id="bairro" type="bairro" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{ old('bairro') }}" required autocomplete="bairro">

                                    @error('bairro')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Cidade e estado -->
                            <div class="form-group row">
                                <label for="cidade" class="col-md-3 col-form-label text-md-right">Cidade</label>

                                <div class="col-md-4">
                                    <input id="cidade" type="cidade" class="form-control @error('cidade') is-invalid @enderror" name="cidade" value="{{ old('cidade') }}" required autocomplete="cidade">

                                    @error('cidade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <label for="uf" class="col-md-1 col-form-label text-md-right">UF</label>

                                <div class="col-md-2">
                                    <input id="uf" type="text" class="form-control @error('uf') is-invalid @enderror" 
                                    name="uf" value="{{ old('uf') }}" required autocomplete="uf" maxlength="2">

                                    @error('uf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr></hr>

                            <!-- Senha -->
                            <div class="form-group row">
                                <label for="password" class="col-md-3 col-form-label text-md-right">Senha</label>

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Repita a sennha -->
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-right">Repita a senha</label>

                                <div class="col-md-7">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-3">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>

  <footer class="footer mt-auto py-3" >
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Moura Espetos 2020</span>
        </div>
    </div>
  </footer>

  @include('layouts.functions')
  </body>
</html>