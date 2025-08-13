<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="img/png" href="{{url ("img/pagina/index/logo.png")}}">
      <title>{{ config('app.name') }} | @if(!is_null($title)) {{ $title }} @endif</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    @foreach ($css_files as $file)
        <link rel="stylesheet" href="{{$file}}">
    @endforeach
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

    <!-- Navbar -->
    @include('plantilla.navbar')
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-3">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @include($view)
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    @include('plantilla.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- PLantilla -->
<script>
BASE_URL = '{{ url("/") }}/'
</script>
@foreach ($js_files as $file)
    <script src="{{$file}}"></script>
@endforeach
</body>
</html>
