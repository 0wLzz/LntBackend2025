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
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Mencoba untuk Login jika benar akan ke Homepage
        if(Auth::attempt($credentials)){
            return to_route('posts.index');
        }

        // Jika gagal akan diredirect kembali
        return redirect()->back()->withErrors(['login' => 'Invalid Credentials']);
    }

    public function register (Request $request) {
        $credentials = $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        // Membuat sebuah User baru 
        User::create($credentials);

        // Redirect ke route Home
        return to_route('posts.index');
    }

    public function logout (Request $request){
        // User yang terautentikasi Logout
        Auth::logout();

        // Refresh Session dan CSRF Token agar tidak digunakan kembali untuk tujuan lain
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('posts.index');
    }
}
