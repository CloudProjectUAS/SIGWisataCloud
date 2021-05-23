<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{ route('home') }}" class="navbar-brand">
        <img src="{{asset('Pictures/maps.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Wisata 4.0</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kabupaten</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            @foreach ($kabupaten as $data)
                <li><a href="/Kabupaten/{{ $data->id }}" class="dropdown-item">{{ $data->kabupaten }}</a></li>
            @endforeach
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            @foreach ($kategori as $data)
                <li><a href="/Kategori/{{ $data->id }}" class="dropdown-item">{{ $data->kategori }}</a></li>
            @endforeach
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">About</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">{{ auth()->user()->name }}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ route('logout') }}" class="dropdown-item">Log Out </a></li>
            </ul>
          </li>
      </ul>
    </div>
  </nav>
