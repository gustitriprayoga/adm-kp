<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Bimbingan;
use App\Models\Mahasiswa;
use App\Models\Pengajuankp;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->user()->role =='Admin'){
            $dosen=Dosen::all()->count();
            $mhs=Mahasiswa::all()->count();
            $kp=Pengajuankp::where('status', 'Pending')->count();
            $kpp=Pengajuankp::where('status', 'Diterima')->count();
            $user=User::all()->count();
        return view('dashboard', compact('mhs', 'dosen', 'kp', 'user', 'kpp'));

        }elseif(auth()->user()->role =='Ketua Prodi'){
            $dosen=Dosen::where('prodi_id', auth()->user()->prodi_id)->count();
            $mhs=Mahasiswa::where('prodi_id', auth()->user()->prodi_id)->count();
        return view('dashboard', compact('mhs', 'dosen'));
        }
        elseif(auth()->user()->role =='Staf'){
            $dosen=Dosen::where('prodi_id', auth()->user()->prodi_id)->count();
            $mhs=Mahasiswa::where('prodi_id', auth()->user()->prodi_id)->count();
        return view('dashboard', compact('mhs', 'dosen'));
        }
        elseif(auth()->user()->role =='Dospem'){
            $dosen=Dosen::where('id_user',auth()->user()->id)->get();
            foreach ($dosen as $item)
            $bimbingan=Bimbingan::where('dosen_id', $item->id)->count();
            
        return view('dashboard', compact ('bimbingan'));
        }
        elseif(auth()->user()->role =='Mahasiswa'){   
        return view('dashboard');
        }
        elseif(auth()->user()->role =='Staf'){
            $dosen=Dosen::where('prodi_id')->count();
            $mhs=Mahasiswa::where('prodi_id')->count();
            $kp=Pengajuankp::where('status', 'Pending')->count();
            $kpp=Pengajuankp::where('status', 'Diterima')->count();
            $user=User::all()->count();
        return view('dashboard', compact('mhs', 'dosen', 'kp', 'user', 'kpp'));}

        

        
    }

    

}
