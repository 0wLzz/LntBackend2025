<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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
        $user = User::create($credentials);

        event(new Registered($user));

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


    public function verifyEmail() {
        return view('auth.verify-email');
    }

    public function handleEmail (EmailVerificationRequest $request) {
        $request->fulfill();
    
        return redirect()->route('posts.index');
    }

    public function resendEmail (Request $request) {
        $request->user()->sendEmailVerificationNotification();
    
        return back()->with('message', 'Verification link sent!');
    }


    public function emailPassword (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function updatePassword (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PasswordReset
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
