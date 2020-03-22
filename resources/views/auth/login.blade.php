<!doctype html>
<html lang="en" class="h-100">

  @include('layouts-cliente.header')

  <body class="d-flex flex-column h-100">
    
  @include('layouts-cliente.topbar')

  <!-- Begin page content -->
  <main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card shadow">
                    <div class="card-header">
                        <p class="h4 text-gray-800 text-center mt-2">Login</p>
                    </div>

                    <div class="card-body py-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label text-md-right">E-mail</label>

                                <div class="col-md-9">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label text-md-right">Senha</label>

                                <div class="col-md-9">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-9 offset-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Lembrar senha
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-md-6 ">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Login
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link w-100" href="{{ route('password.request') }}">
                                            Esqueceu a senha?
                                        </a>
                                    @endif

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