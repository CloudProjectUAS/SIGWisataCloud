
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('ThemeAdmin.header')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  @include('ThemeAdmin.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('ThemeAdmin.sidebar')

  <!-- Content Wrapper. Contains page content -->
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
                <h2 class="card-title">Data Kabupaten</h2>

                <div class="card-tools">
                  <a href="{{ route('add-kabupaten') }}" type="button" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i>
                  Tambah</a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('pesan'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  {{ session('pesan') }}
                </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="40px" class="text-center">No</th>
                      <th>Kabupaten</th>
                      <th width="50px">Warna</th>
                      <th width="100px" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; ?>
                    @foreach ($kabupaten as $data)
                      <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $data->kabupaten }}</td>
                        <td style="background-color:{{ $data->warna }}"></td>
                        <td class="text-center">
                          <a href="/Kabupaten/Edit/{{ $data->id }}" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a>
                          <button class="btn btn-sm btn-flat btn-danger" data-toggle="modal" data-target="#delete{{ $data->id }}"><i class="fa fa-trash"></i></button>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
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

@foreach($kabupaten as $data)
<div class="modal fade" id="delete{{ $data->id }}">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{ $data->kabupaten }}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>
        <a href="/Kabupaten/Delete/{{ $data->id }}" type="button" class="btn btn-outline-light">Yes</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach



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
<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  window.setTimeout(function(){
    $(".alert").fadeTo(500,0).slideUp(500, function(){
      $(this).remove();
    });
  },3000)
</script>
</body>
</html>
