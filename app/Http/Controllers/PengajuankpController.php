<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Mahasiswa;
use App\Models\Pengajuankp;
use Illuminate\Http\Request;

class PengajuankpController extends Controller
{
    public function store(Request $request)
    {
        $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
        foreach($mhs as $item) {

        }       
        $new=new Pengajuankp;
        $new->mhs_id=$item->id;
        $new->tmpt=$request->input('tmpt');
        $new->tgl=$request->input('tgl');
        $new->status='Pending';
        $new->save();

        
       
        return redirect()->route('pengajuan');
    }

    public function status($id)
    {
        $kp=Pengajuankp::find($id);
        if ($kp){
            Pengajuankp::find($id)->update([
                'status'=>'Diterima'
            ]);
            
        }
        $cari = Mahasiswa::find($kp->mhs_id);
        if ($cari){
            $status = Mahasiswa::find($kp->mhs_id)->update([
                'status' => 'Berjalan'
            ]);
        }
        return redirect()->back();
    }

    public function status_tolak($id)
    {
        $kp=Pengajuankp::find($id);
        if ($kp){
            Pengajuankp::find($id)->update([
                'status'=>'Ditolak'
            ]);
            
        }
        return redirect()->back();
    }

    public function cetak($id)
    {
        
        $pengajuan=Pengajuankp::find($id);
        $pdf = PDF::loadview('mahasiswa.pengajuanpdf', ['cetakpdf', $pengajuan], compact('pengajuan'))->setpaper('A4', 'potrait');
        return $pdf->stream('Pengajuan_Kerja_Prakti.pdf');
    }
    
}
