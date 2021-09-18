<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AwtoMenzil</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminpanelcss/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminpanelcss/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminpanelcss/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminpanelcss/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('adminpanelcss/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Select 2 -->
  <link rel="stylesheet" href="{{ asset('adminpanelcss/plugins/select2/css/select2.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminpanelcss/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminpanelcss/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminpanelcss/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminpanelcss/plugins/summernote/summernote-bs4.css') }}">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminpanelcss/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminpanelcss/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminpanelcss/dist/css/toastr.css') }}">


  <!-- Cropper  -->

  <link rel="stylesheet" href="{{ asset('adminpanelcss/dist/css/cardPrice.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container Begin -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('adminpanelcss/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
        
        @if(Auth::user()->autocolumn_id == 12345)
          <span class="brand-text font-weight-light">SuperAdmin</span>
        @else
          <span class="brand-text font-weight-light">Awto Toplum - {{ Auth::user()->autocolumn_id }}</span>
        @endif

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>Dolandyryş</p>
            </a>
          </li>
          @if(Auth::user()->autocolumn_id == 12345)
            <li class="nav-item">
              <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                <i class="nav-icon fa fa-user-circle"></i>
                <p>Ulanyjylar</p> 
              </a>
            </li>
          @endif

          <li class="nav-item">
            <a href="{{ route('admin.sections.index') }}" class="nav-link {{ Request::is('admin/sections*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>Bölümler</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.jobs.index') }}" class="nav-link {{ Request::is('admin/jobs*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>Wezipeler</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-user-tie"></i>
              <p>Işgärler</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ route('admin.drivers.index') }}" class="nav-link {{ Request::is('admin/drivers*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>Sürüjiler</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.cars.index') }}" class="nav-link {{ Request::is('admin/cars*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-car"></i>
              <p>Ulaglar</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.autocolumn.index') }}" class="nav-link {{ Request::is('admin/autocolumn*') ? 'active' : '' }}">
              <i class="nav-icon fa fa-columns"></i>
              <p>
                @if(Auth::user()->autocolumn_id == 12345)
                  Awto Toplumlar
                @else
                  Awto Toplum - {{ Auth::user()->autocolumn_id }}
                @endif
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Main Sidebar Container End -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Dolandyryş</a>
      </li>

      @if(Auth::user()->autocolumn_id == 12345)
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ route('admin.users.index') }}" class="nav-link">Ulanyjylar</a>
        </li>
      @endif
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.drivers.index') }}" class="nav-link">Sürüjiler</a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.cars.index') }}" class="nav-link">Ulaglar</a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <li class="nav-item">
          <form action="{{ route('logout') }}" method="post">
            @csrf

            <button class=" rounded-circle border border-danger" ><i class="fas fa-sign-out-alt text-danger"></i> </button>

          </form>

      </li>
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  @yield('content')

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021. </strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminpanelcss/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminpanelcss/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminpanelcss/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminpanelcss/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminpanelcss/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('adminpanelcss/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminpanelcss/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminpanelcss/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminpanelcss/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('adminpanelcss/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminpanelcss/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminpanelcss/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('adminpanelcss/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminpanelcss/dist/js/demo.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/toastr/toastr.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('adminpanelcss/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/dist/js/toastr.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('adminpanelcss/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminpanelcss/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminpanelcss/dist/js/adminlte.min.js') }}"></script>

<script>
  $(function () {

    @if(session('success'))
      toastr.success('{{ session("success") }}');
    @endif

    @if($errors->any())
      @foreach($errors->all() as $error)
        toastr.error('{{ $error }}');
      @endforeach
    @endif

    
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "buttons": ["copy", "excel", "pdf", "print"],
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

  });

  
</script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>

<script>
  
  $(function(){
		$('.nav-item a').click(function(){
			$(this).parent().addClass('active').siblings().removeClass('active')
		})
	})

</script>

</body>
</html>

