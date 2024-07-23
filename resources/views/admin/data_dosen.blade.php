@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dosen</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Dosen</h6>
  </nav>
@endsection

@if (auth()->user()->role == 'Admin')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex flex-row justify-content-between">
                <div>
                  <h5 class="mb-0">DATA DOSEN</h5>
                </div>
              </div>
            </div>
            <div class="card-body ">
              <div class="table-responsive p-0">
                  <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Dosen</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIP</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor WA</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                 
                    
                  <tbody>
                    @foreach ($dosen as $item )
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          {{-- <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div> --}}
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->nama_dosen}}</h6>
                            {{-- <p class="text-xs text-secondary mb-0">Dosen Pembimbing</p> --}}
                          </div>
                        </div>
                      </td>
                      <td>
                        <h6 class="text-xs font-weight-bold mb-0">{{$item->nip}}</h6>
                        <p class="text-xs text-secondary mb-0">{{$item->prodi->prodi}}</p>

                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->no_wa}}</p>
                      </td>
                      <td class="text-middle">
                        <span>
                        
                        {{-- <span href="{{route('datadosen.edit',$item->id)}}" class="mx" data-bs-toggle="tooltip" data-bs-original-title="Edit user"> --}}
                            @include('admin.modal')
                        </span>
                        <span>
                          <a href="{{route('datadosen.delete',$item->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Delete">                                        
                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                          </a>
                        </span>
                        {{-- <span>
                          <i class="fa-solid fa-eye"></i>

                        </span> --}}
                    </td>
                    </tr>
                 
                    @endforeach
                  </tbody>
                  

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
@endsection
@endif

@if (auth()->user()->role == 'Staf')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex flex-row justify-content-between">
                <div>
                  <h5 class="mb-0">DATA DOSEN</h5>
                </div>
              </div>
            </div>
            <div class="card-body ">
              <div class="table-responsive p-0">
                  <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Dosen</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIP</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor WA</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                 
                    
                  <tbody>
                    @foreach ($dosen as $item )
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          {{-- <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div> --}}
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->nama_dosen}}</h6>
                            {{-- <p class="text-xs text-secondary mb-0">Dosen Pembimbing</p> --}}
                          </div>
                        </div>
                      </td>
                      <td>
                        <h6 class="text-xs font-weight-bold mb-0">{{$item->nip}}</h6>
                        <p class="text-xs text-secondary mb-0">{{$item->prodi->prodi}}</p>

                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->no_wa}}</p>
                      </td>
                      <td class="text-middle">
                        <span>
                        
                        {{-- <span href="{{route('datadosen.edit',$item->id)}}" class="mx" data-bs-toggle="tooltip" data-bs-original-title="Edit user"> --}}
                            @include('admin.modal')
                        </span>
                        <span>
                          <a href="{{route('datadosen.delete',$item->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Delete">                                        
                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                          </a>
                        </span>
                        {{-- <span>
                          <i class="fa-solid fa-eye"></i>

                        </span> --}}
                    </td>
                    </tr>
                 
                    @endforeach
                  </tbody>
                  

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
@endsection
@endif

@if (auth()->user()->role == 'Ketua Prodi')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <div class="d-flex flex-row justify-content-between">
                <div>
                  <h5 class="mb-0">DATA DOSEN</h5>
                </div>
              </div>
            </div>
            <div class="card-body ">
              <div class="table-responsive p-0">
                  <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Dosen</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIP</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor WA</th>
                    </tr>
                  </thead>
                 
                    
                  <tbody>
                    @foreach ($dosen as $item )
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          {{-- <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div> --}}
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->nama_dosen}}</h6>
                            {{-- <p class="text-xs text-secondary mb-0">Dosen Pembimbing</p> --}}
                          </div>
                        </div>
                      </td>
                      <td>
                        <h6 class="text-xs font-weight-bold mb-0">{{$item->nip}}</h6>
                        <p class="text-xs text-secondary mb-0">{{$item->prodi->prodi}}</p>

                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->no_wa}}</p>
                      </td>
                      
                    </tr>
                 
                    @endforeach
                  </tbody>
                  

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
@endsection
@endif