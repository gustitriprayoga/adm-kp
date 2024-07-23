<a href="#"><i class="fas fa-user-edit text-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}"></i></a>

<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Mahasiswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="card-body">
            <form action="{{route('datamhs.update',$item->id)}}" method="post">
                {{csrf_field()}}
                <div class="input-group input-group-outline mb-3">
                <label class="form-label"></label>
                <input type="text" class="form-control"  name="nama_mhs" id="nama_mhs" aria-label="Name" aria-describedby="name" value="{{$item->nama_mhs}}">
                @error('nama_mhs')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="text " class="form-control"  name="nim" id="nim" aria-label="NIM"  value="{{$item->nim}}">
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="text" class="form-control"  name="no_wa" id="no_wa" aria-label="No Wa" value="{{$item->no_wa}}">
                </div>
                <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
      </div>
      </div>
    </div>
  </div>

