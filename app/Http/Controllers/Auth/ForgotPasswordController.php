<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Mail\SendOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class ForgotPasswordController extends Controller
{
    // 1. Tampilkan Halaman Minta OTP Lupa Password
    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    // 2. Proses Kirim OTP Lupa Password
    public function sendResetOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Email lo gak terdaftar di sistem kami, cuy!']);
        }

        // Generate OTP Baru & Catat Waktu Pembuatan
        $otp = rand(1000, 9999);
        $user->update([
            'otp_code' => $otp,
            'otp_created_at' => Carbon::now(),
        ]);

        // Kirim Email OTP (Mailtrap / Gmail otomatis ngikut .env)
        Mail::to($user->email)->send(new SendOtpMail($otp, $user->name));

        // Simpan email di session biar tahu user mana yang lagi reset password
        session(['reset_email' => $user->email]);

        return redirect()->route('password.otp.verify')->with('success', 'Kode OTP reset password udah dikirim ke email lo!');
    }

    // 3. Tampilkan Halaman Input OTP Lupa Password
    public function showOtpForm()
    {
        if (!session('reset_email')) {
            return redirect()->route('password.request');
        }
        return view('auth.forgot-password-otp');
    }

    // 4. Verifikasi OTP Lupa Password (Validasi 2 Menit Cooldown & 5 Menit Expired)
    public function verifyResetOtp(Request $request)
    {
        $request->validate(['otp_code' => 'required|string|size:4']);
        
        $email = session('reset_email');
        $user = User::where('email', $email)->first();

        if (!$user || !$user->otp_code) {
            return redirect()->route('password.request')->withErrors(['email' => 'Sesi habis, silakan masukkan email lagi.']);
        }

        // Cek Expired 5 Menit
        $waktuPembuatan = Carbon::parse($user->otp_created_at);
        if ($waktuPembuatan->diffInMinutes(Carbon::now()) >= 5) {
            $user->update(['otp_code' => null]);
            return redirect()->back()->with('error', 'Kode OTP lo udah kedaluwarsa (lewat 5 menit)! Silakan minta lagi.');
        }

        // Cek Kecocokan Kode
        if ($request->otp_code == $user->otp_code) {
            // Berikan tanda di session kalau OTP sukses ditembus
            session(['otp_verified_for_reset' => true]);
            $user->update(['otp_code' => null]); // Hapus otp biar gak dipake lagi
            
            return redirect()->route('password.reset.form');
        }

        return redirect()->back()->with('error', 'Kode OTP lo salah, cuy!');
    }

    // 5. Tampilkan Halaman Form Password Baru
    public function showResetForm()
    {
        if (!session('reset_email') || !session('otp_verified_for_reset')) {
            return redirect()->route('password.request');
        }
        return view('auth.reset-password');
    }

    // 6. Update Password Baru ke Database
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $email = session('reset_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->route('password.request');
        }

        // Update password baru
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Bersihkan data session reset
        session()->forget(['reset_email', 'otp_verified_for_reset']);

        return redirect()->route('login')->with('success', 'Password lo berhasil diperbarui! Silakan login, cuy.');
    }
}