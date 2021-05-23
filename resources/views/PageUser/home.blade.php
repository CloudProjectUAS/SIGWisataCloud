
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
            Pemetaan Objek Wisata Bali
          </div>
          <div class="card-body">
            <div id="map" style="width: 100%; height: 500px; "></div>
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

  @foreach ($kabupaten as $data)
    var data{{ $data->id }} = L.layerGroup();
  @endforeach

    var objekwisata = L.layerGroup();

  var map = L.map('map', {
    center: [-8.40845089491575, 115.20058550393681],
    zoom: 10,
    layers: [peta1,
    @foreach ($kabupaten as $data)
      data{{ $data->id }},
    @endforeach
    objekwisata,
    ]
  });

  var baseMaps = {
    "Grayscale": peta1,
    "Satellite": peta2,
    "Streets": peta3,
    "Dark": peta4,
  };

  var overlayer = {
    @foreach ($kabupaten as $data)
    "{{ $data->kabupaten }} " : data{{ $data->id }},
    @endforeach
    "Objek Wisata": objekwisata,
  };

  L.control.layers(baseMaps, overlayer).addTo(map);

  @foreach ($kabupaten as $data)
    L.geoJSON(<?= $data->geojson ?>, {
      style : {
        color : 'white',
        fillColor : '{{ $data->warna }}',
        fillOpacity : 0.8,
      },
    }).addTo(data{{ $data->id }});
  @endforeach

  @foreach ($objekwisata as $data)
  var iconobjekwisata = L.icon({
    iconUrl: '{{asset('Icons')}}/{{ $data->icon }}',
    iconSize:     [30, 30], // size of the icon
  });

  var info = '<table class="table table-bordered"><tr><td colspan="2" class="text-center"><img src="{{asset('Foto')}}/{{ $data->foto }}" width="200px"></td></tr><tbody><tr><td>Objek Wisata</td><td>{{ $data->objek_wisata }}</td></tr><tr><td>Kategori</td><td>{{ $data->kategori }}</td></tr><tr><td>Status</td><td>{{ $data->status }}</td></tr><tr><td colspan="2"><a href="/DetailObjekWisata/{{ $data->id }}" class="btn btn-primary btn-sm btn-block">Detail</td></tr></tbody></table>';

    L.marker([<?= $data->posisi ?>], {icon: iconobjekwisata}).addTo(objekwisata)
    .bindPopup(info);
  @endforeach

</script>

</body>
</html>
