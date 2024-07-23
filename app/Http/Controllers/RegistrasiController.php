<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Prodi;
use App\Models\Profil;
use App\Models\Mahasiswa;
use App\Models\Registrasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegistrasiController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi=Prodi::all();
        return view('session.registrasi',compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $attributes = request()->validate([
            // 'nama_mhs' => ['required', 'max:50'],
            // 'nim' => ['required, max:12'],
            // 'prodi_id' => ['required, max:20'],
            // 'no_wa' => ['required, max:12'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'role' => ['required'],
            'prodi_id' => ['required'],
            'password' => ['required', 'min:5', 'max:20'],
            // 'agreement' => ['accepted']
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );
        
        

        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        Auth::login($user); 
        $mhs=new Mahasiswa;
        $mhs->nama_mhs=$request->input('nama_mhs');
        $mhs->nim=$request->input('nim');
        $mhs->prodi_id=$request->input('prodi_id');
        $mhs->no_wa=$request->input('no_wa');
        $mhs->user_id=$user->id;
        $mhs->status='test';
        $mhs->save();
        return redirect('login');


    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Registrasi $registrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Registrasi $registrasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registrasi $registrasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registrasi  $registrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registrasi $registrasi)
    {
        //
    }
}
