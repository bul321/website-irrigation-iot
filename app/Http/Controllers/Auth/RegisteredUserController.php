<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * 1. PROSES REGISTRASI AWAL
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $otp = rand(1000, 9999);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'otp_code' => $otp,
            'is_otp_verified' => false,
            'otp_created_at' => Carbon::now(), // Catat waktu pembuatan
        ]);

        // Kirim email asli ke user yang baru daftar
        Mail::to($user->email)->send(new SendOtpMail($otp, $user->name));

        // Login-kan secara lokal, tapi statusnya belum terverifikasi OTP
        Auth::login($user);

        // KITA LEMPAR KE FORM OTP, BUKAN DASHBOARD!
        return redirect()->route('otp.verify');
    }

    public function showOtpForm()
    {
        return view('auth.otp');
    }

    /**
     * 2. CEK COCOK & EXPIRED OTP (5 MENIT)
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp_code' => 'required|string|size:4',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Cek apakah OTP di DB sudah kosong (artinya belum minta/sudah hangus)
        if (!$user->otp_code || !$user->otp_created_at) {
            return redirect()->back()->with('error', 'Silakan minta kode OTP baru, cuy.');
        }

        // Hitung selisih waktu sekarang dengan waktu OTP dibuat (dalam menit)
        $waktuPembuatan = Carbon::parse($user->otp_created_at);
        $selisihMenit = $waktuPembuatan->diffInMinutes(Carbon::now());

        // JIKA LEBIH DARI 5 MENIT -> HANGUS!
        if ($selisihMenit >= 5) {
            $user->update([
                'otp_code' => null, // Hapus kodenya karena hangus
            ]);
            return redirect()->back()->with('error', 'Kode OTP lo udah kedaluwarsa (lewat 5 menit)! Silakan klik tombol Request OTP Lagi.');
        }

        // JIKA KODE OTP COCOK
        if ($request->otp_code == $user->otp_code) {
            $user->update([
                'is_otp_verified' => true,
                'otp_code' => null, // hapus biar ga bisa dipake lagi
            ]);

            return redirect()->route('web.dashboard');
        }

        // Jika salah ketik
        return redirect()->back()->with('error', 'Kode OTP lo salah, cuy! Cek lagi logs Laravel lo.');
    }

   /**
 * REQUEST ULANG OTP (Cooldown 2 Menit)
 */
    public function resendOtp()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->otp_created_at) {
            $waktuPembuatan = Carbon::parse($user->otp_created_at);
            $selisihDetik = $waktuPembuatan->diffInSeconds(Carbon::now());

            // JIKA BELUM LEWAT 2 MENIT (120 DETIK) -> TOLAK!
            if ($selisihDetik < 120) {
                $sisaDetikTotal = 120 - $selisihDetik;
                $menit = floor($sisaDetikTotal / 60);
                $detik = $sisaDetikTotal % 60;

                // Format pesan biar rapi gak desimal lagi
                $pesanWaktu = $menit > 0 ? "{$menit} menit {$detik} detik" : "{$detik} detik";

                return redirect()->back()->with('error', "Sabar cuy! Lo baru bisa request OTP baru setelah {$pesanWaktu} lagi.");
            }
        }

        // Generate ulang OTP baru jika sudah lewat 2 menit
        $otp = rand(1000, 9999);
        $user->update([
            'otp_code' => $otp,
            'otp_created_at' => Carbon::now(),
        ]);

        // Kirim email asli saat request ulang OTP
        Mail::to($user->email)->send(new SendOtpMail($otp, $user->name));

        return redirect()->back()->with('success', 'Kode OTP baru berhasil dikirim! Silakan cek logs.');
    }
}