@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Mahasiswa</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Mahasiswa</h6>
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
                  <h5 class="mb-0">DATA MAHASISWA</h5>
                </div>
                
              </div>
            </div>
            <div class="card-body ">
              <div class="table-responsive p-0">
                  <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIM</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor Whatsapp</th>
                      {{-- <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th> --}}
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Kerja Praktik</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Laporan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($mhs as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          {{-- <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div> --}}
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->nama_mhs}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->nim}}</p>
                        <p class="text-xs text-secondary mb-0">{{$item->prodi->prodi}}</p>
                      </td>
                      <td class="align-middle text-left text-sm">
                        <span class="mb-0 text-sm">{{$item->no_wa}}</span>
                      </td>

                      

                      <td class="align-middle text-left text-sm">
                        <span class="mb-0 text-sm">{{$item->status}}</span>
                      </td>

                      <td class="align-middle text-left text-sm">
                        @if($item->status=="Selesai")
                          
                        <a target="_blank" href="{{URL::to('/')}}/laporankp/{{$item->laporan($item->id)->laporankp}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Lihat</a>
                        @endif
                      </td>
                      {{-- <td class="align-middle text-left text-sm">
                        <span class="badge badge-sm bg-gradient-success">SEDANG KP</span>
                      </td> --}}
                     
                      <td class="text-middle">
                        <span>
                         @include('admin.edit_mhs')
                        </a>
                        </span>
                        <span>
                        <a href="{{route('datamhs.delete',$item->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Delete">                                        
                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                        </a>
                        </span>
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
                  <h5 class="mb-0">DATA MAHASISWA</h5>
                </div>
                
              </div>
            </div>
            <div class="card-body ">
              <div class="table-responsive p-0">
                  <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIM</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor Whatsapp</th>
                      {{-- <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th> --}}
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Kerja Praktik</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Laporan</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($mhs as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          {{-- <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div> --}}
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->nama_mhs}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->nim}}</p>
                        <p class="text-xs text-secondary mb-0">{{$item->prodi->prodi}}</p>
                      </td>
                      <td class="align-middle text-left text-sm">
                        <span class="mb-0 text-sm">{{$item->no_wa}}</span>
                      </td>
                      {{-- <td class="align-middle text-left text-sm">
                        <span class="badge badge-sm bg-gradient-success">SEDANG KP</span>
                      </td> --}}
                      <td class="align-middle text-left text-sm">
                        <span class="mb-0 text-sm">{{$item->status}}</span>
                      </td>

                      <td class="align-middle text-left text-sm">
                        @if($item->status=="Selesai")
                          
                        <a target="_blank" href="{{URL::to('/')}}/laporankp/{{$item->laporan($item->id)->laporankp}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Lihat</a>
                        @endif
                      </td>
                     
                      <td class="text-middle">
                        <span>
                         @include('admin.edit_mhs')
                        </a>
                        </span>
                        <span>
                        <a href="{{route('datamhs.delete',$item->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Delete">                                        
                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                        </a>
                        </span>
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
                  <h5 class="mb-0">DATA MAHASISWA</h5>
                </div>
                
              </div>
            </div>
            <div class="card-body ">
              <div class="table-responsive p-0">
                  <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Mahasiswa</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIM</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor Whatsapp</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Kerja Praktik</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Laporan</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($mhs as $item)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          {{-- <div>
                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="user1">
                          </div> --}}
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$item->nama_mhs}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$item->nim}}</p>
                        <p class="text-xs text-secondary mb-0">{{$item->prodi->prodi}}</p>
                      </td>
                      <td class="align-middle text-left text-sm">
                        <span class="mb-0 text-sm">{{$item->no_wa}}</span>
                      </td>
                      {{-- <td class="align-middle text-left text-sm">
                        <span class="badge badge-sm bg-gradient-success">SEDANG KP</span>
                      </td> --}}
                      <td class="align-middle text-left text-sm">
                        <span class="mb-0 text-sm">{{$item->status}}</span>
                      </td>

                      <td class="align-middle text-left text-sm">
                        @if($item->status=="Selesai")
                          
                        <a target="_blank" href="{{URL::to('/')}}/laporankp/{{$item->laporan($item->id)->laporankp}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Lihat</a>
                        @endif
                     
                      
                    </tr>
                    @endforeach
                    
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </main>

@endsection
@endif
