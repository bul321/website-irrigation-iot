<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - Siram-Sah!</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-[#F1F8E9] flex items-center justify-center min-h-screen">

    <div class="flex flex-col items-center w-full px-4">

        {{-- Header Logo --}}
        <div class="mb-6 text-center">
            <a href="/"
                class="text-3xl font-black flex items-center justify-center gap-2 text-[#558B2F] tracking-wide drop-shadow-sm">
                <span class="text-4xl inline-block">🌱</span> Siram-Sah!
            </a>
            <p class="text-xs font-semibold text-[#689F38] mt-1">Verifikasi identitasmu dulu ya!</p>
        </div>

        {{-- Card --}}
        <div
            class="w-full max-w-md px-8 py-8 bg-white border-4 border-[#DCEDC8] shadow-xl rounded-3xl relative overflow-hidden">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-[#FFF9C4] rounded-full opacity-50 pointer-events-none">
            </div>

            {{-- Icon & Title --}}
            <div class="text-center mb-6">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-[#F1F8E9] border-2 border-[#DCEDC8] rounded-2xl mb-3">
                    <i class="fa-solid fa-shield-halved text-3xl text-[#7CB342]"></i>
                </div>
                <h2 class="text-xl font-black text-[#1B5E20]">Verifikasi OTP Keamanan</h2>
                <p class="text-xs font-medium text-gray-400 mt-1 leading-relaxed">
                    Akun lo berhasil dibuat! Masukkan 4 digit kode OTP<br>yang dikirimkan untuk mengaktifkan akses.
                </p>
            </div>

            @php
            $user = Auth::user();
            $isCooldown = false;
            $sisaWaktuTeks = "";

            if ($user && $user->otp_created_at) {
            $waktuPembuatan = \Illuminate\Support\Carbon::parse($user->otp_created_at);
            $selisihDetik = $waktuPembuatan->diffInSeconds(\Illuminate\Support\Carbon::now());

            if ($selisihDetik < 120) { $isCooldown=true; $sisaDetikTotal=120 - $selisihDetik;
                $menit=floor($sisaDetikTotal / 60); $detik=$sisaDetikTotal % 60; $sisaWaktuTeks=$menit> 0 ? "({$menit}m
                {$detik}s)" : "({$detik}s)";
                }
                }
                @endphp

                {{-- Flash Messages --}}
                @if(session('error'))
                <div
                    class="bg-red-50 border-2 border-red-200 text-red-600 text-xs font-bold px-4 py-3 rounded-xl mb-4 text-center">
                    <i class="fa-solid fa-circle-exclamation mr-1"></i> {{ session('error') }}
                </div>
                @endif
                @if(session('success'))
                <div
                    class="bg-green-50 border-2 border-[#C8E6C9] text-[#2E7D32] text-xs font-bold px-4 py-3 rounded-xl mb-4 text-center">
                    <i class="fa-solid fa-circle-check mr-1"></i> {{ session('success') }}
                </div>
                @endif

                {{-- Form OTP --}}
                <form action="{{ route('otp.verify') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-[#33691E] uppercase tracking-wider mb-3 text-center">
                            <i class="fa-solid fa-key mr-1"></i> Kode OTP
                        </label>
                        <input type="text" name="otp_code" maxlength="4" required
                            class="w-40 mx-auto block text-center text-3xl tracking-[0.5em] font-black border-2 border-[#DCEDC8] bg-[#F1F8E9] rounded-2xl px-4 py-4 focus:outline-none focus:border-[#7CB342] focus:ring-2 focus:ring-[#C8E6C9] transition text-[#1B5E20] shadow-inner"
                            placeholder="····">
                    </div>

                    <button type="submit"
                        class="w-full py-3.5 bg-[#7CB342] hover:bg-[#689F38] text-white font-black text-sm rounded-2xl border-b-4 border-[#558B2F] shadow-md transition transform active:scale-[0.98] flex items-center justify-center gap-2 tracking-wide cursor-pointer">
                        Verifikasi Akun 🔓
                    </button>
                </form>

                {{-- Resend OTP --}}
                <form method="POST" action="{{ route('otp.resend') }}"
                    class="mt-5 pt-5 border-t-2 border-[#F1F8E9] text-center">
                    @csrf
                    <button type="submit" @if($isCooldown) disabled @endif class="text-xs font-bold transition-all
                    @if($isCooldown)
                        text-gray-300 cursor-not-allowed
                    @else
                        text-[#7CB342] hover:text-[#33691E] underline cursor-pointer
                    @endif">
                        <i class="fa-solid fa-rotate-right mr-1"></i>
                        Gak nerima kode? Kirim ulang OTP {{ $sisaWaktuTeks }}
                    </button>
                </form>
        </div>
    </div>

</body>

</html>