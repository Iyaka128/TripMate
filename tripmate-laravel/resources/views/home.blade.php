{{-- View: HTML dan presentasi TripMate. Data disiapkan oleh DestinationController. --}}
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $siteName }} — Desain Eksplorasi Premium (Tailwind CSS & Laravel)</title>
    <meta name="description" content="{{ $siteDescription }}">
    <meta name="theme-color" content="#ffffff">

    <!-- Preconnect Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Compiled Tailwind Stylesheet -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body class="bg-[#fbfbfd] text-[#1d1d1f] font-sans antialiased selection:bg-blue-500/20 selection:text-[#0071e3] overflow-x-hidden">

    <!-- Apple Dynamic Island Style Toast -->
    <div id="appleToast" class="fixed top-6 left-1/2 -translate-x-1/2 -translate-y-32 opacity-0 scale-90 z-50 flex items-center gap-3.5 bg-black text-white px-6 py-3 rounded-full border border-white/20 shadow-2xl transition-all duration-500 ease-[cubic-bezier(0.34,1.56,0.64,1)] pointer-events-none" role="alert" aria-live="polite">
        <span class="toast-badge text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-[#34c759] text-white flex-shrink-0">Sukses</span>
        <div>
            <div class="toast-title text-xs font-bold tracking-tight">Notifikasi</div>
            <div class="toast-desc text-[11px] text-white/70">Operasi berhasil dilakukan.</div>
        </div>
    </div>

    <!-- Frosted Glass Navbar -->
    <header class="sticky top-0 z-50 w-full apple-glass border-b border-black/[0.06] transition-all">
        <nav class="max-w-6xl mx-auto min-h-16 py-3 px-6 flex flex-col md:flex-row items-center justify-between gap-3 md:gap-0">
            <!-- Brand Logo -->
            <div class="w-full md:w-auto flex items-center justify-between">
                <a href="#home" class="text-xl font-extrabold tracking-tight text-[#1d1d1f] hover:text-[#0071e3] transition-colors">
                    {{ $siteName }}
                </a>

                <a href="#paket" class="inline-flex md:hidden items-center justify-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#0071e3] text-white shadow-sm">
                    Pesan Paket
                </a>
            </div>

            <!-- Navigation Links -->
            <ul class="flex items-center gap-1.5 md:gap-2 overflow-x-auto w-full md:w-auto pb-1 md:pb-0 no-scrollbar justify-start md:justify-center">
                <li><a href="#home" class="px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-semibold text-[#1d1d1f] bg-black/[0.04] whitespace-nowrap transition-colors">Home</a></li>
                <li><a href="#destinasi" class="px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium text-[#6e6e73] hover:text-[#1d1d1f] hover:bg-black/[0.04] whitespace-nowrap transition-colors">Destinasi</a></li>
                <li><a href="#keunggulan" class="px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium text-[#6e6e73] hover:text-[#1d1d1f] hover:bg-black/[0.04] whitespace-nowrap transition-colors">Keunggulan</a></li>
                <li><a href="#paket" class="px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium text-[#6e6e73] hover:text-[#1d1d1f] hover:bg-black/[0.04] whitespace-nowrap transition-colors">Paket Wisata</a></li>
                <li><a href="#tentang" class="px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium text-[#6e6e73] hover:text-[#1d1d1f] hover:bg-black/[0.04] whitespace-nowrap transition-colors">Tentang</a></li>
                <li><a href="#kontak" class="px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-medium text-[#6e6e73] hover:text-[#1d1d1f] hover:bg-black/[0.04] whitespace-nowrap transition-colors">Kontak</a></li>
            </ul>

            <!-- Desktop Action CTA -->
            <div class="hidden md:flex items-center">
                <a href="#paket" class="inline-flex items-center justify-center px-4 py-2 rounded-full text-xs font-semibold bg-[#0071e3] text-white hover:bg-[#0077ed] active:bg-[#0062c4] transition-all shadow-md shadow-blue-500/20 hover:-translate-y-0.5">
                    Pesan Paket
                </a>
            </div>
        </nav>
    </header>

    <main>

        <!-- Apple Keynote Hero Section -->
        <section id="home" class="relative min-h-[85vh] flex items-center justify-center px-6 py-20 bg-[#0b0c10] overflow-hidden bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=2070&q=80');">
            <div class="absolute inset-0 bg-gradient-to-b from-black/45 via-black/65 to-black/85 backdrop-blur-[2px]"></div>

            <div class="relative z-10 max-w-4xl mx-auto text-center text-white flex flex-col items-center">
                <!-- Eyebrow Pill -->
                <div class="inline-flex items-center apple-glass-pill border border-white/20 px-4 py-1.5 rounded-full text-xs font-semibold text-slate-100 mb-6 shadow-lg shadow-black/20">
                    {{ $siteTagline }}
                </div>

                <!-- Hero Title -->
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-apple-tight leading-[1.08] mb-6 text-white drop-shadow-sm">
                    Jelajahi Dunia Bersama {{ $siteName }}.
                </h1>

                <!-- Hero Subtitle -->
                <p class="text-base sm:text-xl text-white/85 max-w-2xl leading-relaxed mb-10 font-normal">
                    {{ $siteDescription }}
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap items-center justify-center gap-4 mb-14">
                    <a href="#destinasi" class="inline-flex items-center px-8 py-3.5 rounded-full text-sm sm:text-base font-semibold bg-[#0071e3] text-white hover:bg-[#0077ed] active:bg-[#0062c4] transition-all shadow-lg shadow-blue-500/30 hover:-translate-y-0.5">
                        Mulai Eksplorasi
                    </a>
                    <a href="#paket" class="inline-flex items-center px-8 py-3.5 rounded-full text-sm sm:text-base font-semibold bg-white/15 hover:bg-white/25 text-white border border-white/30 backdrop-blur-md transition-all hover:-translate-y-0.5">
                        Lihat Paket Pilihan
                    </a>
                </div>

                <!-- Floating Metrics Pill (Dynamic Blade Loop) -->
                <div class="flex flex-wrap md:flex-nowrap items-center justify-center gap-6 sm:gap-10 apple-glass-pill border border-white/15 px-6 sm:px-10 py-4 rounded-3xl md:rounded-full shadow-2xl">
                    @foreach ($heroMetrics as $index => $metric)
                        @if ($index > 0)
                            <div class="hidden sm:block w-px h-8 bg-white/20"></div>
                        @endif
                        <div class="flex flex-col items-center">
                            <span class="text-xl sm:text-2xl font-extrabold tracking-tight text-white">{{ $metric['angka'] }}</span>
                            <span class="text-xs text-white/70 font-medium">{{ $metric['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- ============================================================ -->
        <!-- [ELOQUENT ORM] KATALOG DESTINASI (Model Destination)          -->
        <!-- ============================================================ -->
        <section id="destinasi" class="max-w-6xl mx-auto px-6 py-24">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] mb-2 block">Destinasi Pilihan</span>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-[#1d1d1f] mb-3">Koleksi Destinasi Populer</h2>
                <p class="text-base text-[#6e6e73]">Tempat-tempat eksotis terverifikasi dengan pengalaman tak tertandingi.</p>
            </div>

            <!-- Dynamic Grid Cards dari tabel destinations (Eloquent) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($destinasiList as $dest)
                    @php
                        // Conditional Badge untuk Status Ketersediaan
                        $statusBadgeClass = $dest->status === 'Tersedia'
                            ? 'bg-[#34c759] text-white' // Hijau
                            : 'bg-[#ff9500] text-white'; // Oranye
                    @endphp
                <article class="bg-white rounded-[24px] overflow-hidden flex flex-col border border-black/[0.06] shadow-apple-sm hover:shadow-apple-hover hover:-translate-y-2 transition-all duration-300 group">
                    <div class="relative h-64 overflow-hidden">
                        <img
                            src="{{ $dest->gambar }}"
                            alt="{{ $dest->nama }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='{{ $dest->gambar_alt }}'"
                        >
                        <!-- Kategori Badge -->
                        <span class="absolute top-4 left-4 bg-black/50 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full">
                            {{ $dest->kategori }}
                        </span>

                        <!-- Status Badge (Conditional) -->
                        <span class="absolute top-4 right-4 {{ $statusBadgeClass }} text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full shadow-md">
                            {{ $dest->status }}
                        </span>

                        <!-- Rating Badge -->
                        <span class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-md text-[#1d1d1f] text-xs font-bold px-2.5 py-1 rounded-full shadow-md">
                            Rating {{ number_format($dest->rating, 2) }}
                        </span>
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <div class="text-xs text-[#86868b] font-medium mb-2">
                            {{ $dest->wilayah }}
                        </div>
                        <h3 class="text-xl font-bold tracking-tight text-[#1d1d1f] mb-2">
                            {{ $dest->nama }}
                        </h3>
                        <p class="text-sm text-[#6e6e73] leading-relaxed mb-6 flex-1">
                            {{ $dest->deskripsi }}
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-black/[0.06]">
                            <div>
                                <span class="block text-[11px] text-[#86868b]">Mulai dari</span>
                                <span class="text-base font-bold text-[#0071e3]">{{ $dest->harga }}</span>
                            </div>
                            <a href="#paket" class="text-sm font-semibold text-[#0071e3] hover:underline">
                                Lihat Detail &rarr;
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </section>


        <!-- Apple Bento Grid: Keunggulan TripMate -->
        <section id="keunggulan" class="max-w-6xl mx-auto px-6 py-20">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] mb-2 block">Mengapa TripMate</span>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-[#1d1d1f] mb-3">Dirancang untuk Kenyamanan Penuh.</h2>
                <p class="text-base text-[#6e6e73]">Setiap detail pengalaman berlibur telah disempurnakan demi kepuasanmu.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Bento 1: Large Featured Dark Card -->
                <div class="md:col-span-2 bg-gradient-to-br from-[#1c1c1e] to-[#121214] text-white rounded-[28px] p-8 sm:p-10 border border-white/10 shadow-apple-sm relative overflow-hidden flex flex-col justify-between hover:-translate-y-1 hover:shadow-apple-card transition-all duration-300">
                    <div>
                        <span class="inline-block bg-white/15 text-white text-[11px] font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-6">Eksklusivitas</span>
                        <h3 class="text-2xl sm:text-3xl font-bold tracking-tight mb-3 text-white">Kurasi Premium Tanpa Kompromi</h3>
                        <p class="text-sm sm:text-base text-[#a1a1a6] leading-relaxed max-w-lg">
                            Kami menginspeksi langsung setiap resor, armada transportasi, dan pemandu lokal untuk memastikan standar privasi, higienitas, dan kemewahan sejati.
                        </p>
                    </div>
                    <div class="mt-8 text-sm font-semibold text-white/70">
                        Standar Kualitas Bintang Lima
                    </div>
                </div>

                <!-- Bento 2: Fast Booking -->
                <div class="bg-white text-[#1d1d1f] rounded-[28px] p-8 border border-black/[0.06] shadow-apple-sm flex flex-col justify-between hover:-translate-y-1 hover:shadow-apple-card transition-all duration-300">
                    <div>
                        <span class="inline-block bg-blue-50 text-[#0071e3] text-[11px] font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-6">Seamless</span>
                        <h3 class="text-xl font-bold tracking-tight mb-2">Pemesanan Cepat 60 Detik</h3>
                        <p class="text-sm text-[#6e6e73] leading-relaxed">Konfirmasi instan, tiket digital di genggaman, dan tanpa proses berbelit.</p>
                    </div>
                    <div class="mt-6 text-xl font-extrabold text-[#0071e3]">1-Click Booking</div>
                </div>

                <!-- Bento 3: Transparent Pricing -->
                <div class="bg-white text-[#1d1d1f] rounded-[28px] p-8 border border-black/[0.06] shadow-apple-sm flex flex-col justify-between hover:-translate-y-1 hover:shadow-apple-card transition-all duration-300">
                    <div>
                        <span class="inline-block bg-blue-50 text-[#0071e3] text-[11px] font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-6">Transparan</span>
                        <h3 class="text-xl font-bold tracking-tight mb-2">Harga Jujur, Nol Biaya Tersembunyi</h3>
                        <p class="text-sm text-[#6e6e73] leading-relaxed">Apa yang kamu lihat adalah yang kamu bayar. Semua pajak dan layanan sudah terhitung rapi.</p>
                    </div>
                    <div class="mt-6 text-xl font-extrabold text-[#0071e3]">100% Clear</div>
                </div>

                <!-- Bento 4: 24/7 Concierge -->
                <div class="md:col-span-2 bg-white text-[#1d1d1f] rounded-[28px] p-8 sm:p-10 border border-black/[0.06] shadow-apple-sm flex flex-col justify-between hover:-translate-y-1 hover:shadow-apple-card transition-all duration-300">
                    <div>
                        <span class="inline-block bg-blue-50 text-[#0071e3] text-[11px] font-bold uppercase tracking-wider px-3 py-1 rounded-full mb-6">Concierge 24/7</span>
                        <h3 class="text-2xl font-bold tracking-tight mb-2">Pendamping Perjalanan Selalu Ada</h3>
                        <p class="text-sm sm:text-base text-[#6e6e73] leading-relaxed">
                            Dari perubahan cuaca mendadak hingga rekomendasi restoran rahasia, asisten cerdas TripMate dan tim personal siap sedia mendampingi kapan pun kamu butuhkan.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <!-- ============================================================ -->
        <!-- [ELOQUENT ORM] PAKET WISATA (Model Package)                   -->
        <!-- ============================================================ -->
        <section id="paket" class="bg-[#f5f5f7] py-24 px-6 border-y border-black/[0.04]">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] mb-2 block">Pilihan Paket</span>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-[#1d1d1f] mb-3">Paket Wisata Terpilih</h2>
                <p class="text-base text-[#6e6e73]">Fleksibilitas paket terbaik yang dapat disesuaikan dengan ritme liburanmu.</p>
            </div>

            <!-- Dynamic Render Paket Wisata dari tabel packages (Blade loop + conditional) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-stretch">
                @foreach ($paketWisata as $paket)
                    @if ($paket->is_popular)
                        <!-- Apple Pro Flagship Card (Tingkat Populer) -->
                        <article class="bg-white rounded-[28px] p-8 sm:p-10 border-2 border-[#0071e3] shadow-apple-glow flex flex-col relative md:-translate-y-2 hover:-translate-y-3 transition-all duration-300">
                            <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-[#0071e3] text-white text-[11px] font-bold uppercase tracking-wider px-4 py-1 rounded-full shadow-md shadow-blue-500/30">
                                Paling Populer
                            </span>

                            <div class="mb-6">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] block mb-1">{{ $paket->tier }}</span>
                                <h3 class="text-2xl font-bold tracking-tight text-[#1d1d1f] mb-2">{{ $paket->judul }}</h3>
                                <p class="text-xs text-[#6e6e73]">{{ $paket->deskripsi }}</p>
                            </div>

                            <div class="flex items-baseline gap-1 mb-8 pb-6 border-b border-black/[0.06]">
                                <span class="text-lg font-bold text-[#1d1d1f]">Rp</span>
                                <span class="text-4xl font-extrabold tracking-tight text-[#1d1d1f]">{{ $paket->harga }}</span>
                                <span class="text-xs text-[#86868b]">/ orang</span>
                            </div>

                            <ul class="flex flex-col gap-3.5 mb-8 flex-1">
                                @foreach ($paket->fasilitas as $fitur)
                                    <li class="flex items-center gap-2.5 text-sm text-[#6e6e73]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#0071e3] flex-shrink-0"></span>
                                        {{ $fitur }}
                                    </li>
                                @endforeach
                            </ul>

                            <a href="#kontak" class="w-full text-center py-3.5 px-6 rounded-full text-sm font-semibold bg-[#0071e3] hover:bg-[#0077ed] text-white shadow-lg shadow-blue-500/25 transition-all">
                                Pilih Paket
                            </a>
                        </article>
                    @else
                        <!-- Regular Package Card -->
                        <article class="bg-white rounded-[28px] p-8 sm:p-10 border border-black/[0.06] shadow-apple-sm flex flex-col hover:-translate-y-2 hover:shadow-apple-hover transition-all duration-300">
                            <div class="mb-6">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] block mb-1">{{ $paket->tier }}</span>
                                <h3 class="text-2xl font-bold tracking-tight text-[#1d1d1f] mb-2">{{ $paket->judul }}</h3>
                                <p class="text-xs text-[#6e6e73]">{{ $paket->deskripsi }}</p>
                            </div>

                            <div class="flex items-baseline gap-1 mb-8 pb-6 border-b border-black/[0.06]">
                                <span class="text-lg font-bold text-[#1d1d1f]">Rp</span>
                                <span class="text-4xl font-extrabold tracking-tight text-[#1d1d1f]">{{ $paket->harga }}</span>
                                <span class="text-xs text-[#86868b]">/ orang</span>
                            </div>

                            <ul class="flex flex-col gap-3.5 mb-8 flex-1">
                                @foreach ($paket->fasilitas as $fitur)
                                    <li class="flex items-center gap-2.5 text-sm text-[#6e6e73]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#0071e3] flex-shrink-0"></span>
                                        {{ $fitur }}
                                    </li>
                                @endforeach
                            </ul>

                            <a href="#kontak" class="w-full text-center py-3.5 px-6 rounded-full text-sm font-semibold bg-black/[0.05] hover:bg-black/[0.08] text-[#1d1d1f] border border-black/[0.06] transition-colors">
                                Pilih Paket
                            </a>
                        </article>
                    @endif
                @endforeach
            </div>
        </section>


        <!-- Tentang Kami -->
        <section id="tentang" class="max-w-4xl mx-auto px-6 py-24 text-center">
            <div class="mb-10">
                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] mb-2 block">Filosofi Kami</span>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-[#1d1d1f]">Tentang {{ $siteName }}</h2>
            </div>

            <p class="text-xl sm:text-2xl font-semibold tracking-tight text-[#1d1d1f] mb-8 leading-snug">
                "Setiap perjalanan bukan sekadar berpindah tempat, melainkan cara kita memperluas cakrawala jiwa."
            </p>

            <div class="space-y-4 text-base sm:text-lg text-[#6e6e73] leading-relaxed max-w-3xl mx-auto mb-16">
                <p>
                    TripMate lahir dari gagasan sederhana: membuat seni bepergian menjadi begitu anggun, tanpa beban, dan berkesan mendalam. Kami memadukan kurasi destinasi bernilai seni tinggi dengan dukungan operasional yang presisi.
                </p>
                <p>
                    Bersama jaringan mitra hotel bintang lima, pemandu lokal bersertifikat, dan teknologi pemesanan modern, TripMate hadir sebagai pendamping setia sejak langkah pertama rencana hingga kembali ke rumah dengan kisah istimewa.
                </p>
            </div>

            <!-- Metric Pillars -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-[#f5f5f7] p-8 rounded-[20px] border border-black/[0.06] hover:bg-white hover:shadow-apple-sm transition-all">
                    <div class="text-3xl font-extrabold text-[#0071e3] mb-1">99.8%</div>
                    <div class="text-xs font-semibold text-[#6e6e73]">Indeks Kepuasan Pelanggan</div>
                </div>
                <div class="bg-[#f5f5f7] p-8 rounded-[20px] border border-black/[0.06] hover:bg-white hover:shadow-apple-sm transition-all">
                    <div class="text-3xl font-extrabold text-[#0071e3] mb-1">150+</div>
                    <div class="text-xs font-semibold text-[#6e6e73]">Mitra Hotel & Resort Teruji</div>
                </div>
                <div class="bg-[#f5f5f7] p-8 rounded-[20px] border border-black/[0.06] hover:bg-white hover:shadow-apple-sm transition-all">
                    <div class="text-3xl font-extrabold text-[#0071e3] mb-1">100%</div>
                    <div class="text-xs font-semibold text-[#6e6e73]">Garansi Perlindungan Perjalanan</div>
                </div>
            </div>
        </section>


        <!-- ============================================================ -->
        <!-- [LARAVEL] FORMULIR KONTAK & RESERVASI (POST ke Controller)    -->
        <!-- ============================================================ -->
        <section id="kontak" class="max-w-6xl mx-auto px-6 py-20">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] mb-2 block">Dukungan 24/7</span>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-[#1d1d1f] mb-3">Hubungi Kami</h2>
                <p class="text-base text-[#6e6e73]">Punya rencana khusus atau butuh konsultasi perjalanan? Kami siap membantu.</p>
            </div>

            <!-- Notifikasi dari Laravel session flash / validation errors -->
            @if ($errors->any())
                <div data-form-status="error" data-title="Form Belum Lengkap" data-message="{{ $errors->first() }}" class="max-w-4xl mx-auto mb-8 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 flex items-center justify-between">
                    <div>
                        <span class="font-bold text-sm block">Form Belum Lengkap</span>
                        <span class="text-xs">{{ $errors->first() }}</span>
                    </div>
                    <span class="text-xs font-semibold uppercase px-2.5 py-1 rounded-full bg-red-200 text-red-900">
                        Laravel Validation
                    </span>
                </div>
            @elseif (session('status'))
                <div data-form-status="{{ session('status')['tipe'] }}" data-title="{{ session('status')['judul'] }}" data-message="{{ session('status')['pesan'] }}" class="max-w-4xl mx-auto mb-8 p-4 rounded-2xl {{ session('status')['tipe'] === 'success' ? 'bg-green-50 border border-green-200 text-green-800' : 'bg-red-50 border border-red-200 text-red-800' }} flex items-center justify-between">
                    <div>
                        <span class="font-bold text-sm block">{{ session('status')['judul'] }}</span>
                        <span class="text-xs">{{ session('status')['pesan'] }}</span>
                    </div>
                    <span class="text-xs font-semibold uppercase px-2.5 py-1 rounded-full {{ session('status')['tipe'] === 'success' ? 'bg-green-200 text-green-900' : 'bg-red-200 text-red-900' }}">
                        Server-Side Processed
                    </span>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Sidebar Cards -->
                <div class="lg:col-span-5 flex flex-col gap-4">
                    <div class="bg-white p-6 rounded-[20px] border border-black/[0.06] shadow-apple-sm">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#0071e3] block mb-1">Email Resmi</span>
                        <h4 class="text-base font-bold text-[#1d1d1f]">{{ $contactEmail }}</h4>
                        <p class="text-xs text-[#6e6e73] mt-1">Konsultasi perjalanan & reservasi VIP</p>
                    </div>

                    <div class="bg-white p-6 rounded-[20px] border border-black/[0.06] shadow-apple-sm">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#0071e3] block mb-1">Telepon & WhatsApp</span>
                        <h4 class="text-base font-bold text-[#1d1d1f]">{{ $contactPhone }}</h4>
                        <p class="text-xs text-[#6e6e73] mt-1">Layanan konsumen aktif setiap hari</p>
                    </div>

                    <div class="bg-white p-6 rounded-[20px] border border-black/[0.06] shadow-apple-sm">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#0071e3] block mb-1">Kecepatan Pelayanan</span>
                        <h4 class="text-base font-bold text-[#1d1d1f]">Respon Dalam 5 Menit</h4>
                        <p class="text-xs text-[#6e6e73] mt-1">Tim siaga melayani pertanyaan Anda</p>
                    </div>
                </div>

                <!-- Form Container -->
                <form action="{{ url('/kontak') }}" method="post" class="lg:col-span-7 bg-white p-8 sm:p-10 rounded-[28px] border border-black/[0.06] shadow-apple-card space-y-5">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label for="nama" class="block text-xs font-bold text-[#1d1d1f]">Nama Lengkap</label>
                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                value="{{ old('nama') }}"
                                placeholder="e.g. Alexander Pratama"
                                required
                                class="w-full bg-[#f5f5f7] border border-black/[0.08] rounded-xl px-4 py-3 text-sm text-[#1d1d1f] focus:outline-none focus:bg-white focus:border-[#0071e3] focus:ring-4 focus:ring-blue-500/15 transition-all"
                            >
                        </div>

                        <div class="space-y-1.5">
                            <label for="email" class="block text-xs font-bold text-[#1d1d1f]">Alamat Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="alexander@domain.com"
                                required
                                class="w-full bg-[#f5f5f7] border border-black/[0.08] rounded-xl px-4 py-3 text-sm text-[#1d1d1f] focus:outline-none focus:bg-white focus:border-[#0071e3] focus:ring-4 focus:ring-blue-500/15 transition-all"
                            >
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label for="pesan" class="block text-xs font-bold text-[#1d1d1f]">Pesan atau Permintaan Khusus</label>
                        <textarea
                            id="pesan"
                            name="pesan"
                            rows="5"
                            placeholder="Ceritakan rencana perjalanan impianmu atau pertanyaan yang ingin diajukan..."
                            required
                            class="w-full bg-[#f5f5f7] border border-black/[0.08] rounded-xl px-4 py-3 text-sm text-[#1d1d1f] focus:outline-none focus:bg-white focus:border-[#0071e3] focus:ring-4 focus:ring-blue-500/15 transition-all resize-y min-h-[120px]"
                        >{{ old('pesan') }}</textarea>
                    </div>

                    <button type="submit" class="w-full inline-flex items-center justify-center py-3.5 px-6 rounded-full text-sm font-semibold bg-[#0071e3] text-white hover:bg-[#0077ed] active:bg-[#0062c4] transition-all shadow-lg shadow-blue-500/25">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </section>

    </main>


    <!-- Apple Style Minimalist Footer -->
    <footer class="bg-[#f5f5f7] border-t border-black/[0.06] pt-16 pb-12 text-[#6e6e73]">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 pb-12 border-b border-black/[0.06]">
                <div class="lg:col-span-5 space-y-4">
                    <a href="#home" class="text-lg font-bold tracking-tight text-[#1d1d1f] hover:text-[#0071e3] transition-colors">
                        {{ $siteName }}
                    </a>
                    <p class="text-xs sm:text-sm text-[#86868b] max-w-sm leading-relaxed">
                        Teman perjalanan premium untuk menjelajahi keindahan dunia dalam presisi dan kenyamanan.
                    </p>
                </div>

                <div class="lg:col-span-7 grid grid-cols-2 sm:grid-cols-3 gap-8">
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#1d1d1f] mb-4">Destinasi</h4>
                        <ul class="space-y-2.5 text-xs sm:text-sm text-[#6e6e73]">
                            @foreach ($destinasiList as $d)
                                <li><a href="#destinasi" class="hover:text-[#0071e3] transition-colors">{{ $d->nama }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#1d1d1f] mb-4">Paket Wisata</h4>
                        <ul class="space-y-2.5 text-xs sm:text-sm text-[#6e6e73]">
                            @foreach ($paketWisata as $p)
                                <li><a href="#paket" class="hover:text-[#0071e3] transition-colors">{{ $p->judul }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#1d1d1f] mb-4">Perusahaan</h4>
                        <ul class="space-y-2.5 text-xs sm:text-sm text-[#6e6e73]">
                            <li><a href="#tentang" class="hover:text-[#0071e3] transition-colors">Tentang {{ $siteName }}</a></li>
                            <li><a href="#keunggulan" class="hover:text-[#0071e3] transition-colors">Filosofi Desain</a></li>
                            <li><a href="#kontak" class="hover:text-[#0071e3] transition-colors">Pusat Bantuan</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#86868b]">
                <p>&copy; {{ $currentYear }} {{ $siteName }} Inc. Seluruh Hak Cipta Dilindungi Undang-Undang.</p>

                <div class="flex items-center gap-6">
                    <a href="https://instagram.com" target="_blank" rel="noopener" class="hover:text-[#1d1d1f] transition-colors">Instagram</a>
                    <a href="https://facebook.com" target="_blank" rel="noopener" class="hover:text-[#1d1d1f] transition-colors">Facebook</a>
                    <a href="https://tiktok.com" target="_blank" rel="noopener" class="hover:text-[#1d1d1f] transition-colors">TikTok</a>
                    <a href="#" class="hover:text-[#1d1d1f] transition-colors">Privasi</a>
                    <a href="#" class="hover:text-[#1d1d1f] transition-colors">Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Apple Interactive Script -->
    <script src="{{ asset('script.js') }}"></script>

</body>
</html>
