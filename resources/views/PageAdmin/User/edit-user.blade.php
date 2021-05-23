
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
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <h2 class="card-title">Edit Data User</h2>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <form action="/UserProfile/Update/{{ $user->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" placeholder="Name" name="name">
                        <div class="text-danger">
                          @error('name')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="{{ $user->email }}" placeholder="Email" name="email" readonly>
                        <div class="text-danger">
                          @error('email')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Privillege</label>
                        <select name="level" class="form-control" value="{{ $user->level }}>
                          <option value="">--Pilih Privillege--</option>
                          <option value="admin">Admin</option>
                          <option value="user">User</option>
                        </select>
                        <div class="text-danger">
                          @error('level')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" value="{{ $user->password }}" placeholder="Password" name="password" readonly>
                        <div class="text-danger">
                          @error('password')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Foto</label>
                          <input type="file" name="foto" class="form-control" accept="image/png,image/jpeg,image/jpeg">
                          <div class="text-danger">
                            @error('foto')
                              {{ $message }}
                            @enderror
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="{{ route('user') }}" class="btn btn-warning float-right">Cancel</a>
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
