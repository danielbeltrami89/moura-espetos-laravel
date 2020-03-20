<!DOCTYPE html>
<html>

  @include('layouts.header')

  <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      @include('layouts.sidebar')

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

          @include('layouts.topbar')
          
          <!-- Begin Page Content -->
          <div class="container-fluid">
            @include('layouts.alertas')
            @yield('content')
          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        @include('layouts.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    @include('layouts.functions')
      
  </body>

</html>