<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Irrigation - Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    /* Backdrop styling untuk elemen <dialog> */
    dialog::backdrop {
        background-color: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(4px);
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
                    <a href="{{ route('web.dashboard') }}"
                        class="text-[#33691E] font-bold underline hover:text-[#33691E] transition">Dashboard</a>
                    <a href="{{ route('web.input') }}" class="hover:text-[#33691E] transition">Input Sensor</a>
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

    <main class="max-w-6xl mx-auto mt-8 px-6 mb-8 ">

        <h2 class="text-3xl font-bold text-[#1B5E20] mb-4">Kondisi Lahan Terkini</h2>

        @if($latest)
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-blue-500 border border-[#DCEDC8]">
                <p class="text-sm text-gray-500 font-medium">Hambatan Tanah</p>
                <p class="text-2xl font-bold text-[#1B5E20] mt-1">{{ $latest->soil_moisture }} <span
                        class="text-sm font-normal text-gray-500">Ohm</span></p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-orange-500 border border-[#DCEDC8]">
                <p class="text-sm text-gray-500 font-medium">Suhu Udara</p>
                <p class="text-2xl font-bold text-[#1B5E20] mt-1">{{ $latest->ambient_temperature }} <span
                        class="text-sm font-normal text-gray-500">°C</span></p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-purple-500 border border-[#DCEDC8]">
                <p class="text-sm text-gray-500 font-medium">Zona Lahan (K-Means)</p>
                <span class="inline-block mt-2 px-3 py-1 text-xs font-bold rounded-full
                    @if($latest->cluster_zone == 3) bg-red-100 text-red-700
                    @elseif($latest->cluster_zone == 2) bg-blue-100 text-blue-700
                    @elseif($latest->cluster_zone == 1) bg-green-100 text-green-700
                    @else bg-yellow-100 text-yellow-700 @endif">
                    Zona {{ $latest->cluster_zone }}
                    @if($latest->cluster_zone == 3) (Kritis) @endif
                </span>
            </div>
            <div
                class="bg-white p-6 rounded-2xl shadow-sm border border-[#DCEDC8]
                @if($latest->dc_pump_status == 1) border-l-4 border-l-green-500 bg-green-50 @else border-l-4 border-l-gray-400 @endif">
                <p class="text-sm text-gray-500 font-medium">Rekomendasi Pompa (ANN)</p>
                <p class="text-2xl font-extrabold mt-1
                    @if($latest->dc_pump_status == 1) text-green-600 @else text-gray-500 @endif">
                    @if($latest->dc_pump_status == 1) 🌊 MENYALA @else ❌ MATI @endif
                </p>
            </div>
        </div>

        {{-- CARD ANALISIS DINAMIS: MENYALA ATAU MATI --}}
        <div
            class="bg-white p-6 rounded-2xl shadow-xs border-4 border-[#DCEDC8] mb-8 relative overflow-hidden transition-all duration-300 hover:shadow-md">
            <div class="absolute top-0 right-0 p-4 opacity-10 text-7xl select-none">🤖</div>
            <div class="flex items-start gap-4">
                @if($latest->dc_pump_status == 1)
                <div class="bg-green-100 p-3 rounded-xl text-2xl">💡</div>
                <div class="flex-1">
                    <h4 class="font-bold text-[#1B5E20] text-lg mb-1">Kenapa Pompa Otomatis Menyala?</h4>
                    <p class="text-sm text-gray-600 leading-relaxed font-medium">
                        Berdasarkan analisis kecerdasan buatan, nilai hambatan tanah lo saat ini menyentuh angka
                        <span class="text-blue-600 font-bold">{{ $latest->soil_moisture }} Ohm</span> dengan suhu
                        lingkungan sekitar
                        <span class="text-orange-600 font-bold">{{ $latest->ambient_temperature }}°C</span>.
                        @if($latest->cluster_zone == 3)
                        Algoritma <span class="font-bold text-purple-600">K-Means</span> mendeteksi ini masuk ke dalam
                        <span class="px-2 py-0.5 bg-red-100 text-red-700 rounded-md font-bold text-xs">Zona 3
                            (Kritis)</span> karena tanah terlampau kering. Oleh karena itu, otak buatan <span
                            class="font-bold text-green-700">ANN (Artificial Neural Network)</span> langsung
                        memerintahkan pompa aktif untuk mencegah tanaman lo dehidrasi! 🌊🌵
                        @else
                        Kombinasi parameter ini dinilai oleh <span class="font-bold text-green-700">ANN (Artificial
                            Neural Network)</span> membutuhkan suplai air tambahan agar tingkat kelembapan tanah kembali
                        seimbang.
                        @endif
                    </p>
                </div>
                @else
                <div class="bg-amber-100 p-3 rounded-xl text-2xl">💤</div>
                <div class="flex-1">
                    <h4 class="font-bold text-[#7CB342] text-lg mb-1">Kenapa Pompa Otomatis Mati?</h4>
                    <p class="text-sm text-gray-600 leading-relaxed font-medium">
                        Sistem mendeteksi hambatan tanah berada di angka <span
                            class="text-blue-600 font-bold">{{ $latest->soil_moisture }} Ohm</span> dan suhu lingkungan
                        <span class="text-orange-600 font-bold">{{ $latest->ambient_temperature }}°C</span>.
                        @if($latest->cluster_zone == 1 || $latest->cluster_zone == 2)
                        Algoritma <span class="font-bold text-purple-600">K-Means</span> mengelompokkan lahan ke dalam
                        <span class="px-2 py-0.5 bg-green-100 text-green-700 rounded-md font-bold text-xs">Zona
                            {{ $latest->cluster_zone }}</span>, yang artinya kadar air dalam tanah masih sangat
                        mencukupi dan lembap. Otak <span class="font-bold text-green-700">ANN</span> memutuskan untuk
                        menghemat air karena tanaman lo masih kenyang minum! 🌿✨
                        @else
                        Berdasarkan evaluasi model <span class="font-bold text-green-700">ANN (Artificial Neural
                            Network)</span>, kondisi tanah saat ini dinilai stabil dan belum memerlukan intervensi
                        penyiraman agar akar tanaman tidak membusuk akibat terlalu basah.
                        @endif
                    </p>
                </div>
                @endif
            </div>
        </div>

        @else
        <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 p-4 rounded-2xl mb-8">
            Belum ada data sensor masuk. Silakan isi data lewat menu <a href="{{ route('web.input') }}"
                class="underline font-bold">Input Sensor</a>.
        </div>
        @endif

        {{-- GRAFIK TREN --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-[#DCEDC8] mb-8">
            <h3 class="font-bold text-[#33691E] text-xl mb-4">📈 Grafik Tren Kondisi Lahan (Real-time Analysis)</h3>
            <div class="w-full relative" style="height: 300px;">
                <canvas id="irrigationChart"></canvas>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-[#DCEDC8] overflow-hidden">
            <div class="p-5 border-b border-[#DCEDC8] bg-[#F1F8E9]">
                <h3 class="font-bold text-[#33691E] text-xl">Riwayat Monitoring Sistem Irigasi</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse mb-8">
                    <thead>
                        <tr class="bg-[#F9FBE7] text-[#558B2F] text-xs uppercase font-semibold">
                            <th class="p-4">Waktu</th>
                            <th class="p-4">Hambatan Tanah (Ohm)</th>
                            <th class="p-4">Suhu (°C)</th>
                            <th class="p-4">Kelembapan Udara (%)</th>
                            <th class="p-4">Hasil Klaster K-Means</th>
                            <th class="p-4">Status Pompa ANN</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-600 divide-y divide-[#DCEDC8]">
                        @foreach($allData as $item)
                        <tr class="hover:bg-[#F9FBE7]">
                            <td class="p-4 font-medium text-gray-500">{{ $item->created_at->format('d M Y, H:i') }}</td>
                            <td class="p-4">{{ $item->soil_moisture }}</td>
                            <td class="p-4">{{ $item->ambient_temperature }}</td>
                            <td class="p-4">{{ $item->atmospheric_humidity }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full
                                    @if($item->cluster_zone == 3) bg-red-100 text-red-700
                                    @elseif($item->cluster_zone == 2) bg-blue-100 text-blue-700
                                    @else bg-gray-100 text-gray-700 @endif">
                                    Zona {{ $item->cluster_zone }}
                                </span>
                            </td>
                            <td class="p-4">
                                <span
                                    class="font-bold @if($item->dc_pump_status == 1) text-green-600 @else text-gray-400 @endif">
                                    {{ $item->dc_pump_status == 1 ? 'MENYALA' : 'MATI' }}
                                </span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2">
                                <a href="{{ route('web.edit', $item->id) }}"
                                    class="text-amber-600 hover:text-amber-900 bg-amber-50 px-3 py-1 rounded-xl text-xs font-medium border border-amber-200 transition">Edit</a>

                                <form id="delete-form-{{ $item->id }}" action="{{ route('web.destroy', $item->id) }}"
                                    method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="openDeleteModal('{{ $item->id }}')"
                                        class="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded-xl text-xs font-medium border border-red-200 transition cursor-pointer">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    {{-- ELEMEN CUSTOM DIALOG MODAL (GEMOY STYLE) --}}
    <dialog id="gemoyDeleteModal"
        class="bg-white p-6 rounded-3xl shadow-2xl border-4 border-[#DCEDC8] w-full max-w-sm text-center open:scale-100 scale-95 transition-all duration-200 focus:outline-hidden">
        <div class="text-5xl mb-3 animate-bounce inline-block">🗑️</div>
        <h3 class="text-xl font-bold text-[#1B5E20] mb-2">Yakin Ingin Hapus?</h3>
        <p class="text-sm font-medium text-gray-500 mb-6 leading-relaxed">Data monitoring lahan ini bakal hilang
            permanen, lho! Ciko si kaktus bisa sedih. 🌵</p>

        <div class="flex gap-3 justify-center">
            <button onclick="closeDeleteModal()"
                class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold text-sm rounded-xl transition cursor-pointer">
                Nggak Jadi
            </button>
            <button id="confirmDeleteBtn"
                class="px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white font-bold text-sm rounded-xl border-b-4 border-red-700 active:scale-95 transition cursor-pointer">
                Ya, Hapus! 🚀
            </button>
        </div>
    </dialog>

    <script>
    let currentDeleteId = null;
    const modal = document.getElementById('gemoyDeleteModal');

    function openDeleteModal(id) {
        currentDeleteId = id;
        modal.showModal();
    }

    function closeDeleteModal() {
        modal.close();
        currentDeleteId = null;
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if (currentDeleteId) {
            document.getElementById('delete-form-' + currentDeleteId).submit();
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        const rawData = @json($allData);
        const sortedData = [...rawData].reverse();

        const labels = sortedData.map(item => {
            const date = new Date(item.created_at);
            return date.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit'
            });
        });

        const soilMoistureData = sortedData.map(item => item.soil_moisture);
        const temperatureData = sortedData.map(item => item.ambient_temperature);

        const ctx = document.getElementById('irrigationChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Hambatan Tanah (Ohm)',
                        data: soilMoistureData,
                        borderColor: '#3b82f6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true,
                        yAxisID: 'y-soil',
                    },
                    {
                        label: 'Suhu Udara (°C)',
                        data: temperatureData,
                        borderColor: '#f97316',
                        backgroundColor: 'rgba(249, 115, 22, 0.1)',
                        borderWidth: 3,
                        tension: 0.3,
                        fill: true,
                        yAxisID: 'y-temp',
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    'y-soil': {
                        type: 'linear',
                        position: 'left',
                        title: {
                            display: true,
                            text: 'Hambatan (Ohm)',
                            color: '#3b82f6',
                            font: {
                                weight: 'bold'
                            }
                        },
                        grid: {
                            drawOnChartArea: true
                        }
                    },
                    'y-temp': {
                        type: 'linear',
                        position: 'right',
                        title: {
                            display: true,
                            text: 'Suhu (°C)',
                            color: '#f97316',
                            font: {
                                weight: 'bold'
                            }
                        },
                        grid: {
                            drawOnChartArea: false
                        }
                    }
                }
            }
        });
    });
    </script>
</body>

</html>