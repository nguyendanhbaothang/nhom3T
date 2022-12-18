<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="{{asset('assets/images/favicon.svg')}}"
      type="image/x-icon"
    />
    <title>3T SHOPS</title>
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/LineIcons.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/quill/bubble.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/quill/snow.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/morris.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/datatable.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}" />
  </head>
  <body>
@include('admin.layout.sidebar')
<div class="overlay"></div>
<main class="main-wrapper">
  <br>
  <section class="section">
    <div class="container-fluid">
        @yield('content')
    </div>
  </section>
  @include('admin.layout.footer')
</main>
  <!-- ========= All Javascript files linkup ======== -->
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/Chart.min.js')}}"></script>
  <script src="{{asset('assets/js/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/js/dynamic-pie-chart.js')}}"></script>
  <script src="{{asset('assets/js/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/fullcalendar.js')}}"></script>
  <script src="{{asset('assets/js/jvectormap.min.js')}}"></script>
  <script src="{{asset('assets/js/world-merc.js')}}"></script>
  <script src="{{asset('assets/js/polyfill.js')}}"></script>
  <script src="{{asset('assets/js/quill.min.js')}}"></script>
  <script src="{{asset('assets/js/datatable.js')}}"></script>
  <script src="{{asset('assets/js/Sortable.min.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>
