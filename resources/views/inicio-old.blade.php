<!doctype html>
<html lang="en" class="h-100">

  @include('layouts.header')

  <body class="d-flex flex-column h-100">
    
  @include('layouts.topbar-cliente')

    <main class="container-fluid no-padding"> 

        <div class="banner-img">
            <img src="{{ asset('img/img_admin/banner.png') }}">
        </div>

        <div class="row">
        <!-- Card  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Menu</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-utensils fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pedidos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-fw fa-shopping-cart fa-2x text-gray-300"></i>
                            </div>
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