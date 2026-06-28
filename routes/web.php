<?php

use App\Http\Controllers\WebIrrigationController;
use App\Http\Controllers\Auth\RegisteredUserController; // <-- IMPORT CONTROLLER INI BIAR GAK EROR
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman welcome bawaan breeze (bisa buat login/register)
Route::get('/', function () {
    return view('welcome'); // Kita pakai file welcome.blade.php bawaan Laravel atau bikin baru
})->name('landing');

/**
 * GROUP 1: PROTEKSI OTP (Hanya butuh login 'auth', tapi tidak butuh 'verified')
 * Di sinilah rute verifikasi dan resend OTP lo hidup dengan aman!
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/otp-verify', [RegisteredUserController::class, 'showOtpForm'])->name('otp.verify');
    Route::post('/otp-verify', [RegisteredUserController::class, 'verifyOtp']);
    Route::post('/otp-resend', [RegisteredUserController::class, 'resendOtp'])->name('otp.resend');
});

/**
 * GROUP 2: APLIKASI UTAMA (Wajib lolos 'auth' DAN lolos 'verified' OTP)
 */
Route::middleware(['auth', 'verified'])->group(function () {
    // Ganti baris dashboard lo menjadi seperti ini (Pakai nama web.dashboard lagi, tapi tambahkan alias 'dashboard')
    Route::get('/dashboard', [WebIrrigationController::class, 'dashboard'])->name('web.dashboard');
    Route::get('/home', [WebIrrigationController::class, 'dashboard'])->name('dashboard'); // Untuk memuaskan Laravel Breeze
    Route::get('/input-sensor', [WebIrrigationController::class, 'input'])->name('web.input');
    Route::post('/input-sensor', [WebIrrigationController::class, 'store'])->name('web.store');
    
    Route::get('/irrigation/{id}/edit', [WebIrrigationController::class, 'edit'])->name('web.edit');
    Route::put('/irrigation/{id}', [WebIrrigationController::class, 'update'])->name('web.update');
    Route::delete('/irrigation/{id}', [WebIrrigationController::class, 'destroy'])->name('web.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';