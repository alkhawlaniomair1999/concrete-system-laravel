<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('title')</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('assets/admin/fonts/SansPro/SansPro.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap_rtl-v4.2.1/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap_rtl-v4.2.1/custom_rtl.css')}}">
  <link rel="stylesheet" href="{{asset('assets/admin/css/mycustomstyle.css')}}">
  <link rel="stylesheet" href="{{asset('resources/css/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('resources/css/select2-bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('resources/css/select2-bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('resources/css/select2.css')}}">
  <link rel="stylesheet" href="{{asset('resources/css/select2.min.css')}}">


</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
@include('admin.include.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('admin.include.sidebar')

  <!-- Content Wrapper. Contains page content -->
@include('admin.include.content')  
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
@include('admin.include.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/admin/js/gen.js')}}"></script>

<script src={{asset("resources/js/datatables.min.js")}}></script>
<script src={{asset("resources/js/bootstrap.bundle.min.js")}}></script>
<script src={{asset("resources/js/custom.js")}}></script>
<script src={{asset("resources/js/pdfmake.min.js")}}></script>
<script src={{asset("resources/js/vfs_fonts.js")}}></script>
<script src={{asset("resources/js/dataTables.min.js")}}></script>
<script src={{asset("resources/js/dataTables.bootstrap4.min.js")}}></script>
<script src={{asset("resources/js/dataTables.bootstrap4.js")}}></script>
<script src={{asset("resources/js/jquery.dataTables.js")}}></script>
<script src={{asset("resources/js/jquery.dataTables.min.js")}}></script>
<script src={{asset("resources/js/select2.full.js")}}></script>
<script src={{asset("resources/js/select2.full.min.js")}}></script>
<script src={{asset("resources/js/select2.js")}}></script>
<script src={{asset("resources/js/select2.min.js")}}></script>
<script src={{asset("resources/js/se.js")}}></script>
<script src={{asset("resources/js/dashboard.js")}}></script>
@yield('script')
</body>
</html>
