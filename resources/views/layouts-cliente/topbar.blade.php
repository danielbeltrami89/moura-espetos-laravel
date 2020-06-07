<!-- Topbar -->


<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-1">

  <a class="navbar-brand" href="{{ route('inicio') }}">
    <img height="50" src="{{ asset('img/img_admin/logo-moura.png') }}" >
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('inicio') }}">Início</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Quem somos</a>
      </li> -->
      <li class="nav-item {{ Request::is('faca-seu-pedido') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('produtos_cliente') }}">Cardápio</a>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right mr-3">
      <li class="nav-item {{ Request::is('faca-seu-pedido/carrinho') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('cart') }}">Carrinho 
          @if (session()->has('cart'))
            <?php $total = 0 ?> 
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                  <?php $total += $details['qnt'] ?>
                @endforeach
            @endif

            <span class="badge badge-light">            
              {{ $total }}
            </span>
            
          @endif
        </a>
      </li>
      
      @if (session()->get('name') != "" )
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ strtok(session()->get('name'), " ") }}
        </a>

        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="{{ route('ver_cliente', ['id' => session()->get('id') ]) }}">Meus dados</a>
          <a class="dropdown-item" href="{{ route('pedidos-cliente' , ['cliente_id' => session()->get('id') ]) }}">Meus pedidos</a>
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