
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
            <h1 class="m-0">Kabupaten</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kabupaten</li>
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
                <h2 class="card-title">Edit Data Kabupaten</h2>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <form action="/Kabupaten/Update/{{ $kabupaten->id }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Kabupaten</label>
                        <input type="text" value="{{ $kabupaten->kabupaten }}" class="form-control" placeholder="Kabupaten" name="kabupaten">
                        <div class="text-danger">
                          @error('kabupaten')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Warna</label>
                          <div class="input-group my-colorpicker2">
                            <input name="warna" value="{{ $kabupaten->warna }}" class="form-control" placeholder="Warna">
                            <div class="input-group-append">
                              <span class="input-group-text"><i class="fas fa-square"></i></span>
                            </div>
                          </div>
                          <!-- /.input group -->
                          <div class="text-danger">
                            @error('warna')
                              {{ $message }}
                            @enderror
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                        <label>GEOJSON</label>
                        <textarea name="geojson" rows="5" class="form-control" placeholder="GeoJSON">{{ $kabupaten->geojson }}</textarea>
                        <div class="text-danger">
                          @error('geojson')
                            {{ $message }}
                          @enderror
                        </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="{{ route('kabupaten') }}" class="btn btn-warning float-right">Cancel</a>
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
<script>
  //color picker with addon
  $('.my-colorpicker2').colorpicker()

  $('.my-colorpicker2').on('colorpickerChange', function(event) {
    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
  })
</script>
</body>
</html>
