 {{-- <!-- Sidenav -->
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
              <a class="nav-link active" href="examples/dashboard.html">
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
  </nav> --}}
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href=" pages/dashboards/dashboard.html">
            <img src="{{asset('argon/assets/img/brand/logo_sumbermas_blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <a class="nav-link active" href="{{ url('/') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('sumber-pemasukan') }}" >
                <i class="ni ni-user-run text-yellow"></i>
                <span class="nav-link-text">Distributor</span>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#navbar-components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-components">
                  <i class="ni ni-money-coins text-yellow"></i>
                  <span class="nav-link-text">Manajemen</span>
                </a>
                <div class="collapse" id="navbar-components">
                  <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                      <a  href="{{ url('pemasukan') }}" class="nav-link{{ (request()->is('pemasukan')) ? ' active' : '' }}">
                          <i class="fa fa-share" style="color:green" aria-hidden="true"></i>
                          <span class="nav-link-text">sumber pemasukan</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ url('pengeluaran') }}" class="nav-link">
                          <i class="fa fa-reply" style="color:red" aria-hidden="true"></i>
                        <span class="sidenav-normal"> sumber pengeluaran </span>
                      </a>
                    </li>

                  </ul>
                </div>
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
          <!-- Divider -->



        </div>
      </div>
    </div>
  </nav>
