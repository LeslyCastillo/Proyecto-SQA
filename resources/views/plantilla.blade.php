<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sistema RENTALQ - SQA</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/v-mask/dist/v-mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<style>
    input{
        text-transform: uppercase !important;
    }
</style>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Inicio</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class=" nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Cerrar Sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #2b4866 !important;">
    <!-- Brand Logo -->
    <a  class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ALQUILERQ - SQA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
{{--      <div class="user-panel mt-4 pb-4 mb-4 d-flex">--}}
{{--        <div class="image">--}}
{{--          <img  src="dist/img/logoAgencia.jpg"  alt="User Image">--}}
{{--        </div>--}}
{{--        <div class="info">--}}

{{--        </div>--}}
{{--      </div>--}}
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">MENU</li>
            <li class="nav-item">
                <a href="{{route("orden_trabajo.index")}}" class="nav-link">

                    <i class="nav-icon far fa-newspaper"></i>
                    <p>
                        Ordenes de Aquiler
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route("vehiculos.index")}}" class="nav-link">

                    <i class="nav-icon fas fa-car"></i>
                    <p>
                        Catalogo Vehiculos
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route("clientes.index")}}" class="nav-link">

                    <i class="nav-icon fas fa-user-edit"></i>
                    <p>
                        Listado de Clientes
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route("servicios.index")}}" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>
                        Listado de Servicios
                    </p>
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href="{{route("tipos_vehiculos.index")}}" class="nav-link">--}}
{{--                    <i class="nav-icon fas fa-clipboard-list"></i>--}}

{{--                    <p>--}}
{{--                        Tipos de Vehiculos--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="nav-item">
                <a href="{{route("marcas.index")}}" class="nav-link">
                    <i class="nav-icon fas fa-check-circle"></i>
                    <p>
                        Listado de Marcas
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route("lineas.index")}}" class="nav-link">
                    <i class="nav-icon fas fa-grip-lines"></i>

                    <p>
                        Listado de LÍneas
                    </p>
                </a>
            </li>
{{--          <li class="nav-item">--}}
{{--            <a href="pages/calendar.html" class="nav-link">--}}
{{--              <i class="nav-icon fas fa-user-friends"></i>--}}
{{--              <p>--}}
{{--                Empleados--}}
{{--              </p>--}}
{{--            </a>--}}
{{--          </li>--}}

            <li class="nav-item">
                <a href="{{route("pagos.index")}}" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>
                        Vista de Pagos
                    </p>
                </a>
            </li>
{{--            <li class="nav-item">--}}
{{--                <a href="{{route("tipos_pagos.index")}}" class="nav-link">--}}
{{--                    <i class="nav-icon fas fa-hand-holding-usd"></i>--}}
{{--                    <p>--}}
{{--                        Formas de Pago--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </li>--}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        @if(Route::is('orden_trabajo.index'))
      <div id="app" class="container-fluid p-4 bg-white shadow-sm rounded">
          @else
              <div id="app" class="container p-4 bg-white shadow-sm rounded">
          @endif
          @yield('contenido')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
</body>
</html>
