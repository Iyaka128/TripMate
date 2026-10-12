<?php
/**
 * ====================================================================
 * TripMate — Portal Wisata Eksplorasi Premium
 * File: index.php (PHP Prosedural & Server-Side Rendering)
 * ====================================================================
 * 
 * Website ini mengimplementasikan konsep PHP Prosedural:
 * 1. [PHP Variables]: Variabel konfigurasi profil, kontak, & statistik portal.
 * 2. [PHP Multidimensional Array]: Data terstruktur untuk destinasi, paket wisata, & keunggulan.
 * 3. [PHP Conditional Logic & Badges]: Penentuan status dinamis (Tersedia, Populer, Terbatas).
 * 4. [PHP Server-Side Rendering (SSR)]: Perulangan (foreach) untuk membangun grid kartu secara dinamis.
 * 5. [PHP Form Processing]: Penanganan pengiriman formulir reservasi via POST request.
 */

// --------------------------------------------------------------------
// 1. [PHP VARIABLES] Konfigurasi Utama Portal TripMate
// --------------------------------------------------------------------
$siteName        = "TripMate";
$siteTagline     = "Generasi Baru Pengalaman Berlibur";
$siteDescription = "Rencanakan dan nikmati liburan impianmu dengan kemudahan, estetika, dan kenyamanan kelas dunia bersama TripMate.";
$contactEmail    = "halo@tripmate.com";
$contactPhone    = "+62 (021) 8089-7700";
$currentYear     = date('Y');

// Statistik Utama (Hero Metrics)
$heroMetrics = [
    ["angka" => "50+",   "label" => "Destinasi Kurasi"],
    ["angka" => "12.5k", "label" => "Traveler Bahagia"],
    ["angka" => "4.98",  "label" => "Rating Kepuasan"],
    ["angka" => "24/7",  "label" => "Concierge & Tim"]
];

// --------------------------------------------------------------------
// 2. [PHP MULTIDIMENSIONAL ARRAY] Katalog Destinasi Wisata
// --------------------------------------------------------------------
$destinasiList = [
    [
        "id"         => 1,
        "nama"       => "Pulau Dewata, Bali",
        "wilayah"    => "Bali, Indonesia",
        "deskripsi"  => "Nikmati ketenangan pantai sunset, kehangatan budaya lokal, kuliner autentik, dan lanskap alam magis.",
        "harga"      => "Rp1.850.000",
        "rating"     => 4.95,
        "kategori"   => "Favorit Wisatawan",
        "status"     => "Tersedia", // Conditional status
        "gambar"     => "https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1000&q=80",
        "gambar_alt" => "images/bali.jpg"
    ],
    [
        "id"         => 2,
        "nama"       => "Yogyakarta Heritage",
        "wilayah"    => "D.I. Yogyakarta",
        "deskripsi"  => "Jelajahi megahnya candi warisan dunia, sentuhan seni keraton, keramahan istimewa, dan ragam kuliner legendaris.",
        "harga"      => "Rp1.450.000",
        "rating"     => 4.91,
        "kategori"   => "Heritage & Seni",
        "status"     => "Hampir Penuh", // Conditional status
        "gambar"     => "https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=1000&q=80",
        "gambar_alt" => "images/yogyakarta.jpg"
    ],
    [
        "id"         => 3,
        "nama"       => "Lombok & Gili Island",
        "wilayah"    => "Lombok, NTB",
        "deskripsi"  => "Temukan air laut kristal toska, pasir putih memesona, dan kemegahan jalur pendakian Gunung Rinjani.",
        "harga"      => "Rp2.150.000",
        "rating"     => 4.97,
        "kategori"   => "Eksplorasi Alam",
        "status"     => "Tersedia", // Conditional status
        "gambar"     => "https://images.unsplash.com/photo-1570789210967-2cac24afeb00?auto=format&fit=crop&w=1000&q=80",
        "gambar_alt" => "images/lombok.jpg"
    ]
];

// --------------------------------------------------------------------
// 3. [PHP MULTIDIMENSIONAL ARRAY] Paket Tur & Wisata Pilihan
// --------------------------------------------------------------------
$paketWisata = [
    [
        "id"          => "starter",
        "tier"        => "Starter",
        "judul"       => "Liburan Hemat",
        "deskripsi"   => "Pilihan ideal untuk akhir pekan santai dan pelancong cerdas.",
        "harga"       => "1.500.000",
        "is_popular"  => false,
        "fasilitas"   => [
            "Durasi 3 Hari 2 Malam",
            "Hotel Nyaman Bintang 3",
            "Transportasi Antar-Jemput",
            "Tour Guide Berpengalaman"
        ]
    ],
    [
        "id"          => "pro",
        "tier"        => "Pro Experience",
        "judul"       => "Liburan Premium",
        "deskripsi"   => "Kenyamanan menyeluruh dengan fasilitas istimewa dan akses privat.",
        "harga"       => "3.500.000",
        "is_popular"  => true, // Conditional Pro Flag
        "fasilitas"   => [
            "Durasi 5 Hari 4 Malam",
            "Resor & Hotel Premium Bintang 5",
            "Transportasi Privat & Driver Eksekutif",
            "Akses Wisata Eksklusif & VIP Skip-line",
            "Fotografer Profesional & Dokumentasi"
        ]
    ],
    [
        "id"          => "explorer",
        "tier"        => "Explorer",
        "judul"       => "Adventure Trip",
        "deskripsi"   => "Tantangan alam bebas dengan perlengkapan lengkap berstandar aman.",
        "harga"       => "2.500.000",
        "is_popular"  => false,
        "fasilitas"   => [
            "Durasi 4 Hari 3 Malam",
            "Glamping & Safari Camping",
            "Transportasi 4x4 Offroad",
            "Perlengkapan Adventure & Safety Guide"
        ]
    ]
];

// --------------------------------------------------------------------
// 4. [PHP BACKEND PROCESSING] Penanganan Formulir Kontak & Reservasi
// --------------------------------------------------------------------
$pesanStatus = null;
$namaPengirim = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaInput  = trim($_POST['nama'] ?? '');
    $emailInput = trim($_POST['email'] ?? '');
    $pesanInput = trim($_POST['pesan'] ?? '');

    if (!empty($namaInput) && !empty($emailInput) && !empty($pesanInput)) {
        $namaPengirim = htmlspecialchars($namaInput);
        $pesanStatus = [
            "tipe"  => "success",
            "judul" => "Pesan Terkirim",
            "pesan" => "Terima kasih, " . $namaPengirim . "! Permintaan reservasi Anda telah berhasil kami terima."
        ];
    } else {
        $pesanStatus = [
            "tipe"  => "error",
            "judul" => "Form Belum Lengkap",
            "pesan" => "Mohon lengkapi semua bidang isian formulir sebelum mengirim."
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteName; ?> — Desain Eksplorasi Premium (Tailwind CSS & PHP)</title>
    <meta name="description" content="<?php echo $siteDescription; ?>">
    <meta name="theme-color" content="#ffffff">

    <!-- Preconnect Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Compiled Tailwind Stylesheet -->
    <link rel="stylesheet" href="style.css">
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
                    <?php echo $siteName; ?>
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
                    <?php echo $siteTagline; ?>
                </div>

                <!-- Hero Title -->
                <h1 class="text-4xl sm:text-6xl lg:text-7xl font-extrabold tracking-apple-tight leading-[1.08] mb-6 text-white drop-shadow-sm">
                    Jelajahi Dunia Bersama <?php echo $siteName; ?>.
                </h1>

                <!-- Hero Subtitle -->
                <p class="text-base sm:text-xl text-white/85 max-w-2xl leading-relaxed mb-10 font-normal">
                    <?php echo $siteDescription; ?>
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

                <!-- Floating Metrics Pill (Dynamic SSR Loop) -->
                <div class="flex flex-wrap md:flex-nowrap items-center justify-center gap-6 sm:gap-10 apple-glass-pill border border-white/15 px-6 sm:px-10 py-4 rounded-3xl md:rounded-full shadow-2xl">
                    <?php foreach ($heroMetrics as $index => $metric): ?>
                        <?php if ($index > 0): ?>
                            <div class="hidden sm:block w-px h-8 bg-white/20"></div>
                        <?php endif; ?>
                        <div class="flex flex-col items-center">
                            <span class="text-xl sm:text-2xl font-extrabold tracking-tight text-white"><?php echo $metric['angka']; ?></span>
                            <span class="text-xs text-white/70 font-medium"><?php echo $metric['label']; ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>


        <!-- ============================================================ -->
        <!-- [PHP SSR] KATALOG DESTINASI POPULER (ARRAY & CONDITIONAL)   -->
        <!-- ============================================================ -->
        <section id="destinasi" class="max-w-6xl mx-auto px-6 py-24">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] mb-2 block">Destinasi Pilihan</span>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-[#1d1d1f] mb-3">Koleksi Destinasi Populer</h2>
                <p class="text-base text-[#6e6e73]">Tempat-tempat eksotis terverifikasi dengan pengalaman tak tertandingi.</p>
            </div>

            <!-- Dynamic SSR Grid Cards (Render Menggunakan PHP Foreach) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php 
                // Loop Penomoran & Render Dinamis Destinasi
                $nomorDest = 1;
                foreach ($destinasiList as $dest): 
                    // Conditional Badge untuk Status Ketersediaan
                    if ($dest['status'] === 'Tersedia') {
                        $statusBadgeClass = 'bg-[#34c759] text-white'; // Hijau
                    } else {
                        $statusBadgeClass = 'bg-[#ff9500] text-white'; // Oranye
                    }
                ?>
                <article class="bg-white rounded-[24px] overflow-hidden flex flex-col border border-black/[0.06] shadow-apple-sm hover:shadow-apple-hover hover:-translate-y-2 transition-all duration-300 group">
                    <div class="relative h-64 overflow-hidden">
                        <img 
                            src="<?php echo htmlspecialchars($dest['gambar']); ?>" 
                            alt="<?php echo htmlspecialchars($dest['nama']); ?>" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                            loading="lazy"
                            onerror="this.onerror=null;this.src='<?php echo $dest['gambar_alt']; ?>'"
                        >
                        <!-- Kategori Badge -->
                        <span class="absolute top-4 left-4 bg-black/50 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full">
                            <?php echo htmlspecialchars($dest['kategori']); ?>
                        </span>

                        <!-- Status Badge (Conditional) -->
                        <span class="absolute top-4 right-4 <?php echo $statusBadgeClass; ?> text-[11px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full shadow-md">
                            <?php echo htmlspecialchars($dest['status']); ?>
                        </span>

                        <!-- Rating Badge -->
                        <span class="absolute bottom-4 right-4 bg-white/90 backdrop-blur-md text-[#1d1d1f] text-xs font-bold px-2.5 py-1 rounded-full shadow-md">
                            Rating <?php echo number_format($dest['rating'], 2); ?>
                        </span>
                    </div>

                    <div class="p-6 flex flex-col flex-1">
                        <div class="text-xs text-[#86868b] font-medium mb-2">
                            <?php echo htmlspecialchars($dest['wilayah']); ?>
                        </div>
                        <h3 class="text-xl font-bold tracking-tight text-[#1d1d1f] mb-2">
                            <?php echo htmlspecialchars($dest['nama']); ?>
                        </h3>
                        <p class="text-sm text-[#6e6e73] leading-relaxed mb-6 flex-1">
                            <?php echo htmlspecialchars($dest['deskripsi']); ?>
                        </p>
                        <div class="flex items-center justify-between pt-4 border-t border-black/[0.06]">
                            <div>
                                <span class="block text-[11px] text-[#86868b]">Mulai dari</span>
                                <span class="text-base font-bold text-[#0071e3]"><?php echo htmlspecialchars($dest['harga']); ?></span>
                            </div>
                            <a href="#paket" class="text-sm font-semibold text-[#0071e3] hover:underline">
                                Lihat Detail &rarr;
                            </a>
                        </div>
                    </div>
                </article>
                <?php 
                    $nomorDest++;
                endforeach; 
                ?>
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
        <!-- [PHP SSR] PAKET WISATA DENGAN CONDITIONAL PRO TIER          -->
        <!-- ============================================================ -->
        <section id="paket" class="bg-[#f5f5f7] py-24 px-6 border-y border-black/[0.04]">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] mb-2 block">Pilihan Paket</span>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-[#1d1d1f] mb-3">Paket Wisata Terpilih</h2>
                <p class="text-base text-[#6e6e73]">Fleksibilitas paket terbaik yang dapat disesuaikan dengan ritme liburanmu.</p>
            </div>

            <!-- Dynamic SSR Render Paket Wisata (Foreach + Conditional Logic) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto items-stretch">
                <?php foreach ($paketWisata as $paket): ?>
                    <?php if ($paket['is_popular']): ?>
                        <!-- Apple Pro Flagship Card (Tingkat Populer) -->
                        <article class="bg-white rounded-[28px] p-8 sm:p-10 border-2 border-[#0071e3] shadow-apple-glow flex flex-col relative md:-translate-y-2 hover:-translate-y-3 transition-all duration-300">
                            <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 bg-[#0071e3] text-white text-[11px] font-bold uppercase tracking-wider px-4 py-1 rounded-full shadow-md shadow-blue-500/30">
                                Paling Populer
                            </span>

                            <div class="mb-6">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] block mb-1"><?php echo htmlspecialchars($paket['tier']); ?></span>
                                <h3 class="text-2xl font-bold tracking-tight text-[#1d1d1f] mb-2"><?php echo htmlspecialchars($paket['judul']); ?></h3>
                                <p class="text-xs text-[#6e6e73]"><?php echo htmlspecialchars($paket['deskripsi']); ?></p>
                            </div>

                            <div class="flex items-baseline gap-1 mb-8 pb-6 border-b border-black/[0.06]">
                                <span class="text-lg font-bold text-[#1d1d1f]">Rp</span>
                                <span class="text-4xl font-extrabold tracking-tight text-[#1d1d1f]"><?php echo htmlspecialchars($paket['harga']); ?></span>
                                <span class="text-xs text-[#86868b]">/ orang</span>
                            </div>

                            <ul class="flex flex-col gap-3.5 mb-8 flex-1">
                                <?php foreach ($paket['fasilitas'] as $fitur): ?>
                                    <li class="flex items-center gap-2.5 text-sm text-[#6e6e73]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#0071e3] flex-shrink-0"></span>
                                        <?php echo htmlspecialchars($fitur); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <a href="#kontak" class="w-full text-center py-3.5 px-6 rounded-full text-sm font-semibold bg-[#0071e3] hover:bg-[#0077ed] text-white shadow-lg shadow-blue-500/25 transition-all">
                                Pilih Paket
                            </a>
                        </article>
                    <?php else: ?>
                        <!-- Regular Package Card -->
                        <article class="bg-white rounded-[28px] p-8 sm:p-10 border border-black/[0.06] shadow-apple-sm flex flex-col hover:-translate-y-2 hover:shadow-apple-hover transition-all duration-300">
                            <div class="mb-6">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] block mb-1"><?php echo htmlspecialchars($paket['tier']); ?></span>
                                <h3 class="text-2xl font-bold tracking-tight text-[#1d1d1f] mb-2"><?php echo htmlspecialchars($paket['judul']); ?></h3>
                                <p class="text-xs text-[#6e6e73]"><?php echo htmlspecialchars($paket['deskripsi']); ?></p>
                            </div>

                            <div class="flex items-baseline gap-1 mb-8 pb-6 border-b border-black/[0.06]">
                                <span class="text-lg font-bold text-[#1d1d1f]">Rp</span>
                                <span class="text-4xl font-extrabold tracking-tight text-[#1d1d1f]"><?php echo htmlspecialchars($paket['harga']); ?></span>
                                <span class="text-xs text-[#86868b]">/ orang</span>
                            </div>

                            <ul class="flex flex-col gap-3.5 mb-8 flex-1">
                                <?php foreach ($paket['fasilitas'] as $fitur): ?>
                                    <li class="flex items-center gap-2.5 text-sm text-[#6e6e73]">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#0071e3] flex-shrink-0"></span>
                                        <?php echo htmlspecialchars($fitur); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <a href="#kontak" class="w-full text-center py-3.5 px-6 rounded-full text-sm font-semibold bg-black/[0.05] hover:bg-black/[0.08] text-[#1d1d1f] border border-black/[0.06] transition-colors">
                                Pilih Paket
                            </a>
                        </article>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </section>


        <!-- Tentang Kami -->
        <section id="tentang" class="max-w-4xl mx-auto px-6 py-24 text-center">
            <div class="mb-10">
                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] mb-2 block">Filosofi Kami</span>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-[#1d1d1f]">Tentang <?php echo $siteName; ?></h2>
            </div>

            <p class="text-xl sm:text-2xl font-semibold tracking-tight text-[#1d1d1f] mb-8 leading-snug">
                “Setiap perjalanan bukan sekadar berpindah tempat, melainkan cara kita memperluas cakrawala jiwa.”
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
        <!-- [PHP BACKEND] FORMULIR KONTAK & RESERVASI                   -->
        <!-- ============================================================ -->
        <section id="kontak" class="max-w-6xl mx-auto px-6 py-20">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-bold uppercase tracking-wider text-[#0071e3] mb-2 block">Dukungan 24/7</span>
                <h2 class="text-3xl sm:text-4xl font-bold tracking-tight text-[#1d1d1f] mb-3">Hubungi Kami</h2>
                <p class="text-base text-[#6e6e73]">Punya rencana khusus atau butuh konsultasi perjalanan? Kami siap membantu.</p>
            </div>

            <!-- Notifikasi Pesan Terkirim dari PHP Backend (Jika Ada Form Submit) -->
            <?php if ($pesanStatus): ?>
                <div class="max-w-4xl mx-auto mb-8 p-4 rounded-2xl <?php echo $pesanStatus['tipe'] === 'success' ? 'bg-green-50 border border-green-200 text-green-800' : 'bg-red-50 border border-red-200 text-red-800'; ?> flex items-center justify-between">
                    <div>
                        <span class="font-bold text-sm block"><?php echo $pesanStatus['judul']; ?></span>
                        <span class="text-xs"><?php echo $pesanStatus['pesan']; ?></span>
                    </div>
                    <span class="text-xs font-semibold uppercase px-2.5 py-1 rounded-full <?php echo $pesanStatus['tipe'] === 'success' ? 'bg-green-200 text-green-900' : 'bg-red-200 text-red-900'; ?>">
                        Server-Side Processed
                    </span>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                <!-- Sidebar Cards -->
                <div class="lg:col-span-5 flex flex-col gap-4">
                    <div class="bg-white p-6 rounded-[20px] border border-black/[0.06] shadow-apple-sm">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#0071e3] block mb-1">Email Resmi</span>
                        <h4 class="text-base font-bold text-[#1d1d1f]"><?php echo $contactEmail; ?></h4>
                        <p class="text-xs text-[#6e6e73] mt-1">Konsultasi perjalanan & reservasi VIP</p>
                    </div>

                    <div class="bg-white p-6 rounded-[20px] border border-black/[0.06] shadow-apple-sm">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#0071e3] block mb-1">Telepon & WhatsApp</span>
                        <h4 class="text-base font-bold text-[#1d1d1f]"><?php echo $contactPhone; ?></h4>
                        <p class="text-xs text-[#6e6e73] mt-1">Layanan konsumen aktif setiap hari</p>
                    </div>

                    <div class="bg-white p-6 rounded-[20px] border border-black/[0.06] shadow-apple-sm">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-[#0071e3] block mb-1">Kecepatan Pelayanan</span>
                        <h4 class="text-base font-bold text-[#1d1d1f]">Respon Dalam 5 Menit</h4>
                        <p class="text-xs text-[#6e6e73] mt-1">Tim siaga melayani pertanyaan Anda</p>
                    </div>
                </div>

                <!-- Form Container -->
                <form action="#kontak" method="post" class="lg:col-span-7 bg-white p-8 sm:p-10 rounded-[28px] border border-black/[0.06] shadow-apple-card space-y-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div class="space-y-1.5">
                            <label for="nama" class="block text-xs font-bold text-[#1d1d1f]">Nama Lengkap</label>
                            <input
                                type="text"
                                id="nama"
                                name="nama"
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
                        ></textarea>
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
                        <?php echo $siteName; ?>
                    </a>
                    <p class="text-xs sm:text-sm text-[#86868b] max-w-sm leading-relaxed">
                        Teman perjalanan premium untuk menjelajahi keindahan dunia dalam presisi dan kenyamanan.
                    </p>
                </div>

                <div class="lg:col-span-7 grid grid-cols-2 sm:grid-cols-3 gap-8">
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#1d1d1f] mb-4">Destinasi</h4>
                        <ul class="space-y-2.5 text-xs sm:text-sm text-[#6e6e73]">
                            <?php foreach ($destinasiList as $d): ?>
                                <li><a href="#destinasi" class="hover:text-[#0071e3] transition-colors"><?php echo htmlspecialchars($d['nama']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#1d1d1f] mb-4">Paket Wisata</h4>
                        <ul class="space-y-2.5 text-xs sm:text-sm text-[#6e6e73]">
                            <?php foreach ($paketWisata as $p): ?>
                                <li><a href="#paket" class="hover:text-[#0071e3] transition-colors"><?php echo htmlspecialchars($p['judul']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-[#1d1d1f] mb-4">Perusahaan</h4>
                        <ul class="space-y-2.5 text-xs sm:text-sm text-[#6e6e73]">
                            <li><a href="#tentang" class="hover:text-[#0071e3] transition-colors">Tentang <?php echo $siteName; ?></a></li>
                            <li><a href="#keunggulan" class="hover:text-[#0071e3] transition-colors">Filosofi Desain</a></li>
                            <li><a href="#kontak" class="hover:text-[#0071e3] transition-colors">Pusat Bantuan</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#86868b]">
                <p>&copy; <?php echo $currentYear; ?> <?php echo $siteName; ?> Inc. Seluruh Hak Cipta Dilindungi Undang-Undang.</p>

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
    <script src="script.js"></script>

</body>
</html>
