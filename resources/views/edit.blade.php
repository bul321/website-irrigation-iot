<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Irrigation - Edit Data</title>
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

            <a href="{{ route('web.dashboard') }}"
                class="text-xl font-bold text-[#558B2F] hover:text-[#33691E] transition flex items-center gap-2">
                <i class="fa-solid fa-arrow-left text-sm"></i> Kembali ke Dashboard
            </a>
        </div>
    </nav>

    <main class="max-w-lg mx-auto mt-12 px-4">
        <div class="bg-white p-8 rounded-3xl shadow-sm border-2 border-[#DCEDC8]">
            <div class="text-center mb-6">
                <span class="text-4xl">✏️</span>
                <h2 class="text-2xl font-black text-[#1B5E20] mt-2">Edit Data Sensor</h2>
                <p class="text-sm text-gray-400 mt-1">ID: <span class="font-bold text-[#7CB342]">#{{ $data->id }}</span>
                </p>
            </div>

            <form action="{{ route('web.update', $data->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-bold text-[#33691E] mb-1">
                        <i class="fa-solid fa-seedling mr-1 text-[#7CB342]"></i> Hambatan Tanah (Ohm)
                    </label>
                    <input type="number" step="any" name="soil_moisture" value="{{ $data->soil_moisture }}" required
                        class="w-full border-2 border-[#DCEDC8] rounded-xl px-4 py-2.5 focus:outline-none focus:border-[#7CB342] bg-[#F9FBE7] text-[#33691E] font-medium transition">
                </div>

                <div>
                    <label class="block text-sm font-bold text-[#33691E] mb-1">
                        <i class="fa-solid fa-temperature-three-quarters mr-1 text-orange-400"></i> Suhu Udara
                        (°C)
                    </label>
                    <input type="number" step="any" name="ambient_temperature" value="{{ $data->ambient_temperature }}"
                        required
                        class="w-full border-2 border-[#DCEDC8] rounded-xl px-4 py-2.5 focus:outline-none focus:border-[#7CB342] bg-[#F9FBE7] text-[#33691E] font-medium transition">
                </div>

                <div>
                    <label class="block text-sm font-bold text-[#33691E] mb-1">
                        <i class="fa-solid fa-droplet mr-1 text-blue-400"></i> Kelembapan Udara (%)
                    </label>
                    <input type="number" step="any" name="atmospheric_humidity"
                        value="{{ $data->atmospheric_humidity }}" required
                        class="w-full border-2 border-[#DCEDC8] rounded-xl px-4 py-2.5 focus:outline-none focus:border-[#7CB342] bg-[#F9FBE7] text-[#33691E] font-medium transition">
                </div>

                <button type="submit"
                    class="w-full bg-amber-500 hover:bg-amber-600 text-white font-bold py-3 px-4 rounded-2xl border-b-4 border-amber-700 transition transform active:scale-95 shadow-sm mt-6">
                    Perbarui & Hitung Ulang Model 🔄
                </button>
            </form>
        </div>
    </main>
</body>

</html>