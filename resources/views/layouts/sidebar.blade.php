<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
  
  <img class="img" src="{{ asset('img/img_admin/icone-inventario.png') }}">
  
  <div class="sidebar-brand-text mx-3">LABO Inventário</div>
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
    <i class="fas fa-box"></i>
    <span>Itens</span>
  </a>
  <div id="collapseItem" class="collapse" aria-labelledby="headingItem" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ route('todos_itens') }}">Todos itens</a>
      <a class="collapse-item" href="{{ route('novo_item') }}">Novo item</a>
      <a class="collapse-item" href="{{ route('ver_nome_item') }}">Nomes de itens</a>
      <a class="collapse-item" href="{{ route('ver_status_item') }}">Status</a>
      <a class="collapse-item" href="{{ route('ver_tipo_item') }}">Tipos</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="{{ route('todas_movimentacoes') }}">
    <i class="fas fa-dolly"></i>
    <span>Movimentações</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocal" aria-expanded="true" aria-controls="collapseLocal">
    <i class="fas fa-map-marker-alt"></i>
    <span>Locais</span>
  </a>
  <div id="collapseLocal" class="collapse" aria-labelledby="headingLocal" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ route('todos_locais') }}">Todos locais</a>
      <a class="collapse-item" href="{{ route('novo_local') }}">Novo local</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSetor" aria-expanded="true" aria-controls="collapseSetor">
    <i class="fas fa-fw fa-university"></i>
    <span>Setores</span>
  </a>
  <div id="collapseSetor" class="collapse" aria-labelledby="headingSetor" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ route('todos_setores') }}">Todos setores</a>
      <a class="collapse-item" href="{{ route('novo_setor') }}">Novo setor</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForn" aria-expanded="true" aria-controls="collapseForn">
    <i class="fas fa-fw fa-id-card"></i>
    <span>Fornecedores</span>
  </a>
  <div id="collapseForn" class="collapse" aria-labelledby="headingForn" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ route('todos_fornecedores') }}">Todos fonecedores</a>
      <a class="collapse-item" href="{{ route('novo_fornecedor') }}">Novo fornecedor</a>
    </div>
  </div>
</li>

@if( session()->get('func') == 'Coordenador' )
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
    <i class="fas fa-fw fa-user-circle"></i>
    <span>Usuários</span>
  </a>
  <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ route('todos_users') }}">Todos usuários</a>
      <a class="collapse-item" href="{{ route('novo_user') }}">Novo usuário</a>
      <!-- <h6 class="collapse-header">Gerenciamento:</h6>
      <a class="collapse-item" href="{{ route('novo_item') }}">Permissões</a> -->
    </div>
  </div>
</li>
@endif

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->