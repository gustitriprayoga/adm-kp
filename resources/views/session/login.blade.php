<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('/frontend/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('frontend/assets/img/favicon.png')}}">
    <title>
       ADMINISTRASI KERJA PRAKTIK
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{asset('frontend/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9ab5592416.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('frontend/assets/css/material-dashboard.css?v=3.0.0')}}" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
          <div class="col-12">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                <div class="container-fluid ps-2 pe-0">
                  <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
                    ADMINISTRASI KERJA PRAKTIK
                  </a>
                  <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon mt-2">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                    </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navigation">
                    <ul class="navbar-nav mx-auto">
                      <li class="nav-item">
                        
                      </li>
                      <li class="nav-item">
                        
                      </li>
                    </ul>
                    <ul class="navbar-nav d-lg-block d-none">
                      <li class="nav-item">
                        <a href="https://universitaspahlawan.ac.id/" class="btn btn-sm mb-0 me-1 bg-gradient-primary">WEBSITE UNIVERSITAS PAHLAWAN</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
            <!-- End Navbar -->
          </div>
        </div>
      </div>
      <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('frontend/assets/img/illustrations/curved6.jpg');">
          <span class="mask bg-gradient-dark opacity-6"></span>
          <div class="container my-auto ">
            <div class="row">
              <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <br>
                <br>
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-dark shadow-primary border-radius-lg py-3 pe-1">
                      <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login</h4>
                      <div class="row mt-3">
                        
                      </div>
                    </div>
                  </div>
                  
                  <div class="card-body">
                    <div>
                      @if (session('success'))
                      <div class="alert alert-success alert-dismissible text-white w-100 mt-0 mb-4" role="alert">
                         {{session('success')}} 
                      </div>
                      @endif
                    </div>
                    <form role="form" method="POST" action="{{route('loginn')}}">
                      @csrf
                      <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email"   aria-label="Email" aria-describedby="email-addon">
                        @error('email')
                          <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="input-group input-group-outline mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password"   aria-label="Password" aria-describedby="password-addon">
                        @error('password')
                          <p class="text-danger text-xs mt-2">{{ $message }}</p>
                        @enderror
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Login</button>
                      </div>
                      <p class="mt-4 text-sm text-center">
                        Don't have an account?
                        <a href="registrasi" class="text-primary text-gradient font-weight-bold">Registrasi</a>
                      </p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
              <div class="row align-items-center justify-content-lg-between">
                <div class="col-12 col-md-6 my-auto">
                  <div class="copyright text-center text-sm  text-white text-lg-start">
                    © <script class="text-white">
                        document.write(new Date().getFullYear())
                    </script>, Administrasi Kerja Praktik create by
                    <a  href="https://www.instagram.com/pangeranotdamadani/?hl=id" class="font-weight-bold text-white" target="_blank">Pangeran Otda Madani</a> 
                </div>
                </div>
                <div class="col-12 col-md-6">
                  
                  </ul>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </main>
    <!--   Core JS Files   -->
    <script src="{{asset('frontend/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('frontend/assets/js/material-dashboard.min.js?v=3.0.0')}}"></script>
  </body>


