@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
  </nav>
@endsection

@if (auth()->user()->role == 'Admin')
@section('content')
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-header p-3 pt-2">
        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
          <i class="material-icons opacity-10">person</i>
        </div>
        <div class="text-end pt-1">
          <p class="text-sm mb-0 text-capitalize">User</p>
          <h4 class="mb-0">{{$user}}</h4>
        </div>
      </div>
      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">
      </div>
    </div>
  </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Dosen</p>
            <h4 class="mb-0">{{$dosen}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Mahasiswa</p>
            <h4 class="mb-0">{{$mhs}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
      </div>
    </div>
    
    {{-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">weekend</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Pengajuan</p>
            <h4 class="mb-0">{{$kp}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4"> <br> <br>
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">weekend</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Sedang Kerja Praktik</p>
            <h4 class="mb-0">{{$kpp}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
      </div>
    </div> --}}

  </div>
@endsection
@endif

@if (auth()->user()->role == 'Ketua Prodi')
@section('content')
<div class="row">
  
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Dosen</p>
            <h4 class="mb-0">{{$dosen}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Mahasiswa</p>
            <h4 class="mb-0">{{$mhs}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
      </div>
    </div>
  </div>
@endsection
@endif

@if (auth()->user()->role == 'Mahasiswa')
@section('content')
<h2 class="text-center">Selamat datang di Website administrasi kerja praktik</h2>
@endsection
@endif

@if (auth()->user()->role == 'Ketua Prodi')
@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Dosen</p>
            <h4 class="mb-0">{{$dosen}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Mahasiswa</p>
            <h4 class="mb-0">{{$mhs}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
      </div>
    </div>
  </div>
@endsection
@endif

@if (auth()->user()->role == 'Staf')
@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Dosen</p>
            <h4 class="mb-0">{{$dosen}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">person</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Mahasiswa</p>
            <h4 class="mb-0">{{$mhs}}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
        </div>
      </div>
    </div>
  </div>
@endsection
@endif