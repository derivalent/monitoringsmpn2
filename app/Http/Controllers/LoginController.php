<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {

        return view('auth.login');
    }

    public function login_proses(Request $request) {
        // dd($request->all());
        $data ['users'] = User::all();
        $request->validate([
             'email' => 'required|email',
             'password' => 'required|string|min:8',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)) {
            return redirect()->route('KategoriKegiatan.index');
        } else {
            return redirect()->route('Login')->with('failed', 'Email atau Password anda salah');
        }
    }

    // public function logout() {
    //     Auth::logout();
    //     return redirect()->route('Beranda')->with('success', 'Anda berhasil logout');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('Beranda')->with('success', 'Anda berhasil logout');
    }
}
