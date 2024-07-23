@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Akun</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Akun</h6>
  </nav>
@endsection

@if (auth()->user()->role == 'Staf')
@section('content')
<div>
    

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Data Pengguna</h5>
                        </div>
                        <a href="{{route('tambahuserdosen')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                        NO
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder ">
                                        Email
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder ">
                                        Role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder ">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            @foreach ($user as $item )

                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                   
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->email}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->role}}</p>
                                    </td>
                                    
                                    <td class="align-middle text-center text-sm">
                                        <span>
                                            <a href="{{route('user.delete',$item->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Delete">                                        
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </a>
                                        </span>
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

@if (auth()->user()->role == 'Admin')
@section('content')
<div>
    

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Data Pengguna</h5>
                        </div>
                        <a href="{{route('tambahuserdosen')}}" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table id="example" class="table align-items-center mb-0 display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                        NO
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder ">
                                        Email
                                    </th>
                                    <th class="text-left text-uppercase text-secondary text-xs font-weight-bolder ">
                                        Role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder ">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            @foreach ($user as $item )

                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{$loop->iteration}}</p>
                                    </td>
                                   
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->email}}</p>
                                    </td>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">{{$item->role}}</p>
                                    </td>
                                    
                                    <td class="align-middle text-center text-sm">
                                        <span>
                                            <a href="{{route('user.delete',$item->id)}}" class="mx-1" data-bs-toggle="tooltip" data-bs-original-title="Delete">                                        
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </a>
                                        </span>
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

