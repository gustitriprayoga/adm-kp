@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Nilai</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Nilai</h6>
  </nav>
@endsection

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
                                    
                                    <td class="align-middle text-left text-sm">
                                        <a href="{{route('ka.nilai.detail',$item->id)}}" class="btn btn-outline-success badge badge-sm bg-gradient-success" type="button">Detail</a>

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
