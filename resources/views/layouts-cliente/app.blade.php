<!DOCTYPE html>
<html>

@include('layouts-cliente.header')

  <body>
   
  @include('layouts-cliente.topbar')

  @yield('content')
    
  @include('layouts-cliente.footer')
  @include('layouts-cliente.scripts')
      
  </body>

</html>