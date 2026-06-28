<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Smart Irrigation</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-[#F1F8E9] flex items-center justify-center min-h-screen font-sans">

    <div
        class="bg-white p-8 rounded-3xl shadow-xl border-4 border-[#DCEDC8] w-full max-w-md relative overflow-hidden mx-4">

        <div class="absolute -top-12 -right-12 w-24 h-24 bg-[#FFF9C4] rounded-full opacity-50 pointer-events-none">
        </div>

        <h2 class="text-2xl font-black text-[#558B2F] text-center mb-1 drop-shadow-xs">Lupa Password? 🔑</h2>
        <p class="text-xs font-semibold text-[#689F38] text-center mb-6">Masukkan email lo, kami bakal ngirim kode OTP
            buat reset password.</p>

        @if($errors->any())
        <div
            class="bg-red-50 border border-red-200 text-red-600 text-xs font-bold p-3 rounded-xl mb-4 text-center shadow-xs">
            ⚠️ {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-[#33691E] uppercase tracking-wider mb-1.5">
                    <i class="fa-solid fa-envelope mr-1"></i> Alamat Email
                </label>
                <input type="email" name="email" required
                    class="w-full bg-[#F1F8E9] border-2 border-[#DCEDC8] rounded-xl px-4 py-3 text-sm font-medium text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#7CB342] focus:ring-2 focus:ring-[#C8E6C9] transition shadow-inner"
                    placeholder="contoh: budi@undiksha.ac.id">
            </div>

            <button type="submit"
                class="w-full bg-[#7CB342] hover:bg-[#689F38] text-white font-black py-3.5 px-4 rounded-2xl border-b-4 border-[#558B2F] shadow-md transition transform active:scale-[0.98] flex items-center justify-center gap-2 tracking-wide cursor-pointer text-sm">
                Kirim Kode OTP 🚀
            </button>
        </form>

        <div class="mt-6 pt-5 border-t-2 border-[#F1F8E9] text-center">
            <a href="{{ route('login') }}" class="text-xs font-bold text-[#7CB342] hover:text-[#33691E] underline">
                ← Kembali ke halaman Login
            </a>
        </div>
    </div>
</body>

</html>