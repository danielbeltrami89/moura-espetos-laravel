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
        <a class="nav-link" href="{{ route('produtos_cliente') }}">Produtos</a>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right mr-3">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('cart') }}">Carrinho</a>
      </li>
      
      @if (session()->get('name') != "" )
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ strtok(session()->get('name'), " ") }}
        </a>

        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('ver_cliente', ['user_id' => session()->get('id') ]) }}">Meus dados</a>
          <a class="dropdown-item" href="{{ route('pedidos-cliente' , ['cliente_id' => session()->get('tel') ]) }}">Meus pedidos</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}" 
              onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
              Sair
            </a>    
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
      </li>
      
      @else
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Entrar</a>
      </li>
      @endif
    </ul>
    
  </div>
</nav>
<!-- End of Topbar -->