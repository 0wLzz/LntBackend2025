<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage() {
        // Menampilkan Login Page
        return view('auth.login');
    }

    public function registerPage() {
        // Nenampilkan Register Page
        return view('auth.register');
    }

    public function login(Request $request){
        // Mengambil Data yang diperlukan yaitu email dan password
        $credentials = $request->only(['email', 'password']);

        // Mencoba untuk Login jika benar akan ke Homepage
        if(Auth::attempt($credentials)){
            return redirect()->route('home');
        }

        // Jika gagal akan diredirect kembali
        return redirect()->back();
    }

    public function register (Request $request) {
        $credentials = $request->all();

        // Membuat sebuah User baru 
        User::create($credentials);

        // Redirect ke route Home
        return to_route('home');
    }

    public function logout (Request $request){
        // User yang terautentikasi Logout
        Auth::logout();

        // Refresh Session dan CSRF Token agar tidak digunakan kembali untuk tujuan lain
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('home');
    }
}
