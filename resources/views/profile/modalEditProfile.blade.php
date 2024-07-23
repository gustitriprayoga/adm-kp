<!-- Button trigger modal -->
<i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="modal" data-bs-target="#editprofile{{$user->id}}" title="Edit Profile"></i>
<i class="fa fa-key text-secondary text-sm" data-bs-toggle="modal" data-bs-target="#changePassword{{$user->id}}" title="Change Password"></i>


<!-- Modal -->
@if (auth()->user()->role == 'Admin')
<div class="modal fade" id="editprofile{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="{{route('updateprofile', $user->id)}}" method="post">{{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="changePassword{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="{{route('update_password', $user->id)}}" method="post">{{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" class="form-control" name="current_password">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" name="new_password" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endif

<!-- Modal -->
@if (auth()->user()->role == 'Staf')
<div class="modal fade" id="editprofile{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="{{route('updateprofile', $user->id)}}" method="post">{{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="changePassword{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="{{route('update_password', $user->id)}}" method="post">{{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" class="form-control" name="current_password">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" name="new_password" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endif

<!-- Modal -->
@if (auth()->user()->role == 'Dospem')
<div class="modal fade" id="editprofile{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="{{route('updateprofile', $user->id)}}" method="post">{{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama_dosen" value="{{$dosen->nama_dosen}}">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">NIP</label>
            <input type="text" class="form-control" name="nip" value="{{$dosen->nip}}">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">No. Hp</label>
            <input type="text" class="form-control" name="no_wa" value="{{$dosen->no_wa}}">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="changePassword{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="{{route('update_password', $user->id)}}" method="post">{{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" class="form-control" name="current_password">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" name="new_password" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endif


<!-- Modal -->
@if (auth()->user()->role == 'Mahasiswa')
<div class="modal fade" id="editprofile{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="{{route('updateprofile', $user->id)}}" method="post">{{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama_mhs" value="{{$mahasiswa->nama_mhs}}">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">NIP</label>
            <input type="text" class="form-control" name="nim" value="{{$mahasiswa->nim}}">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">No. Hp</label>
            <input type="text" class="form-control" name="no_wa" value="{{$mahasiswa->no_wa}}">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="changePassword{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="{{route('update_password', $user->id)}}" method="post">{{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" class="form-control" name="current_password">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" name="new_password" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endif

@if (auth()->user()->role == 'Ketua Prodi')
<div class="modal fade" id="editprofile{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="{{route('updateprofile', $user->id)}}" method="post">{{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama_dosen" value="{{$dosen->nama_dosen}}">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">NIP</label>
            <input type="text" class="form-control" name="nip" value="{{$dosen->nip}}">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">No. Hp</label>
            <input type="text" class="form-control" name="no_wa" value="{{$dosen->no_wa}}">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$user->email}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="changePassword{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
        <form action="{{route('update_password', $user->id)}}" method="post">{{csrf_field()}}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" class="form-control" name="current_password">
        </div>
        <div class="input-group input-group-outline mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" name="new_password" >
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
@endif

