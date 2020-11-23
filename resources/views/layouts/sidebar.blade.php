 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
        <img src="{{asset('argon/assets/img/brand/logo_sumbermas_blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('sumber-pemasukan') }}">
                <i class="ni ni-money-coins text-yellow"></i>
                <span class="nav-link-text">Keuangan</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('distributor') }}">
                  <i class="ni ni-air-baloon"></i>
                  <span class="nav-link-text">Distributor</span>
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/map.html">
                <i class="ni ni-single-copy-04 text-primary"></i>
                <span class="nav-link-text">Laporan keuangan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/profile.html">
                <i class="ni ni-calendar-grid-58 text-blue"></i>
                <span class="nav-link-text">Jadwal pertemuan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/tables.html">
                <i class="ni ni-building text-default"></i>
                <span class="nav-link-text">Produksi</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/login.html">
                <i class="ni ni-settings-gear-65 text-info"></i>
                <span class="nav-link-text">Akun</span>
              </a>
            </li>

          </ul>


        </div>
      </div>
    </div>
  </nav>
