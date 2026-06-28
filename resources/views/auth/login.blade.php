<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siram-Sah! - Masuk</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-[#F1F8E9]">

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <div class="mb-6 text-center">
            <a href="/"
                class="text-3xl font-black flex items-center justify-center gap-2 text-[#558B2F] tracking-wide drop-shadow-sm">
                <span class="text-6xl inline-block">🫖</span> Siram-Sah!
            </a>
            <p class="text-xs font-semibold text-[#689F38] mt-1">Masuk ke Kebun Pintar & Pantau Lahanmu</p>
        </div>

        <div
            class="w-full sm:max-w-md mt-2 px-8 py-8 bg-white border-4 border-[#DCEDC8] shadow-xl rounded-3xl relative overflow-hidden mx-4">
            <div class="absolute -top-12 -right-12 w-24 h-24 bg-[#FFF9C4] rounded-full opacity-50 pointer-events-none">
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block font-bold text-[#33691E] uppercase tracking-wider mb-1">
                        <i class="fa-solid fa-envelope mr-1"></i> Alamat Email
                    </label>
                    <input id="email"
                        class="block w-full px-4 py-3 bg-[#F1F8E9] border-2 border-[#DCEDC8] rounded-xl text-sm font-medium text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#7CB342] focus:ring-2 focus:ring-[#C8E6C9] transition shadow-inner"
                        type="email" name="email" placeholder="contoh: budi@undiksha.ac.id" value="{{ old('email') }}"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-500 font-medium" />
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1">
                        <label for="password" class="block font-bold text-[#33691E] uppercase tracking-wider">
                            <i class="fa-solid fa-lock mr-1"></i> Kata Sandi
                        </label>
                        @if (Route::has('password.request'))
                        <a class="text-xs font-bold text-[#689F38] hover:text-[#33691E] hover:underline"
                            href="{{ route('password.request') }}">
                            Lupa sandi?
                        </a>
                        @endif
                    </div>
                    <input id="password"
                        class="block w-full px-4 py-3 bg-[#F1F8E9] border-2 border-[#DCEDC8] rounded-xl text-sm font-medium text-gray-700 placeholder-gray-400 focus:outline-none focus:border-[#7CB342] focus:ring-2 focus:ring-[#C8E6C9] transition shadow-inner"
                        type="password" name="password" placeholder="••••••••" required
                        autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')"
                        class="mt-1.5 text-xs text-red-500 font-medium" />
                </div>

                <div class="flex items-center justify-between pt-1">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                        <input id="remember_me" type="checkbox"
                            class="rounded-lg border-2 border-[#DCEDC8] text-[#7CB342] shadow-xs focus:ring-[#7CB342] focus:ring-offset-0 w-4 h-4 cursor-pointer"
                            name="remember">
                        <span class="ms-2 text-xs font-bold text-[#558B2F] group-hover:text-[#33691E] transition">Ingat
                            saya di perangkat ini</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full py-3.5 bg-[#7CB342] hover:bg-[#689F38] text-white font-black text-sm rounded-2xl border-b-4 border-[#558B2F] shadow-md transition transform active:scale-[0.98] flex items-center justify-center gap-2 tracking-wide cursor-pointer">
                        Masuk Mas Bro! 🚀
                    </button>
                </div>
            </form>

            <div class="mt-6 pt-5 border-t-2 border-[#F1F8E9] text-center">
                <p class="text-xs font-semibold text-[#558B2F]">
                    Belum punya kebun pintar?
                    <a href="{{ route('register') }}"
                        class="text-[#7CB342] font-black hover:text-[#33691E] underline ml-1">
                        Yuk Daftar Sekarang! 🎉
                    </a>
                </p>
            </div>
        </div>
    </div>

</body>

</html>