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
    <title>CLOCK SHOPS</title>

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
{{-- @include('admin.header') --}}
<div class="overlay"></div>
<main class="main-wrapper">
  @include('admin.layout.header')
  <section class="section">
    <div class="container-fluid">
        @yield('content')
     dffsdgfhgh
    </div>
    <!-- end container -->
  </section>
  @include('admin.layout.footer')
    
</main>

{{-- @include('admin.header') --}}


  <!-- ========= All Javascript files linkup ======== -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/apexcharts.min.js"></script>
  <script src="assets/js/dynamic-pie-chart.js"></script>
  <script src="assets/js/moment.min.js"></script>
  <script src="assets/js/fullcalendar.js"></script>
  <script src="assets/js/jvectormap.min.js"></script>
  <script src="assets/js/world-merc.js"></script>
  <script src="assets/js/polyfill.js"></script>
  <script src="assets/js/quill.min.js"></script>
  <script src="assets/js/datatable.js"></script>
  <script src="assets/js/Sortable.min.js"></script>
  <script src="assets/js/main.js"></script>

</body>
</html>