
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
            <div id="mapid" style="width: 1050px; height: 500px; "></div>
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

</body>
</html>
