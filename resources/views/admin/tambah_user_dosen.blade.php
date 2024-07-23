@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Akun</li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah User Dosen</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Tambah User Dosen</h6>
  </nav>
@endsection

@if (auth()->user()->role == 'Admin')
@section('content')
<div class="container">
    <div class="card-header text-center bg-gradient-dark pt-4">
      <h5 class="text-white">Tambah Data Dosen</h5>
    </div>
    <div class="row px-xl-5 px-sm-4 px-3">
      
    
      
      <div class="mt-2 position-relative text-center">
        {{-- <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3"></p> --}}
      </div>
    </div>
    <div class="card-body">
      <form action="{{route('tambahuserdosen.store')}}" method="post">
        {{csrf_field()}}
        <div class="input-group input-group-outline mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control"  name="nama_dosen" id="nama_dosen" aria-label="Name" aria-describedby="name" value="{{ old('nama_dosen') }}">
          @error('nama_dosen')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">NIP</label>
            <input type="text" class="form-control"  name="nip" id="nip" aria-label="NIP" >
        </div>
        <div class="input-group input-group-outline mb-3">
          <select name="prodi_id" class="form-control bg-transparent" id="inlineFormCustomSelectPref">
    
            <option value="" >Pilih Prodi</option>
            @foreach ( $prodi as $item ) 
            <option value="{{$item->id}}">{{$item->prodi}}</option>
            @endforeach

          </select> 
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Nomor Whatsapp</label>
            <input type="text" class="form-control"  name="no_wa" id="no_wa" aria-label="No Wa" >
        </div>
        <div class="input-group input-group-outline mb-3">
          <select name="role" class="form-control bg-transparent" id="inlineFormCustomSelectPref">
            <option value="">Pilih Role</option>
            <option value="Ketua Prodi">Ketua Prodi</option>
            <option value="Dospem">Dosen Pembimbing</option>
            
          </select> 
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control"  name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
              @error('email')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
              @enderror
          </div>
          <div class="input-group input-group-outline mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control"  name="password" id="password" aria-label="Password" aria-describedby="password-addon">
              @error('password')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
              @enderror
          </div>
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</section>
@endsection
@endif

@if (auth()->user()->role == 'Staf')
@section('content')
<div class="container">
    <div class="card-header text-center bg-gradient-dark pt-4">
      <h5 class="text-white">Tambah Data Dosen</h5>
    </div>
    <div class="row px-xl-5 px-sm-4 px-3">
      
    
      
      <div class="mt-2 position-relative text-center">
        {{-- <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3"></p> --}}
      </div>
    </div>
    <div class="card-body">
      <form action="{{route('tambahuserdosen.store')}}" method="post">
        {{csrf_field()}}
        <div class="input-group input-group-outline mb-3">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control"  name="nama_dosen" id="nama_dosen" aria-label="Name" aria-describedby="name" value="{{ old('nama_dosen') }}">
          @error('nama_dosen')
            <p class="text-danger text-xs mt-2">{{ $message }}</p>
          @enderror
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">NIP</label>
            <input type="text" class="form-control"  name="nip" id="nip" aria-label="NIP" >
        </div>
        <div class="input-group input-group-outline mb-3">
          <select name="prodi_id" class="form-control bg-transparent" id="inlineFormCustomSelectPref">
    
            <option value="" >Pilih Prodi</option>
            @foreach ( $prodi as $item ) 
            <option value="{{$item->id}}">{{$item->prodi}}</option>
            @endforeach

          </select> 
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Nomor Whatsapp</label>
            <input type="text" class="form-control"  name="no_wa" id="no_wa" aria-label="No Wa" >
        </div>
        <div class="input-group input-group-outline mb-3">
          <select name="role" class="form-control bg-transparent" id="inlineFormCustomSelectPref">
            <option value="">Pilih Role</option>
            <option value="Dospem">Dosen Pembimbing</option>
          </select> 
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control"  name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
              @error('email')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
              @enderror
          </div>
          <div class="input-group input-group-outline mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control"  name="password" id="password" aria-label="Password" aria-describedby="password-addon">
              @error('password')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
              @enderror
          </div>
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</section>
@endsection
@endif