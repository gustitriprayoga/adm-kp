<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
      @yield('judul')
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
          <div class="input-group input-group-outline">
            {{-- <label class="form-label">Type here...</label>
            <input type="text" class="form-control"> --}}
          </div>
        </div>
        <ul class="navbar-nav  justify-content-end">
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{auth()->user()->email}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
            </ul>
          </li>
          @else
          <li class="nav-item d-flex align-items-center">
            <a href="{{url('login')}}" class="nav-link text-body font-weight-bold px-0">
              <i class="fa fa-user me-sm-1"></i>
              <span class="d-sm-inline d-none">Login</span>
            </a>
          </li> 
          @endauth
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          
            
          </li>
        </ul>
      </div>
    </div>
  </nav>