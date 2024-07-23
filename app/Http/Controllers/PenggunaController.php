<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    if (auth()->user()->role == 'Admin'){
        
        $user=User::latest()->get();
        return view('admin.akun', compact('user'));
        
    }else {
        $user=User::where('prodi_id', auth()->user()->prodi_id)->latest()->get();
        return view('admin.akun', compact('user'));
    }
    }

    public function userdosen()
    {
    
        $prodi=Prodi::all();
        return view ('admin.tambah_user_dosen' ,compact('prodi'));
    
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $attributes = request()->validate([
            
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'role' => ['required'],
            'prodi_id' => ['required'],
            'password' => ['required', 'min:5', 'max:20'],
            
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );
        
        // dd($attributes);
        
        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        
        $dosen=new Dosen;
        $dosen->nama_dosen=$request->input('nama_dosen');
        $dosen->nip=$request->input('nip');
        $dosen->prodi_id=$request->input('prodi_id');
        $dosen->no_wa=$request->input('no_wa');
        $dosen->id_user=$user->id;
        $dosen->save();
        return redirect()->route('akun');
    }

    public function delete($id)
    {
        $dosen= Dosen::find($id);
        $dosen->delete();
        return redirect()->route('datadosen');
    }

    public function editdatadosen($id)
    {
        $dosen= Dosen::find($id);
        return view('admin.modal');
        compact('dosen');
    }

    public function updatedatadosen(Request $request, $id)
    {
        $dosen= Dosen::find($id);
        $dosen->nama_dosen=$request->input('nama_dosen');
        $dosen->nip=$request->input('nip');
        $dosen->no_wa=$request->input('no_wa');
        $dosen->save();
        return redirect()->route('datadosen');
    }

    public function updateprofile(Request $request, $id)
    {
        if (auth()->user()->role == 'Admin'){
            $user = User::find($id);
            $user->update($request->all());
        return redirect()->back();

        }elseif (auth()->user()->role == 'Staf'){
            $user = User::find($id);
            $user->update($request->all());
        return redirect()->back();

        }elseif (auth()->user()->role == 'Dospem'){
            $user = User::find($id);
            $dsn = Dosen::where('id_user', $user->id)->get();
            foreach($dsn as $dosen)
            $dosenUpdate = Dosen::find($dosen->id);
            // dd($dosenUpdate);
            $dosenUpdate->update($request->all());
            $user->update($request->all());
        return redirect()->back();

        }elseif (auth()->user()->role == 'Ketua Prodi'){
            $user = User::find($id);
            $dsn = Dosen::where('id_user', $user->id)->get();
            foreach($dsn as $dosen)
            $dosenUpdate = Dosen::find($dosen->id);
            // dd($dosenUpdate);
            $dosenUpdate->update($request->all());
            $user->update($request->all());
        return redirect()->back();

        }elseif (auth()->user()->role == 'Mahasiswa'){
            $user = User::find($id);
            $mhs = Mahasiswa::where('user_id', $user->id)->get();
            foreach($mhs as $mahasiswa)
            $mhsUpdate = Mahasiswa::find($mahasiswa->id);
            // dd($dosenUpdate);
            $mhsUpdate->update($request->all());
            $user->update($request->all());
            
        return redirect()->back();

        }

        
    }

    public function update_password(Request $request, $id)
    {
        $user = User::find($id);
        if (Hash::check($request->current_password, $user->password)) {
            $user = User::find($id);
            $user->password = Hash::make($request->input('new_password'));
            $user->update();

            return redirect()->back()->with('sukses','Password berhasil diubah');

        }else{

            return redirect()->back()->with('gagal','Password yang anda masukkan salah...');

        }
    }

    public function deleteuser($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect()->route('akun');
    }





}
