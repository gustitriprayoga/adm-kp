@extends('layouts.main')

@section('content')
<div class="container">
    <div class="card-header text-center bg-gradient-dark pt-4">
      <h5 class="text-white">Tambha Data Dosen</h5>
    </div>
    <div class="row px-xl-5 px-sm-4 px-3">
      
    
      
      <div class="mt-2 position-relative text-center">
        {{-- <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3"></p> --}}
      </div>
    </div>
    <div class="card-body">
      <form action="" method="post "role="form text-left">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">NIP</label>
            <input type="text" class="form-control">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Nomor Whatsapp</label>
            <input type="text" class="form-control">
        </div>
        
        <div class="text-center">
          <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</section>
@endsection