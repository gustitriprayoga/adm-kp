<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\Pengajuankp;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    public function bimbinganstore(Request $request, $id)
    {
        // dd($id);
        $pengajuan=Pengajuankp::find($id);
        $bimbingan=new Bimbingan;
        $bimbingan->dosen_id=$request->input('dosen_id');
        $bimbingan->mhs_id=$pengajuan->mhs_id;
        $bimbingan->save();
        return redirect()->back();

    }
}
