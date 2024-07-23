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

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
          <div class="col-12">
            <!-- Navbar -->
            
                
            <!-- End Navbar -->
          </div>
        </div>
      </div>
      <main class="main-content  mt-0">
        <section>
          <div class="page-header min-vh-100">
            <div class="container">
              <div class="row">
                <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                  <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('frontend/assets/img/illustrations/curved6.jpg'); background-size: cover;">
                  </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                  <div class="card card-plain">
                    <div class="card-header">
                      <h4 class="font-weight-bolder">Registrasi</h4>
                      <p class="mb-0">Silahkan isi form Registrasi</p>
                    </div>
                    <div class="card-body">
                      <form  method="POST" action="{{route('registrasi')}}">
                        {{csrf_field()}}
                        <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Nama</label>
                          <input type="text" class="form-control"  name="nama_mhs" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}" >
                          @error('nama_mhs')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                          @enderror
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">NIM</label>
                            <input type="text" class="form-control"  name="nim" id="nim" aria-label="Name" >
                        </div>
                        <div class="input-group input-group-outline mb-3">
                          <select name="prodi_id" class="form-control bg-transparent" id="inlineFormCustomSelectPref" >
                    
                            <option value="" >Pilih Prodi</option>
                            @foreach ( $prodi as $item ) 
                            <option value="{{$item->id}}">{{$item->prodi}}</option>
                            @endforeach
        
                          </select> 
                        </div>
                        <div class="input-group input-group-outline mb-3">
                          <label class="form-label" >Nomor Whatsapp</label>
                          <input type="text" class="form-control"  name="no_wa" id="no_wa" aria-label="Name" >
                        </div>
                        <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Email</label>
                          <input type="email" class="form-control"  name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}" >
                            @error('email')
                              <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="hidden" name="role" value="Mahasiswa">
                        <div class="input-group input-group-outline mb-3">
                          <label class="form-label">Password</label>
                          <input type="password" class="form-control"  name="password" id="password" aria-label="Password" aria-describedby="password-addon" >
                            @error('password')
                              <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="text-center">
                          <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                        </div>
                      </form>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                      <p class="mb-2 text-sm mx-auto">
                        Already have an account?
                        <a href="login" class="text-primary text-gradient font-weight-bold">Login</a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
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


