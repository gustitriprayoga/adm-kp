<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{url('dashboard')}}" target="_blank">
        <img src="{{asset('frontend/assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-2 font-weight-bold text-white">ADMINISTRASI KERJA PRAKTIK</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          {{-- <a class="nav-link " href="{{url('dashboard')}}"> --}}
            <a class="nav-link text-white {{ (Request::is('dashboard') ? 'active bg-gradient-primary' : '') }}" href="{{ url('dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white {{ (Request::is('profilmhs') ? 'active bg-gradient-primary' : '') }}" href="{{ url('profilmhs') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ (Request::is('pengajuan*') ? 'active bg-gradient-primary' : '') }}" href="{{ url('pengajuan') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Pengajuan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ (Request::is('seminarkp*') ? 'active bg-gradient-primary' : '') }}" href="{{ url('seminarkp') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Pengajuan Seminar KP</span>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (Request::is('logbook') ? 'active bg-gradient-primary' : '') }}" href="{{ url('logbook') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">

              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Logbook</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (Request::is('laporankp/index') ? 'active bg-gradient-primary' : '') }}" href="{{ url('laporankp/index') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <span class="material-icons">
                subject
                </span>
            </div>
            <span class="nav-link-text ms-1">Laporan Mahasiswa</span>
          </a>
        </li>


        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Master Data</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (Request::is('datamahasiswa') ? 'active bg-gradient-primary' : '') }}" href="{{ url('datamahasiswa') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg class="text-white" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Rounded-Icons" transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                            <g id="office" transform="translate(153.000000, 2.000000)">
                                <path class="color-background" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" id="Path" opacity="0.6"></path>
                                <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            </div>
            <span class="nav-link-text ms-1">Mahasiswa</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (Request::is('datadosen') ? 'active bg-gradient-primary' : '') }}" href="{{ url('datadosen') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg class="text-white" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>office</title>
                <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Rounded-Icons" transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                        <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                            <g id="office" transform="translate(153.000000, 2.000000)">
                                <path class="color-background" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" id="Path" opacity="0.6"></path>
                                <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            </div>
            <span class="nav-link-text ms-1">Dosen</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link text-white " href="./pages/notifications.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li> --}}
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white {{ (Request::is('akun') ? 'active bg-gradient-primary' : '') }}" href="{{ url('akun') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Akun</span>
          </a>
        </li>

</aside>
