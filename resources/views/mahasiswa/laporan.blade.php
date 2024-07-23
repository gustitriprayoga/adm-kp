@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan Kerja Praktik</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Laporan Kerja Praktik</h6>
  </nav>
@endsection


@if (auth()->user()->role == 'Admin')
@section('content')
<div>
   

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Laporan</h5>
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
                                        <p class="text-xs font-weight-bold mb-0">1</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->dosen->nama_dosen}}</p>
                                    </td>
                                   
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->mhs->nama_mhs}}</p>
                                    </td>
                                    
                                    <td class="text-center text-sm">
                                        <a href="{{route('laporan.detail',$item->id)}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Detail</a>

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

@if (auth()->user()->role == 'Dospem')
@section('content')
<div>
    

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Laporan</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="">
                        <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder ">
                                        NO
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
                                            <p class="text-xs font-weight-bold mb-0">{{$item->mhs->nama_mhs}}</p>
                                        </td>
                                        
                                        <td class="align-middle text-center text-sm">
                                            <a href="{{route('laporan.detail',$item->id)}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Detail</a>
    
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

@if(session('Sukses'))
 <div class="alert alert-danger mx-4" role="alert">
        <span class="text-white">
            <strong>{{(session('Sukses'))}}</strong> 
        </span>
    </div>
@endif()
<div class="row">
    @if($danis->status=="Selesai")
    @else
  <div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title pb-3">Upload Laporan Kerja Praktik</h5>
            <form  method="POST" action="{{route('laporan.store')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            
            <div class="input-group input-group-outline mb-3">
                <label class="form-label"></label>
                <input type="date" class="form-control"  name="tgl" id="tgl" required >
            </div>
            <div class="input-group input-group-outline mb-3">
                <label class="form-label"></label>
                <input type="file" class="form-control"  name="laporankp" id="laporan"  required>
            </div>
            
            <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
  </div>
  @endif


 
  
    <div class="col-sm-12"> <br>
      <div class="card">
        <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">Laporan</h5>
                </div>
            </div>
        </div>
        <div class="card-body ">
                <div class="">
                    <table class="table align-items-center mb-0 display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-bolder ">
                                    NO
                                </th>
                                <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder ">
                                    Tanggal
                                </th>
                                
                                <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder ">
                                    File
                                </th>
                                <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder ">
                                    Catatan
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder ">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        
                            <tbody>
                                @foreach ($laporan as $item)
                                    
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->tgl}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->laporankp}}</p>
                                    </td>
                                    <td>
                                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                                        <textarea readonly class="form-control ckeditor" name="catatan" id="exampleFormControlTextarea1" rows="1">{{$item->catatan}}</textarea> 
                                        {{-- <textarea disabled class="form-control ckeditor" name="catatan" id="catatan" cols="30" rows="1">{{$item->catatan}}</textarea>  --}}
                                        

                                    </td>
                                    
                                    <td class=" text-left text-sm">
                                        <a href="{{URL::to('/')}}/laporankp/{{$item->laporankp}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Lihat</a>

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
                            <h5 class="mb-0">Laporan</h5>
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
                                        Nama Mahasiswa
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder ">
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
                                    
                                    <td class="text-center text-sm">
                                        <a href="{{route('laporan.detail',$item->id)}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Detail</a>

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