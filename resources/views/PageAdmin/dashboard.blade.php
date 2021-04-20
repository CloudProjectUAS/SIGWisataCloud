
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @include('ThemeAdmin.header')

  <!-- LEAFLET -->

  <!-- leaflet css  -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
  <!-- leaflet js  -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
  <!-- bootstrap cdn  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-md-4">
            <div class="info-box mb-4">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">
                  10
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <div class="info-box mb-4">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Locations</span>
                <span class="info-box-number">41</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-md-4">
            <div class="info-box mb-4">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Articles</span>
                <span class="info-box-number">41</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maps Marks</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="d-md-flex">
                  <div class="p-1 flex-fill" style="overflow: hidden">
                    <!-- Map will be created here -->
                    <div id="world-map-markers" style="height: 450px; overflow: hidden">
                      <div id="mapid" style="width: 800px; height: 450px"></div>
                    </div>
                  </div>
                </div><!-- /.d-md-flex -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">View</span>
                <span class="info-box-number">5,200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Comments</span>
                <span class="info-box-number">114,381</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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

<script>
  var mymap = L.map('mapid').setView([-8.385159, 115.130676], 10);   
    L.tileLayer(
      'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZGlhaHB1dHJpbSIsImEiOiJja2xrbHRxcHkwb2d6MnBvYnJlemlpZWZpIn0.sWcJMwGJz4ImxXYqa2Iahw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 20,
        id: 'mapbox/streets-v11', //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'your.mapbox.access.token'
    }).addTo(mymap);
            
    var marker = L.marker([-8.385159, 115.130676],{
      draggable: "true"
    }).addTo(mymap);
            
    var popup = L.popup();

    function onMapClick(e) {
      popup
        .setLatLng(e.latlng)
        .setContent("koordinatnya adalah " + e.latlng
        .toString()
        ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
        .openOn(mymap);

      document.getElementById('latlong').value = e.latlng //value pada form latitude, longitude akan berganti secara otomatis
    }
    
    mymap.on('click', onMapClick); //jalankan fungsi

</script>


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
<script src="{{asset('AdminLTE/dist/js/pages/dashboard2.js')}}"></script>
</body>
</html>
