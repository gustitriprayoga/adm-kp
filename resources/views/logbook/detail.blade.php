@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Logbook</li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Detail</h6>
  </nav>
@endsection


@if (auth()->user()->role == 'Dospem')
@section('content')
<div>
    <div class="row">
        <div class="col-8">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{$bimbingan->mhs->nama_mhs}}</h5> 
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
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Deskripsi 
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Kegiatan 
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Dokumentasi
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Tanggal 
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Action
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
                                    <td class="align-middle text-center text-sm">
                                        @if ($item->paraf==null)
                                        <a href="{{route('buatlogbook.paraf',$item->id)}}" class="btn btn-outline-success badge badge-sm bg-gradient-success">Paraf</a>
                                           
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
                @foreach ($logbook as $item)
    
                <form action="{{route('chat.post', $item->bimbingan->mhs_id)}}" method="post">
                    {{ csrf_field() }}
                @endforeach
                    <input type="hidden" name="bimbingan_id" value="{{$id}}">
                    <input class="chat" type="text" name="chat">
                    <button class="tombol" type="submit"> Kirim</button>
                </form>
            </div>
        </div>
    </div>

    

</div>
@endsection
@endif

@if (auth()->user()->role == 'Admin')
@section('content')
<div>
   
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">{{$bimbingan->mhs->nama_mhs}}</h5> 
                                
                            {{-- <h5 class="mb-0">{{$item->bimbingan->mhs->nama_mhs}}</h5> --}}
                            
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
                                        Deskripsi 
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Kegiatan 
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Dokumentasi
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Tanggal 
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
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
                                    <td class="align-middle text-center text-sm">
                                        
                                            {{$item->paraf}}
                                        
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
                                
                            <h5 class="mb-0">{{$bimbingan->mhs->nama_mhs}}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        NO
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Deskripsi 
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Kegiatan 
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Dokumentasi
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Tanggal 
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
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
                                    <td class="align-middle text-center text-sm">
                                        
                                            {{$item->paraf}}
                                        
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