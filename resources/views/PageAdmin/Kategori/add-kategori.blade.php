
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('ThemeAdmin.header')
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('ThemeAdmin.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('ThemeAdmin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h2 class="card-title">Add Data Kategori</h2>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <form action="{{ route('insert-kategori') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" class="form-control" placeholder="Kategori" name="kategori">
                        <div class="text-danger">
                          @error('kategori')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Icons</label>
                          <input type="file" name="icon" class="form-control" accept="image/png">
                          <div class="text-danger">
                            @error('icon')
                              {{ $message }}
                            @enderror
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="{{ route('kategori') }}" class="btn btn-warning float-right">Cancel</a>
                  </div>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
    @include('ThemeAdmin.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('AdminLTE/dist/js/pages/dashboard.js')}}"></script>

<!-- bootstrap color picker -->
<script src="{{asset('AdminLTE/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>

</body>
</html>
