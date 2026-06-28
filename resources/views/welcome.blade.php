<!-- TAMPILAN 1 {-->
<!-- <!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Irrigation System - Living Lab Farming</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-slate-50 font-sans text-slate-700 antialiased">

    <nav class="sticky top-0 z-50 backdrop-blur-md bg-white/80 border-b border-slate-100 token group">
        <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">
            <a href="#" class="text-xl font-black text-emerald-600 flex items-center gap-2 tracking-tight">
                🌱 Smart<span class="text-slate-800 font-semibold">Irrigation</span>
            </a>

            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-600">
                <a href="#fitur" class="hover:text-emerald-600 transition">Fitur Utama</a>
                <a href="#ai-intelligence" class="hover:text-emerald-600 transition">AI Model</a>
                <a href="#manfaat" class="hover:text-emerald-600 transition">Manfaat</a>
            </div>

            <div class="flex items-center gap-4">
                @auth
                <a href="{{ route('dashboard') }}"
                    class="text-sm font-semibold text-white bg-emerald-600 hover:bg-emerald-700 px-5 py-2.5 rounded-xl transition shadow-sm">
                    Masuk Dashboard <i class="fa-solid fa-arrow-right ml-1"></i>
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="text-sm font-semibold text-slate-600 hover:text-emerald-600 transition">Login</a>
                <a href="{{ route('register') }}"
                    class="text-sm font-semibold text-white bg-emerald-600 hover:bg-emerald-700 px-5 py-2.5 rounded-xl transition shadow-sm">
                    Daftar Sekarang
                </a>
                @endif
            </div>
        </div>
    </nav>

    <header
        class="relative overflow-hidden py-20 lg:py-32 bg-gradient-to-b from-emerald-50/50 via-transparent to-transparent">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="space-y-6 text-center lg:text-left">
                <span
                    class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                    <i class="fa-solid fa-microchip animate-pulse"></i> Living Lab - Smart Farming Project
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-[1.15]">
                    Sistem Pengairan Pintar Berbasis <span
                        class="text-emerald-600 bg-gradient-to-r from-emerald-600 to-teal-500 bg-clip-text text-transparent">Kecerdasan
                        Buatan</span>
                </h1>
                <p class="text-base sm:text-lg text-slate-500 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                    Mengoptimalkan efisiensi air dan kesehatan tanaman lewat pemantauan parameter lahan terintegrasi
                    yang dianalisis langsung oleh algoritma Machine Learning.
                </p>
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start pt-2">
                    <a href="{{ route('register') }}"
                        class="px-6 py-3.5 bg-slate-900 hover:bg-slate-800 text-white font-bold rounded-xl shadow-md transition duration-200 transform hover:-translate-y-0.5">
                        Mulai Kelola Lahan
                    </a>
                    <a href="#ai-intelligence"
                        class="px-6 py-3.5 bg-white hover:bg-slate-50 text-slate-700 font-semibold border border-slate-200 rounded-xl shadow-sm transition duration-200">
                        Pelajari Model AI <i class="fa-solid fa-chevron-down ml-1 text-xs"></i>
                    </a>
                </div>
            </div>

            <div class="relative mx-auto lg:ml-auto max-w-md w-full">
                <div
                    class="absolute -inset-1 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 opacity-20 blur-xl">
                </div>
                <div
                    class="relative bg-white border border-slate-100 p-6 rounded-2xl shadow-xl space-y-6 transform hover:scale-[1.02] transition duration-300">
                    <div class="flex justify-between items-center border-b border-slate-50 pb-4">
                        <div class="flex items-center gap-2">
                            <span class="h-2.5 w-2.5 rounded-full bg-emerald-500 animate-ping"></span>
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Status Lahan
                                Real-Time</span>
                        </div>
                        <i class="fa-solid fa-cloud-sun text-amber-500 text-lg"></i>
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between text-xs font-bold">
                            <span>Kelembapan Tanah</span>
                            <span class="text-emerald-600">68% (Kondisi Baik)</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2.5 rounded-full overflow-hidden">
                            <div class="bg-emerald-500 h-full w-[68%] rounded-full"></div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100/50">
                            <span class="text-[10px] uppercase font-bold text-slate-400">Suhu Udara</span>
                            <p class="text-lg font-extrabold text-slate-800">28.4°C</p>
                        </div>
                        <div class="bg-slate-50 p-3 rounded-xl border border-slate-100/50">
                            <span class="text-[10px] uppercase font-bold text-slate-400">Pompa Air</span>
                            <p class="text-lg font-extrabold text-emerald-600">AUTOMATIC OFF</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <section id="ai-intelligence" class="py-20 bg-white border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                <h2 class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Dual-Engine Inteligensia Data
                </h2>
                <p class="text-3xl font-black text-slate-900 tracking-tight sm:text-4xl">Bagaimana Sistem Mempelajari
                    Lahan Mu?</p>
                <p class="text-sm text-slate-400">Integrasi sinkron antara dua arsitektur algoritmik canggih untuk
                    akurasi keputusan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div
                    class="group bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-emerald-500/30 transition duration-300 shadow-sm relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 p-4 opacity-5 text-6xl text-slate-900 font-black group-hover:opacity-10 transition">
                        01</div>
                    <div
                        class="h-12 w-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-6 text-xl">
                        <i class="fa-solid fa-diagram-project"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Klasterisasi K-Means</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Mengelompokkan kondisi lahan ke dalam klaster tingkat kekeringan secara otomatis. Membantu
                        memetakan zona tanah yang kritis secara objektif.
                    </p>
                </div>

                <div
                    class="group bg-slate-50 p-8 rounded-2xl border border-slate-100 hover:border-teal-500/30 transition duration-300 shadow-sm relative overflow-hidden">
                    <div
                        class="absolute top-0 right-0 p-4 opacity-5 text-6xl text-slate-900 font-black group-hover:opacity-10 transition">
                        02</div>
                    <div
                        class="h-12 w-12 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center mb-6 text-xl">
                        <i class="fa-solid fa-brain"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Artificial Neural Network (ANN)</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Jaringan Saraf Tiruan memprediksi durasi dan volume kebutuhan air optimal berdasarkan histori
                        log data kelembapan dan temperatur tanah.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="py-20 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                <h2 class="text-xs font-bold text-emerald-600 uppercase tracking-widest">Satu Dasbor Terpadu</h2>
                <p class="text-3xl font-black text-slate-900 tracking-tight sm:text-4xl">Manajemen Data Tanpa Ribet</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-xs border border-slate-100 space-y-3">
                    <i class="fa-solid fa-pen-to-square text-emerald-600 text-xl"></i>
                    <h4 class="font-bold text-slate-800">Pencatatan Mandiri</h4>
                    <p class="text-xs text-slate-500">Input parameter berkala lahan lo dengan mudah lewat form validasi
                        terproteksi.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-xs border border-slate-100 space-y-3">
                    <i class="fa-solid fa-chart-line text-emerald-600 text-xl"></i>
                    <h4 class="font-bold text-slate-800">Visualisasi Tren Dinamis</h4>
                    <p class="text-xs text-slate-500">Pantau grafik pergerakan fluktuasi tanah dari waktu ke waktu
                        secara instan.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-xs border border-slate-100 space-y-3">
                    <i class="fa-solid fa-rotate text-emerald-600 text-xl"></i>
                    <h4 class="font-bold text-slate-800">Iterasi Pembelajaran</h4>
                    <p class="text-xs text-slate-500">Setiap modifikasi data akan langsung dipelajari ulang secara
                        otomatis oleh model ANN & K-Means.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-400 py-12 text-sm border-t border-slate-800">
        <div
            class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-center sm:text-left">
            <div>
                <p class="font-bold text-white text-base">🌱 Smart Irrigation System</p>
                <p class="text-xs text-slate-500 mt-1">Project Akhir Pemrograman Web Framework & Data Mining.</p>
            </div>
            <div class="text-xs text-slate-500">
                &copy; 2026 Kelompok 1 SINESA DPS. All Rights Reserved.
            </div>
        </div>
    </footer>

</body>

</html> -->

<!-- } -->
<!-- TAMPILAN 2 -->
<!-- <!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Irrigation System</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    @keyframes pulse-glow {

        0%,
        100% {
            opacity: 0.3;
            transform: scale(1);
        }

        50% {
            opacity: 0.6;
            transform: scale(1.05);
        }
    }

    .glow-bg {
        animation: pulse-glow 8s infinite ease-in-out;
    }

    .glass-card {
        background: rgba(15, 23, 42, 0.65);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.07);
    }

    .neon-text-emerald {
        text-shadow: 0 0 12px rgba(16, 185, 129, 0.5);
    }
    </style>
</head>

<body class="bg-[#090d16] font-sans text-slate-300 antialiased overflow-x-hidden">

    <div
        class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-emerald-500/10 rounded-full blur-[120px] glow-bg pointer-events-none">
    </div>
    <div class="absolute top-1/3 right-1/4 w-[600px] h-[600px] bg-teal-500/10 rounded-full blur-[150px] glow-bg pointer-events-none"
        style="animation-delay: -4s;"></div>

    <nav class="sticky top-0 z-50 backdrop-blur-xl bg-[#090d16]/70 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 h-16 flex justify-between items-center">
            <a href="#"
                class="text-xl font-black text-emerald-400 flex items-center gap-2 tracking-wider neon-text-emerald">
                <i class="fa-solid fa-leaf text-emerald-400 animate-pulse"></i> SMART<span
                    class="text-white font-light">IRRIGATION</span>
            </a>

            <div
                class="hidden md:flex items-center gap-8 text-xs font-semibold uppercase tracking-widest text-slate-400">
                <a href="#fitur" class="hover:text-emerald-400 transition duration-300">Fitur Utama</a>
                <a href="#ai-intelligence" class="hover:text-emerald-400 transition duration-300">Core AI</a>
                <a href="#about" class="hover:text-emerald-400 transition duration-300">Living Lab</a>
            </div>

            <div class="flex items-center gap-4">
                @auth
                <a href="{{ route('dashboard') }}"
                    class="text-xs font-bold uppercase tracking-wider text-black bg-emerald-400 hover:bg-emerald-300 px-5 py-2.5 rounded-lg transition duration-300 shadow-[0_0_20px_rgba(52,211,153,0.4)]">
                    Dashboard <i class="fa-solid fa-terminal ml-1"></i>
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="text-xs font-bold uppercase tracking-wider text-slate-400 hover:text-white transition duration-300">Login</a>
                <a href="{{ route('register') }}"
                    class="text-xs font-bold uppercase tracking-wider text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 px-5 py-2.5 rounded-lg transition duration-300 border border-white/10 shadow-lg">
                    Initialize
                </a>
                @endif
            </div>
        </div>
    </nav>

    <header class="relative py-24 lg:py-36">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            <div class="space-y-6 text-center lg:text-left">
                <span
                    class="inline-flex items-center gap-2 py-1 px-3 rounded-md text-[10px] font-bold uppercase tracking-widest bg-emerald-500/10 border border-emerald-500/30 text-emerald-400">
                    <i class="fa-solid fa-circle text-[6px] animate-ping"></i> Node System: Active
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-[1.1]">
                    Automated Irrigation Driven by <span
                        class="bg-gradient-to-r from-emerald-400 to-teal-300 bg-clip-text text-transparent neon-text-emerald">Neural
                        Network</span>
                </h1>
                <p class="text-sm sm:text-base text-slate-400 max-w-xl mx-auto lg:mx-0 leading-relaxed">
                    Sistem pemantauan & optimasi agrikultur presisi dalam ekosistem Living Lab Undiksha. Memproses
                    metrik tanah secara manual ke dalam komputasi prediktif tingkat lanjut.
                </p>
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start pt-4">
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-emerald-500 hover:bg-emerald-400 text-black text-xs font-bold uppercase tracking-widest rounded-lg shadow-[0_0_30px_rgba(16,185,129,0.3)] transition duration-300 transform hover:-translate-y-0.5">
                        Mulai Registrasi
                    </a>
                    <a href="#ai-intelligence"
                        class="px-6 py-3 bg-white/5 hover:bg-white/10 text-white text-xs font-bold uppercase tracking-widest border border-white/10 rounded-lg transition duration-300">
                        Dekonstruksi AI Model <i class="fa-solid fa-network-wired ml-1 text-emerald-400"></i>
                    </a>
                </div>
            </div>

            <div class="relative mx-auto lg:ml-auto max-w-md w-full">
                <div class="glass-card p-6 rounded-2xl shadow-2xl space-y-6 relative overflow-hidden">
                    <div
                        class="absolute top-0 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-emerald-500 to-transparent">
                    </div>

                    <div class="flex justify-between items-center border-b border-white/5 pb-4">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-microchip text-emerald-400 animate-pulse"></i>
                            <span class="text-[10px] font-bold tracking-widest text-slate-400 uppercase">Telemetry
                                Terminal v1.0</span>
                        </div>
                        <span
                            class="text-[10px] font-mono bg-slate-800 text-slate-400 px-2 py-0.5 rounded border border-white/5">SECURE
                            CONNECTION</span>
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between text-xs font-mono">
                            <span class="text-slate-400">// KELEMBAPAN TANAH</span>
                            <span class="text-emerald-400 font-bold">68.42 %</span>
                        </div>
                        <div class="w-full bg-slate-900 h-1.5 rounded-full p-[1px] border border-white/5">
                            <div
                                class="bg-gradient-to-r from-emerald-500 to-teal-400 h-full w-[68%] rounded-full shadow-[0_0_10px_rgba(16,185,129,0.7)]">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 font-mono text-xs">
                        <div class="bg-slate-900/50 p-3 rounded-lg border border-white/5">
                            <span class="text-[10px] text-slate-500 uppercase block">ENV_TEMP</span>
                            <p class="text-base font-bold text-white mt-1">28.40 °C</p>
                        </div>
                        <div class="bg-slate-900/50 p-3 rounded-lg border border-white/5">
                            <span class="text-[10px] text-slate-500 uppercase block">ACTUATOR_PUMP</span>
                            <p class="text-base font-bold text-teal-400 mt-1">IDLE [OFF]</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <section id="ai-intelligence" class="py-24 bg-[#070a11] border-y border-white/5 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-20 space-y-3">
                <h2 class="text-xs font-bold text-emerald-400 uppercase tracking-widest">// ALGORITHMIC INTELLIGENCE
                    PROCESSING</h2>
                <p class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">Dual-Engine Core Framework</p>
                <div class="w-12 h-[2px] bg-emerald-500 mx-auto mt-2"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div
                    class="glass-card p-8 rounded-xl hover:border-emerald-500/40 transition duration-300 shadow-lg relative group">
                    <div
                        class="absolute -top-3 -left-3 bg-emerald-500/10 text-emerald-400 text-xs font-mono p-1 px-2.5 rounded border border-emerald-500/30">
                        ENG_01</div>
                    <div
                        class="h-10 w-10 rounded-lg bg-emerald-500/10 text-emerald-400 flex items-center justify-center mb-6 border border-emerald-500/20 text-lg">
                        <i class="fa-solid fa-diagram-project"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 tracking-wide">K-Means Cluster Engine</h3>
                    <p class="text-xs text-slate-400 leading-relaxed font-light">
                        Mensegmentasikan metrik kelembapan dan suhu ke dalam matriks cluster kondisi kekeringan objek
                        secara objektif untuk penentuan status zona lahan.
                    </p>
                </div>

                <div
                    class="glass-card p-8 rounded-xl hover:border-teal-500/40 transition duration-300 shadow-lg relative group">
                    <div
                        class="absolute -top-3 -left-3 bg-teal-500/10 text-teal-400 text-xs font-mono p-1 px-2.5 rounded border border-teal-500/30">
                        ENG_02</div>
                    <div
                        class="h-10 w-10 rounded-lg bg-teal-500/10 text-teal-400 flex items-center justify-center mb-6 border border-teal-500/20 text-lg">
                        <i class="fa-solid fa-brain"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2 tracking-wide">Artificial Neural Network (ANN)</h3>
                    <p class="text-xs text-slate-400 leading-relaxed font-light">
                        Komputasi jaringan saraf tiruan berlapis mempelajari pola data historis secara mendalam guna
                        memprediksi volume air dan kalkulasi waktu irigasi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur" class="py-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                <h2 class="text-xs font-bold text-emerald-400 uppercase tracking-widest">// SYSTEM OPERATION FEATURES
                </h2>
                <p class="text-3xl font-extrabold text-white tracking-tight sm:text-4xl">Modul Manajemen Data</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    class="bg-white/[0.02] p-6 rounded-xl border border-white/5 space-y-3 hover:bg-white/[0.04] transition">
                    <i class="fa-solid fa-terminal text-emerald-400 text-lg"></i>
                    <h4 class="font-bold text-white text-sm uppercase tracking-wider">Manual Log Injection</h4>
                    <p class="text-xs text-slate-400">Pencatatan parameter tanah & iklim yang diproteksi oleh subsistem
                        validasi form yang ketat.</p>
                </div>
                <div
                    class="bg-white/[0.02] p-6 rounded-xl border border-white/5 space-y-3 hover:bg-white/[0.04] transition">
                    <i class="fa-solid fa-chart-area text-emerald-400 text-lg"></i>
                    <h4 class="font-bold text-white text-sm uppercase tracking-wider">Real-Time Data Analytics</h4>
                    <p class="text-xs text-slate-400">Visualisasi representasi data analitik dalam grafik linier dinamis
                        interaktif.</p>
                </div>
                <div
                    class="bg-white/[0.02] p-6 rounded-xl border border-white/5 space-y-3 hover:bg-white/[0.04] transition">
                    <i class="fa-solid fa-arrows-spin text-emerald-400 text-lg"></i>
                    <h4 class="font-bold text-white text-sm uppercase tracking-wider">Iterative Learning</h4>
                    <p class="text-xs text-slate-400">Setiap modifikasi (edit/delete) memicu model AI untuk melatih
                        ulang bobot data saat itu juga.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-[#05070b] py-10 border-t border-white/5 text-xs font-mono text-slate-500">
        <div
            class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row justify-between items-center gap-4 text-center sm:text-left">
            <div>
                <p class="text-slate-300 font-bold">// NEO SMART IRRIGATION ARCHITECTURE</p>
                <p class="text-[11px] text-slate-600 mt-1">Ganesha University of Education - Living Lab Cluster Project.
                </p>
            </div>
            <div class="text-[11px] text-slate-600">
                &copy; 2026 by TEAM 1 SINESA. Compiled Successfully.
            </div>
        </div>
    </footer>

</body>

</html> -->


<!-- TAMPILAN 3 -->
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siram-Sah! Kebun Pintar Gemoy</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
    body {
        font-family: 'Fredoka', sans-serif;
    }

    /* Animasi Goyang-Goyang Lucu */
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

    /* Animasi Detak Jantung Maskot */
    @keyframes super-pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.08);
        }
    }

    .animate-pulse-lucu {
        animation: super-pulse 2s infinite ease-in-out;
    }
    </style>
</head>

<body class="bg-[#F9FBE7] text-[#33691E] antialiased selection:bg-[#DCEDC8]">

    <nav class="sticky top-0 z-50 bg-white/90 border-b-4 border-[#DCEDC8] backdrop-blur-md px-6 py-3">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="#" class="text-6xl font-bold flex items-center gap-2 text-[#558B2F] tracking-wide">
                <span class="text-5xl animate-gemoy inline-block">🫖</span> Siram-Sah!
            </a>

            <div class="hidden md:flex items-center gap-6 text-xl font-semibold text-[#689F38]">
                <a href="#" class="hover:text-[#33691E] transition">Kenalan Yuk</a>
                <a href="#otak-ai" class="hover:text-[#33691E] transition">Otak Pintar AI</a>
                <a href="#fitur-seru" class="hover:text-[#33691E] transition">Fitur Seru</a>
            </div>

            <div class="flex items-center gap-3">
                @auth
                <a href="{{ route('dashboard') }}"
                    class="text-xl font-bold text-white bg-[#7CB342] hover:bg-[#689F38] border-b-4 border-[#558B2F] px-4 py-2.5 rounded-2xl transition transform active:scale-95">
                    Ke Kebun Saya <i class="fa-solid fa-arrow-right-to-bracket ml-1"></i>
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="text-xl font-bold text-[#689F38] hover:text-[#33691E] transition">Masuk</a>
                <a href="{{ route('register') }}"
                    class="text-xl font-bold text-white bg-[#9CCC65] hover:bg-[#8BC34A] border-b-4 border-[#7CB342] px-4 py-2.5 rounded-2xl transition transform active:scale-95 shadow-sm">
                    Yuk Daftar! 🎉
                </a>
                @endif
            </div>
        </div>
    </nav>

    <header class="min-h-[calc(100vh-68px)] flex items-center px-6 py-12">
        <div class="max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center w-full">

            <div class="space-y-8 text-center lg:text-left">
                <span
                    class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full text-xs font-bold bg-[#E8F5E9] text-[#2E7D32] border-2 border-[#A5D6A7]">
                    <i class="fa-solid fa-wand-magic-sparkles animate-spin" style="animation-duration: 3s;"></i> Proyek
                    Kelompok Living Lab Undiksha
                </span>
                <h1 class="text-4xl sm:text-6xl font-black text-[#1B5E20] leading-tight tracking-tight">
                    Bantu Jaga Tanaman Jadi <span class="text-[#7CB342] inline-block animate-gemoy">Lebih Happy!</span>
                    ✨
                </h1>
                <p class="text-base sm:text-lg text-[#558B2F] leading-relaxed max-w-md mx-auto lg:mx-0">
                    Aplikasi catatan kebun pintar yang dibekali "otak robot" super cerdas. Kamu tinggal masukin data,
                    robot kami yang mikir kapan tanaman harus disiram!
                </p>
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start pt-2">
                    <a href="{{ route('register') }}"
                        class="px-8 py-4 bg-[#7CB342] hover:bg-[#689F38] text-white font-bold text-sm rounded-2xl border-b-4 border-[#558B2F] shadow-lg transition transform active:scale-95">
                        Buat Akun Kebunmu 🚀
                    </a>
                    <a href="#otak-ai"
                        class="px-8 py-4 bg-white hover:bg-[#F1F8E9] text-[#558B2F] font-bold text-sm rounded-2xl border-2 border-[#DCEDC8] shadow-md transition">
                        Intip Otak AI-nya 🧠
                    </a>
                </div>
            </div>

            <div class="flex justify-center relative w-full">
                <div
                    class="bg-white p-10 rounded-3xl border-4 border-[#DCEDC8] shadow-xl max-w-md w-full text-center relative overflow-hidden">
                    <div class="absolute -top-12 -left-12 w-28 h-28 bg-[#FFF9C4] rounded-full opacity-60"></div>

                    <div class="text-8xl my-8 animate-pulse-lucu inline-block">
                        🫖 </div>
                    <h3 class="text-2xl font-black text-[#33691E]">Ciko si Teko</h3>
                    <p class="text-sm text-gray-400 mt-1">Status saat ini:</p>

                    <div
                        class="mt-5 bg-[#E8F5E9] p-4 rounded-2xl border-2 border-[#C8E6C9] inline-block text-sm font-bold text-[#2E7D32] shadow-xs">
                        <i class="fa-solid fa-face-smile text-lg mr-1 animate-bounce"></i> "Tanahku cukup basah,
                        makasih
                        ya!"
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-8 text-sm text-left">
                        <div
                            class="bg-[#F1F8E9] p-4 rounded-2xl border border-[#DCEDC8] flex items-center gap-3 shadow-xs">
                            <i class="fa-solid fa-temperature-three-quarters text-orange-400 text-2xl"></i>
                            <div>
                                <span
                                    class="block text-[10px] text-gray-400 font-bold uppercase tracking-wider">SUHU</span>
                                <span class="font-black text-base text-[#1B5E20]">28.5°C</span>
                            </div>
                        </div>
                        <div
                            class="bg-[#F1F8E9] p-4 rounded-2xl border border-[#DCEDC8] flex items-center gap-3 shadow-xs">
                            <i class="fa-solid fa-droplet text-blue-400 text-2xl"></i>
                            <div>
                                <span
                                    class="block text-[10px] text-gray-400 font-bold uppercase tracking-wider">POMPA</span>
                                <span class="font-black text-red-500 text-sm">BOBO / OFF</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    <section id="otak-ai" class="py-20 bg-white border-y-4 border-[#DCEDC8]">
        <div class="max-w-5xl mx-auto px-2">
            <div class="text-center max-w-md mx-auto mb-12 space-y-2">
                <h2 class="text-xm font-bold text-[#7CB342] uppercase tracking-wider">🔬 Kamus AI Kebun Pintar</h2>
                <p class="text-4xl font-black text-[#1B5E20]">Gimana Cara Dua Robot Kami Belajar?</p>
                <p class="text-xm text-gray-400">Tenang, gak usah pusing. Ini penjelasan versi super gampangnya!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div
                    class="bg-[#FFFDE7] p-6 rounded-3xl border-3 border-[#FFF59D] relative group hover:scale-[1.01] transition">
                    <div class="text-4xl mb-4">🗂️</div>
                    <h3 class="text-lg font-bold text-[#F57F17] mb-1">Robot Pengelompok (K-Means)</h3>
                    <p class="text-xs text-[#5D4037] leading-relaxed">
                        Tugas robot ini mirip kayak misahin mainan. Dia otomatis mengelompokkan kondisi tanahmu ke
                        kotak-kotak kategori: <strong class="text-[#E65100]">"Tanah Kering"</strong>, <strong
                            class="text-[#0D47A1]">"Tanah Basah"</strong>, atau <strong class="text-[#1B5E20]">"Tanah
                            Ideal"</strong> biar kita gak salah tebak!
                    </p>
                </div>

                <div
                    class="bg-[#E8F5E9] p-6 rounded-3xl border-3 border-[#C8E6C9] relative group hover:scale-[1.01] transition">
                    <div class="text-4xl mb-4">🧠</div>
                    <h3 class="text-lg font-bold text-[#2E7D32] mb-1">Robot Peramal Waktu (ANN)</h3>
                    <p class="text-xs text-[#5D4037] leading-relaxed">
                        Ini robot yang meniru cara kerja otak manusia. Dia mengingat riwayat siraman di masa lalu untuk
                        meramal secara jitu: <strong class="text-[#2E7D32]">Berapa lama pompa air harus
                            dinyalakan</strong> biar airnya gak kebuang sia-sia. Super hemat air!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur-seru" class="py-20 max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-xm font-bold text-[#7CB342] uppercase tracking-wider">🛠️ Ruang Kendali Kebun</h2>
            <p class="text-4xl font-black text-[#1B5E20]">Apa Saja yang Bisa Kamu Lakukan?</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                class="bg-white p-5 rounded-2xl border-2 border-[#DCEDC8] space-y-2 flex flex-col items-center text-center">
                <div
                    class="text-3xl bg-[#F1F8E9] w-12 h-12 rounded-full flex items-center justify-center text-[#7CB342]">
                    <i class="fa-solid fa-file-circle-plus"></i>
                </div>
                <h4 class="font-bold text-sm text-[#33691E]">Catat Kondisi Lahan</h4>
                <p class="text-xs text-gray-400">Tinggal ketik kelembapan & suhu, gak pake ribet!</p>
            </div>
            <div
                class="bg-white p-5 rounded-2xl border-2 border-[#DCEDC8] space-y-2 flex flex-col items-center text-center">
                <div
                    class="text-3xl bg-[#F1F8E9] w-12 h-12 rounded-full flex items-center justify-center text-[#7CB342]">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <h4 class="font-bold text-sm text-[#33691E]">Pantau Grafik Seru</h4>
                <p class="text-xs text-gray-400">Melihat pergerakan grafik naik-turun kondisi tanamanmu.</p>
            </div>
            <div
                class="bg-white p-5 rounded-2xl border-2 border-[#DCEDC8] space-y-2 flex flex-col items-center text-center">
                <div
                    class="text-3xl bg-[#F1F8E9] w-12 h-12 rounded-full flex items-center justify-center text-[#7CB342]">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h4 class="font-bold text-sm text-[#33691E]">Belajar Ulang Otomatis</h4>
                <p class="text-xs text-gray-400">Tiap kamu edit atau hapus data, robot langsung belajar hal baru!</p>
            </div>
        </div>
    </section>

    <footer class="bg-[#33691E] text-[#DCEDC8] py-10 border-t-4 border-[#558B2F] text-xs text-center font-medium">
        <div class="max-w-5xl mx-auto px-6 space-y-2">
            <p class="text-sm text-white font-bold">🌱 Kelompok Living Lab - Universitas Pendidikan Ganesha</p>
            <p class="text-[#C5E1A5]">Dibuat dengan rasa sayang lingkungan untuk memenuhi Project Akhir Web Framework
                2026.</p>
            <div class="text-[#9CCC65] pt-4 text-[10px]">
                &copy; 2026 Tim Kebun Pintar Siram-Sah. Berhasil Disusun, Cuy!
            </div>
        </div>
    </footer>

</body>

</html>
<!-- <!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siram-Sah! Kebun Pintar Gemoy</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
    body {
        font-family: 'Fredoka', sans-serif;
    }

    /* Animasi Goyang-Goyang Lucu */
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

    /* Animasi Detak Jantung Maskot */
    @keyframes super-pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.08);
        }
    }

    .animate-pulse-lucu {
        animation: super-pulse 2s infinite ease-in-out;
    }
    </style>
</head>

<body class="bg-[#F9FBE7] text-[#33691E] antialiased selection:bg-[#DCEDC8]">

    <nav class="sticky top-0 z-50 bg-white/90 border-b-4 border-[#DCEDC8] backdrop-blur-md px-6 py-3">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="#" class="text-2xl font-bold flex items-center gap-2 text-[#558B2F] tracking-wide">
                <span class="text-3xl animate-gemoy inline-block">🌱</span> Siram-Sah!
            </a>

            <div class="hidden md:flex items-center gap-6 text-sm font-semibold text-[#689F38]">
                <a href="#cerita" class="hover:text-[#33691E] transition">Kenalan Yuk</a>
                <a href="#otak-ai" class="hover:text-[#33691E] transition">Otak Pintar AI</a>
                <a href="#fitur-seru" class="hover:text-[#33691E] transition">Fitur Seru</a>
            </div>

            <div class="flex items-center gap-3">
                @auth
                <a href="{{ route('dashboard') }}"
                    class="text-xs font-bold text-white bg-[#7CB342] hover:bg-[#689F38] border-b-4 border-[#558B2F] px-4 py-2.5 rounded-2xl transition transform active:scale-95">
                    Ke Kebun Saya <i class="fa-solid fa-arrow-right-to-bracket ml-1"></i>
                </a>
                @else
                <a href="{{ route('login') }}"
                    class="text-xs font-bold text-[#689F38] hover:text-[#33691E] transition">Masuk</a>
                <a href="{{ route('register') }}"
                    class="text-xs font-bold text-white bg-[#9CCC65] hover:bg-[#8BC34A] border-b-4 border-[#7CB342] px-4 py-2.5 rounded-2xl transition transform active:scale-95 shadow-sm">
                    Yuk Daftar! 🎉
                </a>
                @endif
            </div>
        </div>
    </nav>

    <header class="py-16 px-6 max-w-6xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6 text-center lg:text-left">
            <span
                class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-bold bg-[#E8F5E9] text-[#2E7D32] border border-[#A5D6A7]">
                <i class="fa-solid fa-wand-magic-sparkles animate-spin" style="animation-duration: 3s;"></i> Proyek
                Kelompok Living Lab Undiksha
            </span>
            <h1 class="text-4xl sm:text-5xl font-black text-[#1B5E20] leading-tight">
                Bantu Jaga Tanaman Jadi <span class="text-[#7CB342] inline-block animate-gemoy">Lebih Happy!</span> ✨
            </h1>
            <p class="text-base text-[#558B2F] leading-relaxed max-w-md mx-auto lg:mx-0">
                Aplikasi catatan kebun pintar yang dibekali "otak robot" super cerdas. Kamu tinggal masukin data, robot
                kami yang mikir kapan tanaman harus disiram!
            </p>
            <div class="flex flex-wrap gap-4 justify-center lg:justify-start pt-2">
                <a href="{{ route('register') }}"
                    class="px-6 py-3 bg-[#7CB342] hover:bg-[#689F38] text-white font-bold text-sm rounded-2xl border-b-4 border-[#558B2F] shadow-md transition transform active:scale-95">
                    Buat Akun Kebunmu 🚀
                </a>
                <a href="#otak-ai"
                    class="px-6 py-3 bg-white hover:bg-[#F1F8E9] text-[#558B2F] font-bold text-sm rounded-2xl border-2 border-[#DCEDC8] shadow-xs transition">
                    Intip Otak AI-nya 🧠
                </a>
            </div>
        </div>

        <div class="flex justify-center relative">
            <div
                class="bg-white p-8 rounded-3xl border-4 border-[#DCEDC8] shadow-lg max-w-sm w-full text-center relative overflow-hidden">
                <div class="absolute -top-12 -left-12 w-24 h-24 bg-[#FFF9C4] rounded-full opacity-60"></div>

                <div class="text-7xl my-6 animate-pulse-lucu inline-block">
                    🌵
                </div>
                <h3 class="text-xl font-bold text-[#33691E]">Ciko si Kaktus</h3>
                <p class="text-xs text-[#757575] mt-1">Status saat ini:</p>

                <div
                    class="mt-4 bg-[#E8F5E9] p-3 rounded-2xl border-2 border-[#C8E6C9] inline-block text-xs font-bold text-[#2E7D32]">
                    <i class="fa-solid fa-face-smile text-base mr-1 animate-bounce"></i> "Tanahku cukup basah, makasih
                    ya!"
                </div>

                <div class="grid grid-cols-2 gap-2 mt-6 text-xs text-left">
                    <div class="bg-[#F1F8E9] p-2.5 rounded-xl border border-[#DCEDC8] flex items-center gap-2">
                        <i class="fa-solid fa-temperature-three-quarters text-orange-400 text-sm"></i>
                        <div>
                            <span class="block text-[10px] text-gray-400">SUHU</span>
                            <span class="font-bold">28.5°C</span>
                        </div>
                    </div>
                    <div class="bg-[#F1F8E9] p-2.5 rounded-xl border border-[#DCEDC8] flex items-center gap-2">
                        <i class="fa-solid fa-droplet text-blue-400 text-sm"></i>
                        <div>
                            <span class="block text-[10px] text-gray-400">POMPA</span>
                            <span class="font-bold text-red-500">BOBO / OFF</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="otak-ai" class="py-16 bg-white border-y-4 border-[#DCEDC8]">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center max-w-md mx-auto mb-12 space-y-2">
                <h2 class="text-xs font-bold text-[#7CB342] uppercase tracking-wider">🔬 Kamus AI Kebun Pintar</h2>
                <p class="text-2xl font-black text-[#1B5E20]">Gimana Cara Dua Robot Kami Belajar?</p>
                <p class="text-xs text-gray-400">Tenang, gak usah pusing. Ini penjelasan versi super gampangnya!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div
                    class="bg-[#FFFDE7] p-6 rounded-3xl border-3 border-[#FFF59D] relative group hover:scale-[1.01] transition">
                    <div class="text-4xl mb-4">🗂️</div>
                    <h3 class="text-lg font-bold text-[#F57F17] mb-1">Robot Pengelompok (K-Means)</h3>
                    <p class="text-xs text-[#5D4037] leading-relaxed">
                        Tugas robot ini mirip kayak misahin mainan. Dia otomatis mengelompokkan kondisi tanahmu ke
                        kotak-kotak kategori: <strong class="text-[#E65100]">"Tanah Kering"</strong>, <strong
                            class="text-[#0D47A1]">"Tanah Basah"</strong>, atau <strong class="text-[#1B5E20]">"Tanah
                            Ideal"</strong> biar kita gak salah tebak!
                    </p>
                </div>

                <div
                    class="bg-[#E8F5E9] p-6 rounded-3xl border-3 border-[#C8E6C9] relative group hover:scale-[1.01] transition">
                    <div class="text-4xl mb-4">🧠</div>
                    <h3 class="text-lg font-bold text-[#2E7D32] mb-1">Robot Peramal Waktu (ANN)</h3>
                    <p class="text-xs text-[#5D4037] leading-relaxed">
                        Ini robot yang meniru cara kerja otak manusia. Dia mengingat riwayat siraman di masa lalu untuk
                        meramal secara jitu: <strong class="text-[#2E7D32]">Berapa lama pompa air harus
                            dinyalakan</strong> biar airnya gak kebuang sia-sia. Super hemat air!
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="fitur-seru" class="py-16 max-w-5xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-xs font-bold text-[#7CB342] uppercase tracking-wider">🛠️ Ruang Kendali Kebun</h2>
            <p class="text-2xl font-black text-[#1B5E20]">Apa Saja yang Bisa Kamu Lakukan?</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                class="bg-white p-5 rounded-2xl border-2 border-[#DCEDC8] space-y-2 flex flex-col items-center text-center">
                <div
                    class="text-3xl bg-[#F1F8E9] w-12 h-12 rounded-full flex items-center justify-center text-[#7CB342]">
                    <i class="fa-solid fa-file-circle-plus"></i>
                </div>
                <h4 class="font-bold text-sm text-[#33691E]">Catat Kondisi Lahan</h4>
                <p class="text-xs text-gray-400">Tinggal ketik kelembapan & suhu, gak pake ribet!</p>
            </div>
            <div
                class="bg-white p-5 rounded-2xl border-2 border-[#DCEDC8] space-y-2 flex flex-col items-center text-center">
                <div
                    class="text-3xl bg-[#F1F8E9] w-12 h-12 rounded-full flex items-center justify-center text-[#7CB342]">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <h4 class="font-bold text-sm text-[#33691E]">Pantau Grafik Seru</h4>
                <p class="text-xs text-gray-400">Melihat pergerakan grafik naik-turun kondisi tanamanmu.</p>
            </div>
            <div
                class="bg-white p-5 rounded-2xl border-2 border-[#DCEDC8] space-y-2 flex flex-col items-center text-center">
                <div
                    class="text-3xl bg-[#F1F8E9] w-12 h-12 rounded-full flex items-center justify-center text-[#7CB342]">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h4 class="font-bold text-sm text-[#33691E]">Belajar Ulang Otomatis</h4>
                <p class="text-xs text-gray-400">Tiap kamu edit atau hapus data, robot langsung belajar hal baru!</p>
            </div>
        </div>
    </section>

    <footer class="bg-[#33691E] text-[#DCEDC8] py-10 border-t-4 border-[#558B2F] text-xs text-center font-medium">
        <div class="max-w-5xl mx-auto px-6 space-y-2">
            <p class="text-sm text-white font-bold">🌱 Kelompok Living Lab - Universitas Pendidikan Ganesha</p>
            <p class="text-[#C5E1A5]">Dibuat dengan rasa sayang lingkungan untuk memenuhi Project Akhir Web Framework
                2026.</p>
            <div class="text-[#9CCC65] pt-4 text-[10px]">
                &copy; 2026 Tim Kebun Pintar Siram-Sah. Berhasil Disusun, Cuy!
            </div>
        </div>
    </footer>

</body>

</html> -->