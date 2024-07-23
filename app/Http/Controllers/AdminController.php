<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datamahasiswa()
    {
    if (auth()->user()->role == 'Admin'){
        $mhs=Mahasiswa::all();
        
        return view ('admin.data_mhs', compact('mhs'));
        }
        else{
            $mhs=Mahasiswa::where('prodi_id', auth()->user()->prodi_id)->orderBy('created_at', 'asc')->get();
            return view ('admin.data_mhs', compact('mhs'));  
        }
    }

    public function datadosen()
    {
        if (auth()->user()->role == 'Admin'){
           $dosen=Dosen::all();
        return view ('admin.data_dosen', compact('dosen'));

        }

        else{
            $dosen=Dosen::where('prodi_id', auth()->user()->prodi_id)->orderBy('created_at', 'asc')->get();
        return view ('admin.data_dosen', compact('dosen'));
        }
    }

    public function delete($id)
    {
        $mhs= Mahasiswa::find($id);
        $mhs->delete();
        return redirect()->route('datamhs');
    }

    public function editdatamhs($id)
    {
        $mhs= Mahasiswa::find($id);
        return view('admin.edit_mhs');
        compact('mhs');
    }

    public function updatedatamhs(Request $request, $id)
    {
        $mhs= Mahasiswa::find($id);
        $mhs->nama_mhs=$request->input('nama_mhs');
        $mhs->nim=$request->input('nim');
        $mhs->no_wa=$request->input('no_wa');
        $mhs->save();
        return redirect()->route('datamhs');
    }

    public function laporan_akhir()
    {
        $mhs= Mahasiswa::find($id);
        $bimbingan = Bimbingan::where('mhs_id', $mhs->id)->get();
        foreach ($bimbingan as $item)
        
        $laporan = Laporan::where('bimbingan_id', $item->id)->get();
        foreach ($laporan as $lp)

        return view('lp', compact('lp'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createmhs()
    {
        return view ('admin.tambah_mhs');
    }

    public function createdosen()
    {
        return view ('admin.tambah_dosen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
