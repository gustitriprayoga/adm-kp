<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('session.login');
    }

    public function post()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required' 
        ]);

        if(Auth::attempt($attributes))
        {
            session()->regenerate();
            if(auth()->user()->role=='Mahasiswa'){
                return redirect()->intended('dashboardd');

            } elseif(auth()->user()->role=='Dospem'){
                return redirect()->intended('dashboarddd');

            }
            else{
                return redirect()->intended('dashboard');
            }

        }
        else{

            return back()->withErrors(['email'=>'Email or password invalid.']);
        }
    }
    
    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();


        return redirect('/login');
    }
}
