<!DOCTYPE html>
<html>

<head>
 @include('layouts.css')
</head>
<body>

    <!-- sidenav -->
    @include('layouts.sidebar')
    <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
@include('layouts.topbar')
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">

          <!-- Card stats -->
        </div>
        @yield('content')
        @include('sweetalert::alert')
    </div>
</div>


    <!-- Page content -->

  </div>
    <script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('argon/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('argon/assets/js/argon.js?v=1.2.0')}}"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    @yield('scripts')


</body>

</html>
