<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function register(){
        return view('autentikasi.register');
    }

    public function registrasi(Request $request){
        
        $request->validate([
            'username'  => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:3|max:16',
        ],[
            'username.required' => 'Kolom username tidak boleh kosong',
            'email.required'    => 'Kolom email tidak boleh kosong',
            'email.email'       => 'Email anda tidak valid',
            'email.unique'      => 'Email anda sudah terdaftar',
            'password.required' => 'Kolom password tidak boleh kosong',
            'password.min'      => 'Password minimal 3 karakter',
            'password.max'      => 'Password maksimal 16 karakter'
        ]);

        $request = User::create([
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 2,
        ]);

        return redirect('login')->with('status', 'Registrasi anda berhasil, silahkan login!');
    }
}
