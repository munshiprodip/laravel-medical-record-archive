<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Medical Record Archive - @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/backend/assets/images/favicon.png')}}">





  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('public/backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('public/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('public/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

  <!-- Theme style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/dist/css/adminlte.min.css')}}">
  <!-- My customized style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/customize.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-navy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Logout link -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').
          submit();">
          <i class="fas fa-sign-out-alt"></i>
          <span>Signout</span>
        </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
      <!-- End Logout -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('public/backend/assets/images/logo.png')}}"
           alt="KYAMCH MRA" class="brand-image" style="width: 175px;">
      <span class="brand-text font-weight-light" style="visibility: hidden;">MRA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('public/backend/dist/img/profile.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            @can('create-user')

            <li class="nav-header border-bottom">ADMIN AREA</li>

            <li class="nav-item ">
                <a href="{{route('user')}}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
                    <i class="fas fa-users nav-icon text-pink"></i>
                    <p>USERS</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('role')}}" class="nav-link {{ request()->is('role') ? 'active' : '' }}">
                    <i class="fas fa-user-tag nav-icon text-purple"></i>
                    <p>ROLES</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('permission')}}" class="nav-link {{ request()->is('permission') ? 'active' : '' }}">
                    <i class="fas fa-low-vision nav-icon text-primary"></i>
                    <p>PERMISSIONS</p>
                </a>
            </li>

{{--            <li class="nav-item">--}}
{{--                <a href="{{route('gender')}}" class="nav-link">--}}
{{--                    <i class="fas fa-venus-mars nav-icon text-warning"></i>--}}
{{--                    <p>GENDERS</p>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{route('religion')}}" class="nav-link">--}}
{{--                    <i class="fas fa-pray nav-icon text-info"></i>--}}
{{--                    <p>RELIGIONS</p>--}}
{{--                </a>--}}
{{--            </li>--}}

{{--            <li class="nav-item">--}}
{{--                <a href="{{route('bloodgroup')}}" class="nav-link">--}}
{{--                    <i class="fas fa-tint nav-icon text-danger"></i>--}}
{{--                    <p>BLOOD GROUPS</p>--}}
{{--                </a>--}}
{{--            </li>--}}
            @endcan

            <li class="nav-header border-bottom">ASSET SETUP AREA</li>

            <li class="nav-item">
                <a href="{{route('doctor')}}" class="nav-link {{ request()->is('doctor') ? 'active' : '' }}">
                    <i class="fas fa-user-md nav-icon text-info"></i>
                    <p>DOCTOR SETTING</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('speciality')}}" class="nav-link {{ request()->is('speciality') ? 'active' : '' }}">
                    <i class="fas fa-magic nav-icon text-pink"></i>
                    <p>SPECIALITY SETTING</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('department')}}" class="nav-link {{ request()->is('department') ? 'active' : '' }}">
                    <i class="fas fa-door-open nav-icon text-primary"></i>
                    <p>DEPARTMENT SETTING</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('ward')}}" class="nav-link {{ request()->is('ward') ? 'active' : '' }}">
                    <i class="fas fa-procedures nav-icon text-light"></i>
                    <p>WARD SETTING</p>
                </a>
            </li>






          <li class="nav-header border-bottom">ARCHIVE AREA</li>

            <li class="nav-item">
                <a href="{{route('files.create')}}" class="nav-link {{ request()->is('files/create') ? 'active' : '' }}">
                    <i class="far fa-plus-square nav-icon text-info"></i>
                    <p>STORE NEW FILE</p>
                </a>
            </li>

{{--            <li class="nav-item">--}}
{{--                <a href="{{route('files.index')}}" class="nav-link">--}}
{{--                    <i class="fas fa-file-archive nav-icon text-warning"></i>--}}
{{--                    <p>ALL FILES</p>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class="nav-item">
                <a href="{{route('files.present')}}" class="nav-link {{ request()->is('file/in-archive') ? 'active' : '' }}">
                    <i class="fas fa-file-archive nav-icon text-warning"></i>
                    <p>PRESENT ARCHIVE</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('files.death')}}" class="nav-link {{ request()->is('file/death') ? 'active' : '' }}">
                    <i class="fas fa-file-archive nav-icon text-danger"></i>
                    <p>DEATH FILES</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('issued-files.index')}}" class="nav-link {{ request()->is('issued-files') ? 'active' : '' }}">
                    <i class="fas fa-file-archive nav-icon text-pink"></i>
                    <p>ISSUED FILES</p>
                </a>
            </li>


            <li class="nav-header border-bottom">ARCHIVE SETTING</li>

            <li class="nav-item">
                <a href="{{route('rack')}}" class="nav-link {{ request()->is('rack') ? 'active' : '' }}">
                    <i class="fas fa-th nav-icon text-info"></i>
                    <p>Rack Settings</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('locker')}}" class="nav-link {{ request()->is('locker') ? 'active' : '' }}">
                    <i class="fas fa-cube nav-icon text-warning"></i>
                    <p>Locker Settings</p>
                </a>
            </li>


            <li class="nav-header border-bottom">REPORTS</li>

            <li class="nav-item">
                <a href="{{ route('report.index') }}" class="nav-link {{ request()->is('report') ? 'active' : '' }}">
                    <i class="fas fa-file-pdf nav-icon text-warning"></i>
                    <p>GENERATE REPORT</p>
                </a>
            </li>/
        </ul>
          <br>
          <br>
          <br>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 text-uppercase">
            <h1>@yield('title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              @yield('breadcrumb')
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          @yield('content')
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2021-2025 <a href="https://www.facebook.com/munshiprodip/">KYAMCH IT</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- overlayScrollbars -->
<script src="{{ asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{ asset('public/backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{ asset('public/backend/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('public/backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{ asset('public/backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('public/backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{ asset('public/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('public/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('public/backend/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>


<script src="{{ asset('public/vendor/sweetalert/sweetalert.all.js')}}"></script>
@include('sweetalert::alert')

<!-- AdminLTE App -->
<script src="{{ asset('public/backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('public/backend/dist/js/demo.js')}}"></script>

@yield('script')


</body>
</html>
