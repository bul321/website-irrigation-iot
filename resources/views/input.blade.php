<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Irrigation - Input Data</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
    body {
        font-family: 'Fredoka', sans-serif;
    }

    @keyframes custom-bounce {

        0%,
        100% {
            transform: translateY(0) rotate(0deg);
        }

        50% {
            transform: translateY(-10px) rotate(3deg);
        }
    }

    .animate-gemoy {
        animation: custom-bounce 3s infinite ease-in-out;
    }
    </style>
</head>

<body class="bg-[#F9FBE7] text-[#33691E] antialiased selection:bg-[#DCEDC8]">

    <nav class="sticky top-0 z-50 bg-white/90 border-b-4 border-[#DCEDC8] backdrop-blur-md px-6 py-3">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="#" class="text-5xl font-bold flex items-center gap-2 text-[#558B2F] tracking-wide">
                <span class="text-4xl animate-gemoy inline-block">🫖</span> Siram-Sah!
            </a>

            <div class="flex items-center gap-6">
                <div class="flex gap-4 text-xl font-semibold text-[#689F38]">
                    <a href="{{ route('web.dashboard') }}" class="hover:text-[#33691E] transition">Dashboard</a>
                    <a href="{{ route('web.input') }}"
                        class="text-[#33691E] font-bold underline hover:text-[#33691E] transition">Input Sensor</a>
                </div>

                <div class="flex items-center gap-3 border-l border-[#DCEDC8] pl-4">
                    <span class="text-[#558B2F] text-2xl font-semibold">👤 {{ Auth::user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-xm font-bold text-white bg-red-500 hover:bg-red-600 border-b-4 border-red-700 px-3 py-1.5 rounded-xl transition transform active:scale-95">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-lg mx-auto mt-12 px-4">
        <div class="bg-white p-8 rounded-3xl shadow-sm border-2 border-[#DCEDC8]">
            <div class="text-center mb-6">
                <span class="text-4xl">🌿</span>
                <h2 class="text-2xl font-black text-[#1B5E20] mt-2">Input Angka Sensor</h2>
                <p class="text-sm text-gray-400 mt-1">Masukkan angka untuk diproses otomatis oleh model K-Means & ANN
                </p>
            </div>

            @if(session('success'))
            <div class="bg-green-50 border-2 border-[#C8E6C9] text-[#2E7D32] p-4 rounded-2xl mb-4 text-sm font-medium">
                <i class="fa-solid fa-circle-check mr-1"></i> {{ session('success') }}
            </div>

            <script>
            setTimeout(function() {
                window.location.href = "{{ route('web.dashboard') }}";
            }, 4000);
            </script>
            @endif

            <form action="{{ route('web.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-[#33691E] mb-1">
                        <i class="fa-solid fa-seedling mr-1 text-[#7CB342]"></i> Hambatan Tanah (Ohm)
                    </label>
                    <input type="number" step="any" name="soil_moisture" required
                        class="w-full border-2 border-[#DCEDC8] rounded-xl px-4 py-2.5 focus:outline-none focus:border-[#7CB342] bg-[#F9FBE7] text-[#33691E] font-medium transition"
                        placeholder="Contoh: 512 atau 868">
                </div>

                <div>
                    <label class="block text-sm font-bold text-[#33691E] mb-1">
                        <i class="fa-solid fa-temperature-three-quarters mr-1 text-orange-400"></i> Suhu Udara
                        (°C)
                    </label>
                    <input type="number" step="any" name="ambient_temperature" required
                        class="w-full border-2 border-[#DCEDC8] rounded-xl px-4 py-2.5 focus:outline-none focus:border-[#7CB342] bg-[#F9FBE7] text-[#33691E] font-medium transition"
                        placeholder="Contoh: 31.5">
                </div>

                <div>
                    <label class="block text-sm font-bold text-[#33691E] mb-1">
                        <i class="fa-solid fa-droplet mr-1 text-blue-400"></i> Kelembapan Udara (%)
                    </label>
                    <input type="number" step="any" name="atmospheric_humidity" required
                        class="w-full border-2 border-[#DCEDC8] rounded-xl px-4 py-2.5 focus:outline-none focus:border-[#7CB342] bg-[#F9FBE7] text-[#33691E] font-medium transition"
                        placeholder="Contoh: 44.5">
                </div>

                <button type="submit"
                    class="w-full bg-[#7CB342] hover:bg-[#689F38] text-white font-bold py-3 px-4 rounded-2xl border-b-4 border-[#558B2F] transition transform active:scale-95 shadow-sm mt-6">
                    Kirim & Jalankan Model 🚀
                </button>
            </form>
        </div>
    </main>
</body>

</html>