@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Logbook</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Logbook</h6>
  </nav>
@endsection

@if (auth()->user()->role == 'Admin')
@section('content')
<div>
    {{-- <div class="alert alert-dark mx-4" role="alert">
        <span class="text-white">
            <strong>Mantap</strong> 
        </span>
    </div> --}}

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Logbook</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-0">
                        <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder ">
                                        NO
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder ">
                                        Dosen Pembimbing
                                    </th>
                                    
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder ">
                                        Nama
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder ">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bimbingan as $item)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->dosen->nama_dosen}}</p>
                                    </td>
                                   
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->mhs->nama_mhs}}</p>
                                    </td>
                                    
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{route('logbook.detail',$item->id)}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Detail</i></a>

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
@endsection
@endif

@if (auth()->user()->role == 'Mahasiswa')
@section('content')
<div>
    

    <div class="row">
        <div class="col-8" >
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            @foreach ($bimbingans as $item)
                            <h5 class="mb-0">Logbook</h5>
                           
                            <p>Dosen Pembimbing : {{$item->dosen->nama_dosen}}</p> 
                           
                            @endforeach

                        </div>
                        <div>
                            <a href="{{route('buatlogbook')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Logbook Harian</a>

                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        NO
                                    </th>
                                    
                                    
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kegiatan 
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Deskripsi 
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Dokumentasi
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal 
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Paraf
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logbook as $item )
                                    
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->kegiatan}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->deskripsi}}</p>
                                    </td>
                                    <td class="text-center">
                                        <div>
                                            <a target="blank" href="{{URL::to('/')}}/dokumentasi/{{$item->dokumentasi}}">
                                                <img  src="{{URL::to('/')}}/dokumentasi/{{$item->dokumentasi}}" class="avatar-sm me-3">
                                            </a>
                                        
                                            <a target="blank" href="{{URL::to('/')}}/dokumentasi2/{{$item->dokumentasi2}}">
                                                <img  src="{{URL::to('/')}}/dokumentasi2/{{$item->dokumentasi2}}" class="avatar-sm me-3">
                                            </a>
                                        </div> 
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{$item->tgl}}</span>
                                    </td>
                                    <td class=" text-center text-sm">
                                           @if ($item->paraf==null)
                                           Belum diparaf
                                           @else
                                           {{$item->paraf}}
                                           @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container col-4" >
            <div id="app">
                @foreach ($chat as $item)
                <div class="message-group-received">
                  <div>
                    <div class="message-received">
                      <div class="message-received-text">
                        @if($item->user($item->user) && $item->user($item->user)['role']) 
                            {{$item->user($item->user)->role}} :
                        @endif 
                        {{$item->chat}}
                      </div>
                    </div>
                  </div>
                </div>
                
                {{-- <div class="message-group-sent">
                  <div class="message-sent">
                    <div class="message-sent-text">
                    {{$item->chat}}
                    </div>
                  </div>
                </div> --}}
                @endforeach
                
               
            </div>
            <div id="colom-chat">
                @foreach ($bimbingans as $item)

                <form action="{{route('chat.post', $item->dosen->id_user)}}" method="post">
                @endforeach

                    {{ csrf_field() }}
                    <input type="hidden" name="bimbingan_id" value="{{$item->id}}">
                    <input class="chat" type="text" name="chat">
                    <button class="tombol" type="submit"> Kirim</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
@endif

@if (auth()->user()->role == 'Dospem')
@section('content')
<div>
    

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Logbook</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-0">
                        <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        NO
                                    </th>
                                    
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Nama
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bimbingan as $item)
                                    
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                   
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->mhs->nama_mhs}}</p>
                                    </td>
                                    
                                    <td class="text-left text-sm">
                                        <a href="{{route('logbook.detail', $item->id)}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Detail</a>
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
@endsection
@endif

@if (auth()->user()->role == 'Ketua Prodi')
@section('content')
<div>
    

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Logbook</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-0">
                        <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        NO
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Dosen Pembimbing
                                    </th>
                                    
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Nama
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>
                                @foreach ($bimbingan as $item)
                                @if($item->viewprodi($item->dosen_id) && $item->viewprodi($item->dosen_id))
                                <?php $no++ ;?>
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$no}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->dosen->nama_dosen}}</p>
                                    </td>
                                   
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->mhs->nama_mhs}}</p>
                                    </td>
                                    
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{route('logbook.detail',$item->id)}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Detail</a>

                                    </td>
                                </tr>
                                @endif
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif