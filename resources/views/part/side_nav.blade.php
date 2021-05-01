<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('argon-template')}}/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="/">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>


            <!--Mahasiswa-->
            <li class="nav-item">
              <a class="nav-link" href="/mahasiswa">
                <i class="fas fa-user-graduate text-orange"></i>
                <span class="nav-link-text">Mahasiswa</span>
              </a>
            </li>
            <!--End Mahasiswa-->


            <!--Dosen-->
            <li class="nav-item">
              <a class="nav-link" href="/dosen">
                <i class="fas fa-chalkboard-teacher text-primary"></i>
                <span class="nav-link-text">Dosen</span>
              </a>
            </li>
            <!--End Dosen-->


            <!--Dropdown
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="ni ni-planet text-orange"></i>
              <span class="mb-0 text-sm  font-weight-bold">Dropdown</span>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Dropdown</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>List</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
            End Dropdown-->


            <li class="nav-item">
              <a class="nav-link" href="/pengumuman">
                <i class="fas fa-bullhorn text-yellow"></i>
                <span class="nav-link-text">Pengumuman</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/kegiatan">
                <i class="fas fa-users text-warning"></i>
                <span class="nav-link-text">Kegiatan</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/about">
                <i class="fas fa-info text-primary"></i>
                <span class="nav-link-text">About</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
