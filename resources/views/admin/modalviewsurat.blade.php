{{-- belum tampil menurut mahasiswa yang upload --}}
@if (auth()->user()->role == 'Mahasiswa')
<div class="modal fade" id="viewsurat{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Surat</h5>
          <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="row">
          <div class="col-sm-6">
              <div class="card-body text-center">
                <div>
                @if ( $item->upload($item->id) && $item->upload($item->id)['s_kp'] )
                <a target="_blank" href="{{URL::to('/')}}/surat_pengajuan/{{$item->upload($item->id)['s_kp']}}">
                  <img src="{{URL::to('/')}}/surat_pengajuan/{{$item->upload($item->id)['s_kp']}}" alt="Cinque Terre" width="300" height="520">
                </a>
        
                    @else
                        
                    @endif
                </div><br>
               
                

            </div>
          </div>
        
          <div class="col-sm-6">
              <div class="card-body text-center">
                <div>
                @if ( $item->upload($item->id) && $item->upload($item->id)['s_kp_balas'] )
                <a target="_blank" href="{{URL::to('/')}}/surat_balasan/{{$item->upload($item->id)['s_kp_balas']}}">
                  <img src="{{URL::to('/')}}/surat_balasan/{{$item->upload($item->id)['s_kp_balas']}}" alt="Cinque Terre" width="300" height="520">
                </a>
                    @else
                        
                    @endif
                </div><br>
                
              </div>
              
            
          </div> 

          <div class="modal-footer">
            
          </div>   
        </div>
        
      </div>
    </div>
</div>
@endif

@if (auth()->user()->role == 'Admin')
<div class="modal fade" id="viewsurat{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Surat</h5>
          <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="row">
          <div class="col-sm-6">
              <div class="card-body text-center">
                <div>
                @if ( $item->upload($item->id) && $item->upload($item->id)['s_kp'] )
                <a target="_blank" href="{{URL::to('/')}}/surat_pengajuan/{{$item->upload($item->id)['s_kp']}}">
                  <img src="{{URL::to('/')}}/surat_pengajuan/{{$item->upload($item->id)['s_kp']}}" alt="Cinque Terre" width="300" height="520">
                </a>
        
                    @else
                        
                    @endif
                </div><br>
                
                

            </div>
          </div>
        
          <div class="col-sm-6">
              <div class="card-body text-center">
                <div>
                @if ( $item->upload($item->id) && $item->upload($item->id)['s_kp_balas'] )
                <a target="_blank" href="{{URL::to('/')}}/surat_balasan/{{$item->upload($item->id)['s_kp_balas']}}">
                  <img src="{{URL::to('/')}}/surat_balasan/{{$item->upload($item->id)['s_kp_balas']}}" alt="Cinque Terre" width="300" height="520">
                </a>
                    @else
                        
                    @endif
                </div><br>
               
              
            
          </div> 

          <div class="modal-footer">
            
          </div>   
        </div>
        
      </div>
    </div>
</div>
</div>
@endif

@if (auth()->user()->role == 'Staf')
<div class="modal fade" id="viewsurat{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Surat</h5>
          <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="row">
          <div class="col-sm-6">
              <div class="card-body text-center">
                <div>
                @if ( $item->upload($item->id) && $item->upload($item->id)['s_kp'] )
                <a target="_blank" href="{{URL::to('/')}}/surat_pengajuan/{{$item->upload($item->id)['s_kp']}}">
                  <img src="{{URL::to('/')}}/surat_pengajuan/{{$item->upload($item->id)['s_kp']}}" alt="Cinque Terre" width="300" height="520">
                </a>
                    @else
                        
                    @endif
                </div><br>
            </div>
          </div>
          <div class="col-sm-6">
              <div class="card-body text-center">
                <div>
                @if ( $item->upload($item->id) && $item->upload($item->id)['s_kp_balas'] )
                <a target="_blank" href="{{URL::to('/')}}/surat_balasan/{{$item->upload($item->id)['s_kp_balas']}}">
                  <img src="{{URL::to('/')}}/surat_balasan/{{$item->upload($item->id)['s_kp_balas']}}" alt="Cinque Terre" width="300" height="520">
                </a>
                    @else
                        
                    @endif
                </div><br>
            </div>
           <div class="modal-footer">
          </div>   
        </div>
      </div>
    </div>
</div>
</div>
@endif






