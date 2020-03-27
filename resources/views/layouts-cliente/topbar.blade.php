<!-- Topbar -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-1">

  <a class="navbar-brand" href="{{ route('inicio') }}">Moura Espetos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('inicio') }}">Início<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Quem somos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pedido_cliente') }}">Produtos</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a class="nav-link" href="{{ route('pedido_cliente') }}">Carrinho</a>
    </span>
    <span class="navbar-text">
      @if (session()->get('name') != "" )
      <a class="nav-link" href="">{{ session()->get('name') }}</a>
      @else
      <a class="nav-link" href="{{ route('login') }}">Entrar</a>
      @endif
    </span>
  </div>
</nav>
<!-- End of Topbar -->