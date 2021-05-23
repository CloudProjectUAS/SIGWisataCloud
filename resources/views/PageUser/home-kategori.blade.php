
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
@include('ThemeUser.header')

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">

<!-- LEAFLET -->

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  @include('ThemeUser.navbar')
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="card">
          <div class="card-header">
            Pemetaan Kategori {{ $title }}
          </div>
          <div class="card-body">
            <div id="map" style="width: 100%; height: 500px; "></div>
          </div>
          <div class="col-sm-12">
            <br>
            <br>
            <div class="text-center"><h2><b>Data Objek Wisata  {{ $title }} </b></h2></div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="40px" class="text-center">No</th>
                    <th class="text-center">Objek Wisata</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Koordinat</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($objekwisata as $data)
                    <tr>
                      <td class="text-center">{{ $no++ }}</td>
                      <td class="text-center">{{ $data->objek_wisata }}</td>
                      <td class="text-center">{{ $data->kategori }}</td>
                      <td class="text-center">{{ $data->status }}</td>
                      <td class="text-center">{{ $data->posisi }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('ThemeUser.footer')
</div>
<!-- ./wrapper -->

<script>
  var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/streets-v11'
  });

  var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/satellite-v9'
  });


  var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  });

  var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      id: 'mapbox/dark-v10'
  });

  var map = L.map('map', {
    center: [-8.40845089491575, 115.20058550393681],
    zoom: 10,
    layers: [peta1]
  });

  var baseMaps = {
    "Grayscale": peta1,
    "Satellite": peta2,
    "Streets": peta3,
    "Dark": peta4,
  };

  L.control.layers(baseMaps).addTo(map);

  @foreach ($kabupaten as $data)
    L.geoJSON(<?= $data->geojson ?>, {
      style : {
        color : 'white',
        fillColor : '{{ $data->warna }}',
        fillOpacity : 0.8,
      },
    }).addTo(map);
  @endforeach

  @foreach ($objekwisata as $data)
  var iconobjekwisata = L.icon({
    iconUrl: '{{asset('Icons')}}/{{ $data->icon }}',
    iconSize:     [30, 30], // size of the icon
  });

  var info = '<table class="table table-bordered"><tr><td colspan="2" class="text-center"><img src="{{asset('Foto')}}/{{ $data->foto }}" width="200px"></td></tr><tbody><tr><td>Objek Wisata</td><td>{{ $data->objek_wisata }}</td></tr><tr><td>Kategori</td><td>{{ $data->kategori }}</td></tr><tr><td>Status</td><td>{{ $data->status }}</td></tr><tr><td colspan="2"><a href="/DetailObjekWisata/{{ $data->id }}" class="btn btn-primary btn-sm btn-block">Detail</td></tr></tbody></table>';

    L.marker([{{ $data->posisi }}], {icon:iconobjekwisata}).addTo(map)
    .bindPopup(info);;
  @endforeach
</script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
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

<!-- jQuery -->
<script src="http://127.0.0.1:8000/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="http://127.0.0.1:8000/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="http://127.0.0.1:8000/AdminLTE/dist/js/adminlte.min.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="http://127.0.0.1:8000/AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/raphael/raphael.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="http://127.0.0.1:8000/AdminLTE/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="http://127.0.0.1:8000/AdminLTE/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="http://127.0.0.1:8000/AdminLTE/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="http://127.0.0.1:8000/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="http://127.0.0.1:8000/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

</body>
</html>
