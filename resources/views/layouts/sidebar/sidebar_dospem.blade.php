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
          <a class="nav-link text-white {{ (Request::is('profilmhs') ? 'active bg-gradient-primary' : '') }}" href="{{ url('profilmhs') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link text-white {{ (Request::is('pengajuan*') ? 'active bg-gradient-primary' : '') }}" href="{{ url('pengajuan') }}">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Pengajuan</span>
            </a>
        </li> --}}
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

        <li class="nav-item">
          <a class="nav-link text-white  {{ (Request::is('nilaimhs') ? 'active bg-gradient-primary' : '') }}" href="{{ url('nilaimhs') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Nilai</span>
          </a>
        </li>
        
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
          <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100" href="https://universitaspahlawan.ac.id/" type="button">Kunjingi Website UP</a>
          </div>
        </div>     
</aside>