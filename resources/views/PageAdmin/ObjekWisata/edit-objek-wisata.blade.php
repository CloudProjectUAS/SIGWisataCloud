
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
            <h1 class="m-0">Objek Wisata</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Objek Wisata</li>
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
                <h2 class="card-title">Edit Data Objek Wisata</h2>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <form action="/ObjekWisata/Update/{{ $objekwisata->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Objek Wisata</label>
                        <input type="text" class="form-control" placeholder="Objek Wisata" name="objekwisata" value="{{ $objekwisata->objek_wisata }}">
                        <div class="text-danger">
                          @error('objekwisata')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                          <option value="{{ $objekwisata->id_kategori }}">{{ $objekwisata->kategori }}</option>
                          @foreach ($kategori as $data)
                            <option value="{{ $data->id }}">{{ $data->kategori }}</option>
                          @endforeach
                        </select>
                        <div class="text-danger">
                          @error('id_kategori')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                          <option value="{{ $objekwisata->status }}">{{ $objekwisata->status }}</option>
                          <option value="pengelolaan">Dalam Pengelola</option>
                          <option value="alami">Alami</option>
                        </select>
                        <div class="text-danger">
                          @error('status')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Kabupaten</label>
                        <select name="id_kabupaten" class="form-control">
                          <option value="{{ $objekwisata->id_kabupaten }}">{{ $objekwisata->kabupaten }}</option>
                          @foreach ($kabupaten as $data)
                            <option value="{{ $data->id }}">{{ $data->kabupaten }}</option>
                          @endforeach
                        </select>
                        <div class="text-danger">
                          @error('id_kabupaten')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ $objekwisata->alamat }}">
                        <div class="text-danger">
                          @error('alamat')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Posisi</label>
                        <label class="text-danger"><small>(Drag and Drop marker untuk menentukan posisi objek wisata)</small></label>
                        <input type="text" class="form-control" id="posisi" placeholder="Latitude, Longitude" name="posisi" value="{{ $objekwisata->posisi }}" readonly>
                        <div class="text-danger">
                          @error('posisi')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Foto</label>
                          <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png">
                          <div class="text-danger">
                            @error('foto')
                              {{ $message }}
                            @enderror
                          </div>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <label>Peta Lokasi</label>
                      <div id="map" style="width: 100%; height: 300px; "></div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" placeholder="Deskripsi" rows="5">{{ $objekwisata->deskripsi }}</textarea>
                        <div class="text-danger">
                          @error('deskripsi')
                            {{ $message }}
                          @enderror
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                    <a href="{{ route('objek-wisata') }}" class="btn btn-warning float-right">Cancel</a>
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
    center: [{{ $objekwisata->posisi }}],
    zoom: 10,
    layers: [peta2],
  });

  var baseMaps = {
    "Grayscale": peta1,
    "Satellite": peta2,
    "Streets": peta3,
    "Dark": peta4,
  };

  L.control.layers(baseMaps).addTo(map);

  //Get coordinate
  var curLocation = [{{ $objekwisata->posisi }}];
  map.attributionControl.setPrefix(false);

  var marker = new L.marker(curLocation,{
    draggable : 'true',
  });

  map.addLayer(marker);

  //Ambil koordinat saat marker di drag
  marker.on('dragend',function(event){
    var position = marker.getLatLng();
    marker.setLatLng(position, {
      draggable : 'true',
    }).bindPopup(position).update();
    $("#posisi").val(position.lat + ", " + position.lng).keyup();
  });

  //Ambil koordinat saat marker diklik
  var posisi = document.querySelector("[name=posisi]");
  map.on("click", function(event){
    var lat = event.latlng.lat;
    var lng = event.latlng.lng;

    if (!marker){
      marker = L.marker(event.latlng).addTo(map);
    } else {
      marker.setLatLng(event.latlng);
    }

    posisi.value = lat + ", " + lng;

  });
</script>
</body>
</html>
