<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Laporan;
use App\Models\Bimbingan;
use App\Models\Logbook;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class LaporankpController extends Controller
{
    public function detaill()
    {
        $dosen=Dosen::where('id_user',auth()->user()->id)->get();
        foreach ($dosen as $item)
        $bimbingan=Bimbingan::where('dosen_id', $item->id)->latest()->get();
        foreach ($bimbingan as $BIMBINGAN)
        $laporan=Laporan::where('bimbingan_id', $BIMBINGAN->id)->get();
        return view('laporan.ka_detail_laporankp', compact('bimbingan', 'laporan', 'BIMBINGAN'));
    }

    public function laporann()
    {
        $dosen=Dosen::where('id_user',auth()->user()->id)->get();
        foreach ($dosen as $item)
        $bimbingan=Bimbingan::where('dosen_id', $item->id)->latest()->get();
        return view('laporan.ka_laporanmhs', compact('bimbingan')); 
    }
    public function detail($id)
    {
        
        if(auth()->user()->role =='Dospem'){
        $dosen=Dosen::where('id_user',auth()->user()->id)->get();
        foreach ($dosen as $item)
        $BIMBINGAN=Bimbingan::find($id);
        $laporan=Laporan::where('bimbingan_id', $BIMBINGAN->id)->get();
        return view('mahasiswa.detail_laporankp', compact('laporan', 'BIMBINGAN'));
        }
        elseif(auth()->user()->role =='Admin'){
            $BIMBINGAN=Bimbingan::find($id);
            $laporan=Laporan::where('bimbingan_id', $BIMBINGAN->id)->get();
            return view('mahasiswa.detail_laporankp', compact('laporan', 'BIMBINGAN'));
        }  
        elseif(auth()->user()->role =='Ketua Prodi'){
            $BIMBINGAN=Bimbingan::find($id);
            $laporan=Laporan::where('bimbingan_id', $BIMBINGAN->id)->get();
            return view('mahasiswa.detail_laporankp', compact('laporan', 'BIMBINGAN'));
        }
    }
    public function laporan()
    {
        if(auth()->user()->role =='Mahasiswa'){
                $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
                foreach ($mhs as $danis)
                $bimbingan=Bimbingan::where('mhs_id',$danis->id)->get();
    
            if ($bimbingan->isNotEmpty()){
                $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
                foreach ($mhs as $danis)
                $bimbingan=Bimbingan::where('mhs_id',$danis->id)->get();
                foreach ($bimbingan as $dani)
                $laporan=Laporan::where('bimbingan_id', $dani->id)->get();
                return view ('mahasiswa.laporan', compact('laporan','danis'));

            } else{
                return redirect()->route('pengajuan');

            }  
       
        } 
        elseif (auth()->user()->role =='Admin'){
        $bimbingan=Bimbingan::all();
        return view ('mahasiswa.laporan', compact('bimbingan'));
        } 
        elseif (auth()->user()->role =='Dospem'){
        $dosen=Dosen::where('id_user',auth()->user()->id)->get();
        foreach ($dosen as $item)
        $bimbingan=Bimbingan::where('dosen_id', $item->id)->latest()->get();
        return view('mahasiswa.laporan', compact('bimbingan')); 
        }
        elseif (auth()->user()->role =='Ketua Prodi'){
        $bimbingan=Bimbingan::latest()->get();
        return view ('mahasiswa.laporan', compact('bimbingan'));
        }
    }

    public function store(Request $request)
    {
        $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
        foreach ($mhs as $item)
        $bimbingan=Bimbingan::where('mhs_id', $item->id)->get();
        foreach ($bimbingan as $item2)
        $count=Logbook::where('bimbingan_id', $item2->id)->where('paraf', 'Diparaf')->count();
        // dd($count);
        if($count >=3){
        $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
        foreach ($mhs as $danis)
        $bimbingan=Bimbingan::where('mhs_id',$danis->id)->get();
        foreach ($bimbingan as $dani)
        $new= new Laporan;
        $new->bimbingan_id=$dani->id;
        $new->tgl=$request->tgl;
        $file=$request->file('laporankp');
        $random=time().rand(100,999).".".$file->getClientOriginalExtension();
        $fileName   = 'laporankp-'. $danis->nama_mhs.'-'.$random;
        $file->move('laporankp/', $fileName);
        $new->laporankp=$fileName;
        $new->save();
        return redirect()->back(); 
        }
        else{
            return redirect()->back()->with('Sukses', 'Anda belum bisa upload laporan, karena belum memenuhi syarat jumlah paraf logbook minimal 20 paraf!!!');
        }
    }

    public function catatan(Request $request, $id)
    {
        // dd($request->all());
        $laporan=Laporan::find($id);
        $laporan->update($request->all());
        return redirect()->back();
    }
}
