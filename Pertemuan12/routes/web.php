<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Untuk Redirect / --> /post
Route::redirect('/', '/posts');

// Supaya lebih singkat lagi untuk menampilkan halaman welcome
// View akan otomatis melihat filenya dari folder Resources/view jadi bisa di sesuaikan namanya [nama].bldae.php
// Route::view('/post', 'welcome')->name('home');


// Merupakan Group Routing berdasarkan middleware yang digunakan (Guset => hanya boleh user yang tidak terauntentikasi)
Route::middleware('guest')->group(function (){
    // Menimplakan Login Page dengan Route Name login_page
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login_page');

    // Memanggil Logic Login  dengan Route Name Login
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    // Menampilkan Register Page dengan nama register_page
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register_page');

    // Memanggil Logic Register dengan Route Name Register
    Route::post('/register', [AuthController::class, 'register'])->name('register');



    Route::view('/forgot-password','auth.forgot-password')->name('password.request');

    Route::post('/forgot-password', [AuthController::class, 'emailPassword'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'updatePassword'])->name('password.update');
});

// Memanggil Logic Logout dengan Route Name Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('posts', PostController::class)->middleware('verified');

Route::middleware('auth')->group(function (){
    # Send User Email Verification
    Route::get('/email/verify', [AuthController::class, 'verifyEmail'])->name('verification.notice');
    
    # Verify User Email
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'handleEmail'])->middleware( 'signed')->name('verification.verify');

    # Resend Email Verification
    Route::post('/email/verification-notification', [AuthController::class, 'resendEmail'])->middleware('throttle:6,1')->name('verification.send');
});


