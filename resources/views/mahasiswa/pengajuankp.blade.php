@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengajuan</li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Buat Pengajuan</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Pengajuan Kerja Praktik</h6>
  </nav>
@endsection
@section('content')

<div class="container">  
    <div class="card-header text-center  bg-gradient-dark pt-4">
      <h5 class="text-white">Pengajuan Kerja Praktik</h5>
    </div>
    <div class="row px-xl-5 px-sm-4 px-3">
        <div class="mt-2 position-relative text-center">
            {{-- <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3"></p> --}}
        </div>
    </div>
    <div class="card-body">
      <form action="{{route('pengajuan.store')}}" method="post "role="form text-left">
        
        <div class=" input-group input-group-outline mb-3">
          
          <input disabled type="text" class="form-control" value="{{$item->nama_mhs}}">
        </div>
        <div class="input-group input-group-outline mb-3">
          
          <input disabled type="text" class="form-control" value="{{$item->nim}}">
        </div>
        <div class="input-group input-group-outline mb-3">
          <label class="form-label"></label>
          <input type="date" class="form-control" name='tgl'>
        </div>
        <div class="input-group input-group-outline mb-3">
          <label class="form-label">Tempat Kerja Praktik</label>
          <input type="text" class="form-control" name='tmpt'>
        </div>   
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
</section>

@endsection