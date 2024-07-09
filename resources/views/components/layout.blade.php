<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset/admin/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/admin/img/favicon.png') }}">
    <title>
        Dashboard Admin
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('asset/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('asset/admin/css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('asset/admin/css/dataTables.bootstrap5.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('asset/admin/css/bootstrap.min.css') }}"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheetv" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/0a267e6f70.js" crossorigin="anonymous"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  @include('components.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('components.navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row p-3">
        @yield('content')
      </div>
      @include('components.footer')
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="{{ asset('asset/admin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('asset/admin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('asset/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('asset/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('asset/admin/js/plugins/chartjs.min.js') }}"></script>

  <script>
    function subMenuCourses() {
        const showMenuBlog  = document.getElementById("subMenuCourses");
        showMenuBlog.classList.remove("d-none");
    }

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('') }}asset/admin/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>
