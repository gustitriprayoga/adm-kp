@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan</li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Laporan</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Detail Laporan</h6>
  </nav>
@endsection

@if (auth()->user()->role == 'Dospem')
@section('content')
<div class="row">
<div class="col-sm-12"> <br>
    <div class="card">
      <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
              <div>
                  <h5 class="mb-0">{{$BIMBINGAN->mhs->nama_mhs}}</h5>
              </div>
          </div>
      </div>
      
      <div class="card-body ">
              <div class="">
                  <table class="table  mb-0 display nowrap" style="width:100%">
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
                                      <form action="{{route('laporan.catatan', $item->id)}}" method="post">
                                          {{ csrf_field() }}
                                          <label for="exampleFormControlTextarea1" class="form-label"></label>
                                          <textarea class="form-control ckeditor" name="catatan" id="exampleFormControlTextarea1" rows="1">{{$item->catatan}}</textarea> 
                                          {{-- <textarea name="catatan" class="catatan" id="catatan" cols="30" rows="10">ghghghg</textarea> --}}
                                      <br>
                                        <button type="submit" class="btn btn-outline-info badge badge-sm bg-gradient-info simpan">Kirim</button>
                                      </form>

                                     
                                      

                                  </td>
                                  
                                  <td class="  text-sm">
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
   
@section('scripts')

{{-- <script>
    $('.simpan').click(function(){
        let catatan = $('.catatan').val()
        let id = $(this).attr('data-id')

        $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        url: "{{route('laporan.catatan')}}",
        data: {
            catatan : catatan,
            id : id,
        },
        success: function (res) {

        }

        });
    });
    // $(document).on('click', '#simpan', function(){
        
    // })

    
</script> --}}
@endsection

@endif

@if (auth()->user()->role == 'Admin')
@section('content')
<div class="row">
<div class="col-sm-12"> <br>
    <div class="card">
      <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
              <div>
                  <h5 class="mb-0">{{$BIMBINGAN->mhs->nama_mhs}}</h5>
              </div>
          </div>
      </div>
      <div class="card-body ">
              <div class="">
                  <table class="table  mb-0 display nowrap" style="width:100%">
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
                                      
                                      

                                  </td>
                                  
                                  <td class="  text-sm">
                                      <a target="_blank" href="{{URL::to('/')}}/laporankp/{{$item->laporankp}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Lihat</a>

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
<div class="row">
<div class="col-sm-12"> <br>
    <div class="card">
      <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
              <div>
                  <h5 class="mb-0">{{$BIMBINGAN->mhs->nama_mhs}}</h5>
              </div>
          </div>
      </div>
      <div class="card-body ">
              <div class="">
                  <table class="table  mb-0 display nowrap" style="width:100%">
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
                                      
                                  </td>
                                  
                                  <td class="  text-sm">
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