<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('inicio') }}" target="_blank">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small mr-3">Ver site</span>
      </a>
    </li>
     
    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small mr-3">{{ session()->get('name') }}</span>
        <img class="img-profile rounded-circle" src="{{ asset('img/img_admin/perfil.png') }}">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{ route('ver_user', ['user_id' => session()->get('id') ]) }}">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Perfil
        </a>
        <a class="dropdown-item" href="{{ route('ver_user', ['user_id' => session()->get('id') ]) }}">
          <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
          Trocar senha
        </a>
        <!-- <a class="dropdown-item" href="#">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Atividades Log
        </a> -->
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>

  </ul>

</nav>
<!-- End of Topbar -->