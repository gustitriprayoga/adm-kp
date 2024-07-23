@if (auth()->user()->role == 'Admin')
@include('layouts.sidebar.sidebar_admin')
@endif

@if (auth()->user()->role == 'Mahasiswa')
@include('layouts.sidebar.sidebar_mhs')
@endif

@if (auth()->user()->role == 'Dospem')
@include('layouts.sidebar.sidebar_dospem')
@endif

@if (auth()->user()->role == 'Ketua Prodi')
@include('layouts.sidebar.sidebar_kaprodi')
@endif

@if (auth()->user()->role == 'Staf')
@include('layouts.sidebar.sidebar_staf')
@endif

