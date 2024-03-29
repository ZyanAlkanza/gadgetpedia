<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutentikasiController extends Controller
{
    public function login(){
        return view('autentikasi.login');
    }

    public function autentikasi(Request $request){
        $autentikasi = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($autentikasi)){
            $role = Auth::user()->role;

            switch($role){
                case 1: return redirect('dashboard');
                case 2: return redirect('/');
                default: return redirect('/');
            }

        }else{
            return back()->withErrors(['error' => 'Your email or password is incorrect']);
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
