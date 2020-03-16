<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
  
  <img class="img" src="{{ asset('img/img_admin/espeto-na-brasa.png') }}">
  
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="{{ route('home') }}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Painel</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Gerência
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseItem" aria-expanded="true" aria-controls="collapseItem">
    <i class="fas fa-utensils"></i>
    <span>Menu</span>
  </a>
  <div id="collapseItem" class="collapse" aria-labelledby="headingItem" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ route('todos_itens') }}">Todos menus</a>
      <a class="collapse-item" href="{{ route('novo_item') }}">Novo menu</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="{{ route('todos_pedidos') }}">
    <i class="fas fa-shopping-cart"></i>
    <span>Pedidos</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="{{ route('todos_users') }}">
    <i class="fas fa-users"></i>
    <span>Clientes</span>
  </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->