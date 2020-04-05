<!DOCTYPE html>
<html class="h-100">

@include('layouts-cliente.header')

<body class="d-flex flex-column h-100">
   
  @include('layouts-cliente.topbar')

  @yield('content')
    
  <footer class="footer mt-auto py-3" >
      <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; Moura Espetos 2020</span>
          </div>
      </div>
  </footer>

  @include('layouts-cliente.scripts')
      
  </body>

</html>