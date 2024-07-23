<?php

namespace App\Http\Controllers;

use App\Models\Dosen;

use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use App\Models\Nilaikps;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function indexx()
    {
        $dosen=Dosen::where('id_user',auth()->user()->id)->get();
        foreach ($dosen as $item)
        $bimbingan=Bimbingan::where('dosen_id', $item->id)->latest()->get();
        return view('nilai.ka_nilaimhs', compact('bimbingan'));
    }

    public function detaill($id)
    {
        $bimbingan=Bimbingan::find($id);
        $nilai=Nilaikps::where('dosen_id', $bimbingan->dosen_id)->where('mhs_id', $bimbingan->mhs_id)->get();
        return view ('nilai.ka_detail', compact( 'bimbingan', 'nilai' ));
    }

    public function index()
    {
        if (auth()->user()->role == 'Dospem'){
        $dosen=Dosen::where('id_user',auth()->user()->id)->get();
        foreach ($dosen as $item)
        $bimbingan=Bimbingan::where('dosen_id', $item->id)->latest()->get();
        return view('nilai.nilaimhs', compact('bimbingan'));
        } 
        elseif(auth()->user()->role == 'Staf'){
            $nilai=Nilaikps::where('prodi_id', auth()->user()->prodi_id)->latest()->get();
        return view('nilai.nilaimhs', compact('nilai'));

        } 
        elseif(auth()->user()->role == 'Mahasiswa'){
                $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
                foreach ($mhs as $item)
                $nl=Nilaikps::where('mhs_id', $item->id)->get();
            if ($nl->isNotEmpty()){
                $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
                foreach ($mhs as $item)
                $nl=Nilaikps::where('mhs_id', $item->id)->get();
                foreach ($nl as $nilai)
                return view('nilai.detail', compact('nilai'));
            } else{
                return redirect()->route('logbook');

            }

           
        }
        
        
       
    }

    public function detail($id)
    {
        if (auth()->user()->role == 'Staf'){
        $nilai=Nilaikps::find($id);
        return view ('nilai.detail', compact('nilai'));
        }else{
            $bimbingan=Bimbingan::find($id);
            $nilai=Nilaikps::where('dosen_id', $bimbingan->dosen_id)->where('mhs_id', $bimbingan->mhs_id)->get();
            return view ('nilai.detail', compact( 'bimbingan', 'nilai' ));

        }


    }

    public function store(Request $request, $id)
    {
        $bimbingan=Bimbingan::find($id);
        $nilai=Nilaikps::where('dosen_id', $bimbingan->dosen_id)->where('mhs_id', $bimbingan->mhs_id)->get();
        if ($nilai->isNotEmpty()){
            $bimbingan=Bimbingan::find($id);
            $nilai_referen=Nilaikps::where('dosen_id', $bimbingan->dosen_id)->where('mhs_id', $bimbingan->mhs_id)->get();
            foreach ($nilai_referen as $referen)
            $nilai = Nilaikps::find($referen->id);
            $nilai->dosen_id=$bimbingan->dosen_id;
            $nilai->mhs_id=$bimbingan->mhs_id;
            $nilai->nilai_presentasi=$request->input('nilai_presentasi');
            $nilai->nilai_ppt=$request->input('nilai_ppt');
            $nilai->nilai_project=$request->input('nilai_project');
            $nilai->nilai_laporankp=$request->input('nilai_laporankp');
        $jumlah = $nilai->nilai_presentasi + $nilai->nilai_ppt + $nilai->nilai_project + $nilai->nilai_laporankp;
        if(($jumlah >= 89) && ($jumlah <= 100)){
        $huruf = "A";
        }elseif( ($jumlah >= 71) && ($jumlah <= 88)){
            $huruf = "B";
        }elseif( ($jumlah >= 61) && ($jumlah <= 70)){
            $huruf = "C";
        }elseif( ($jumlah >= 51) && ($jumlah <= 60)){
            $huruf = "D";
        }elseif( ($jumlah >= 0) && ($jumlah <= 50)){
            $huruf = "E";
        }
        $nilai->rata2 = $jumlah;
        $nilai->huruf=$huruf;
            $nilai->update();
        return redirect()->back();
    

        }else{
        $nilai=new Nilaikps;
        $nilai->dosen_id=$bimbingan->dosen_id;
        $nilai->mhs_id=$bimbingan->mhs_id;
        $nilai->prodi_id= auth()->user()->prodi_id;
        $nilai->nilai_presentasi=$request->input('nilai_presentasi');
        $nilai->nilai_ppt=$request->input('nilai_ppt');
        $nilai->nilai_project=$request->input('nilai_project');
        $nilai->nilai_laporankp=$request->input('nilai_laporankp');
        $jumlah = $nilai->nilai_presentasi + $nilai->nilai_ppt + $nilai->nilai_project + $nilai->nilai_laporankp;
        if(($jumlah >= 89) && ($jumlah <= 100)){
        $huruf = "A";
        }elseif( ($jumlah >= 71) && ($jumlah <= 88)){
            $huruf = "B";
        }elseif( ($jumlah >= 61) && ($jumlah <= 70)){
            $huruf = "C";
        }elseif( ($jumlah >= 51) && ($jumlah <= 60)){
            $huruf = "D";
        }elseif( ($jumlah >= 0) && ($jumlah <= 50)){
            $huruf = "E";
        }
        $nilai->rata2 = $jumlah;
        $nilai->huruf=$huruf;
        $nilai->save();
        $cari = Mahasiswa::find($bimbingan->mhs_id);
        if ($cari){
            $status = Mahasiswa::find($bimbingan->mhs_id)->update([
                'status' => 'Selesai'
            ]);
        }
        return redirect()->back();

        }

        
    }
}
