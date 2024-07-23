<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use App\Models\Upload;
use App\Models\Mahasiswa;
use App\Models\Pengajuankp;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function profil()
    {
        if (auth()->user()->role == 'Admin'){
            $user = User::find(auth()->user()->id);
        return view ('mahasiswa.profilmhs', compact('user'));

        }elseif (auth()->user()->role == 'Staf'){
            $user = User::find(auth()->user()->id);
        return view ('mahasiswa.profilmhs', compact('user'));

        }elseif (auth()->user()->role == 'Dospem'){
            $user = User::find(auth()->user()->id);
            $dsn = Dosen::where('id_user', $user->id)->get();
            foreach ($dsn as $dosen)

        return view ('mahasiswa.profilmhs', compact('user','dosen'));

        }elseif (auth()->user()->role == 'Mahasiswa'){
            $user = User::find(auth()->user()->id);
            $mhs = Mahasiswa::where('user_id', $user->id)->get();
            foreach ($mhs as $mahasiswa)

        return view ('mahasiswa.profilmhs', compact('user','mahasiswa'));

        }elseif (auth()->user()->role == 'Ketua Prodi'){
            $user = User::find(auth()->user()->id);
            $dsn = Dosen::where('id_user', $user->id)->get();
            foreach ($dsn as $dosen)

        return view ('mahasiswa.profilmhs', compact('user','dosen'));
        }
    }



    public function pengajuan()
    {
        if (auth()->user()->role == 'Admin'){
            $kp_admin=Pengajuankp::latest()->get();

            $dosens=Dosen::all();
            
            return view('mahasiswa.pengajuan', compact('kp_admin', 'dosens'));


        } if (auth()->user()->role == 'Staf'){
            $kp_admin=Pengajuankp::latest()->get();
            $dosens=Dosen::where('prodi_id', auth()->user()->prodi_id)->orderBy('created_at', 'asc')->get();
            return view('mahasiswa.pengajuan', compact('kp_admin', 'dosens'));
        }

        elseif (auth()->user()->role == 'Mahasiswa'){
            $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
            foreach($mhs as $item)
            $kp=Pengajuankp::where('mhs_id', $item->id)->latest()->get();
            $upload=Upload::all();
            // dd($dosens);
            return view('mahasiswa.pengajuan', compact('kp', 'upload', ));
        }



    }

    public function pengajuankp ()
    {
        $mhs=Mahasiswa::where('user_id', auth()->user()->id)->get();
        foreach($mhs as $item);

        return view('mahasiswa.pengajuankp', compact('item'));
    }






}
