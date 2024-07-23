@extends('layouts.main')
@section('judul')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Nilai</li>
      <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Detail Nilai</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Detail Nilai</h6>
  </nav>
@endsection

@if (auth()->user()->role == 'Dospem')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4 mx-4">
            <form action="{{route('nilai.store',$bimbingan->id)}}" method="post" >
                {{ csrf_field() }}
            <div class="card-header pb-0">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="mb-0">{{$bimbingan->mhs->nama_mhs}}</h5> 
                        
                    </div>
                    @if($nilai->isNotEmpty())
                    <button  type="submit" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Update Nilai</button>

                    @else
                    <button  type="submit" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; Simpan Nilai</button>

                    @endif

                </div>
            </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Komponen Nilai</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Range Nilai</th>
                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                    @if($nilai->isNotEmpty())
                    @foreach ($nilai as $item)
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">1</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Presentasi</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 20 </p>

                    </td>
                    <td class="text-center">
                        <div class="input-group input-group-outline">
                            <input class="from-control text-xs font-weight-bold mb-0" type="text" name="nilai_presentasi" value="{{$item->nilai_presentasi}}" style="width:15%">

                        </div>
                    </td>
                    
                   
                  </tr>
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Power Potin</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 20 </p>

                    </td>
                    <td class="text-center">
                        <div class="input-group input-group-outline">
                            <input class="from-control text-xs font-weight-bold mb-0" type="text" name="nilai_ppt" value="{{$item->nilai_ppt}}" style="width:15%" >

                        </div>
                    </td>
                    
                    
                  </tr>
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">3</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Project</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 35 </p>

                    </td>
                    <td class="text-center">
                        <div class="input-group input-group-outline">
                            <input class="from-control text-xs font-weight-bold mb-0 " type="text" name="nilai_project" value="{{$item->nilai_project}}" style="width:15%" >

                        </div>
                    </td>
                    
                    
                  </tr>
                  
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">4</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Nilai Laporan Kerja Praktik</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 25 </p>

                    </td>
                    <td class="text-center">
                        <div class="input-group input-group-outline">
                            <input class="from-control text-xs font-weight-bold mb-0" type="text" name="nilai_laporankp" value="{{$item->nilai_laporankp}}" style="width:15%" >

                        </div>
                    </td>
                    
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0"></p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Total</p>
                    
                    </td>
                    <td class="text-center">
                        
                    </td>
                    <td class="align-middle text-left text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$item->rata2}}</p>
                        

                    </td>
                    
                   
                  </tr>
                    
                   
                  

                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0"></p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Nilai Kerja Praktik</p>
                    
                    </td>
                    <td class="text-center">
                        
                    </td>
                    <td class="align-middle text-left text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$item->huruf}}</p>
                        

                    </td>
                    
                    
                   
                  </tr>
                    
                   
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">1</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Presentasi</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 20 </p>

                    </td>
                    <td class="text-center">
                        <div class="input-group input-group-outline">
                            <input class="from-control text-xs font-weight-bold mb-0" type="text" name="nilai_presentasi" style="width:15%">

                        </div>
                    </td>
                    
                   
                  </tr>
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Power Potin</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 20 </p>

                    </td>
                    <td class="text-center">
                        <div class="input-group input-group-outline">
                            <input class="from-control text-xs font-weight-bold mb-0" type="text" name="nilai_ppt" style="width:15%" >

                        </div>
                    </td>
                    
                    
                  </tr>
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">3</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Project</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 35 </p>

                    </td>
                    <td class="text-center">
                        <div class="input-group input-group-outline">
                            <input class="from-control text-xs font-weight-bold mb-0 " type="text" name="nilai_project" style="width:15%" >

                        </div>
                    </td>
                    
                    
                  </tr>
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">4</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Nilai Laporan Kerja Praktik</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 25 </p>

                    </td>
                    <td class="text-center">
                        <div class="input-group input-group-outline">
                            <input class="from-control text-xs font-weight-bold mb-0" type="text" name="nilai_laporankp" style="width:15%" >

                        </div>
                    </td>
                    
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0"></p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Total</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"> </p>

                    </td>
                    <td class="text-center">
                    </td>
                  </tr>

                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0"></p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Nilai Kerja Praktik</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"> </p>

                    </td>
                    <td class="text-center">
                        
                        
                        
                    </td>
                  </tr>
                    
                   
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
    

</div>
@endsection
@endif

@if (auth()->user()->role == 'Mahasiswa')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4 mx-4">
                {{ csrf_field() }}
            <div class="card-header pb-0">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="mb-0">Nilai</h5> 
                        
                    </div>

                </div>
            </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Komponen Nilai</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Range Nilai</th>
                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder ps-2 opacity-7">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                    
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">1</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Presentasi</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 20 </p>

                    </td>
                    <td class="text-left">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->nilai_presentasi}}</p>

                    </td>
                    
                   
                  </tr>
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Power Potint</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 20 </p>
                    </td>
                    <td class="text-left">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->nilai_ppt}}</p>
                    </td>
                  </tr>

                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">3</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Project</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 35 </p>
                    </td>
                    <td class="text-left">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->nilai_project}}</p>
                    </td>
                  </tr>

                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">4</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Nilai Laporan Kerja Praktik</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 25 </p>
                    </td>
                    <td class="text-left">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->nilai_laporankp}}</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0"></p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Total</p>                    
                    </td>
                    <td class="align-middle text-center text-sm">
                    </td>
                    <td class="align-middle text-left text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->rata2}}</p>
                    </td>
                    
                  </tr>

                <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0"></p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Nilai Kerja Praktik</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"> </p>
                    </td>
                    <td class="text-left">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->huruf}}</p>  
                    </td>
                </tr>
                
                    
                   

                  
            
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

@if (auth()->user()->role == 'Staf')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4 mx-4">
                {{ csrf_field() }}
            <div class="card-header pb-0">
                <div class="d-flex flex-row justify-content-between">
                    <div>
                        <h5 class="mb-0">{{$nilai->mhs->nama_mhs}}</h5> 

                        
                    </div>

                </div>
            </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Komponen Nilai</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Range Nilai</th>
                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder ps-2 opacity-7">Nilai</th>
                  </tr>
                </thead>
                <tbody>
                    
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">1</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Presentasi</p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 20 </p>

                    </td>
                    <td class="text-left">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->nilai_presentasi}}</p>

                    </td>
                    
                   
                  </tr>
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">2</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Power Potin</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 20 </p>
                    </td>
                    <td class="text-left">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->nilai_ppt}}</p>
                    </td>
                  </tr>

                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">3</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Project</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 35 </p>
                    </td>
                    <td class="text-left">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->nilai_project}}</p>
                    </td>
                  </tr>

                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0">4</p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Nilai Laporan Kerja Praktik</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">1 - 25 </p>
                    </td>
                    <td class="text-left">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->nilai_laporankp}}</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0"></p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Total</p>                    
                    </td>
                    <td class="align-middle text-center text-sm">
                    </td>
                    <td class="align-middle text-left text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->rata2}}</p>
                    </td>
                    
                  </tr>

                <tr>
                    <td class="ps-4">
                        <p class="text-xs font-weight-bold mb-0"></p>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0">Nilai Kerja Praktik</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"> </p>
                    </td>
                    <td class="text-left">
                        <p class="text-xs font-weight-bold mb-0">{{$nilai->huruf}}</p>  
                    </td>
                </tr>
                    
                   

                  
            
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