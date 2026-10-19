<?php
/**
 * TripMate — Controller utama (Week 7: MVC).
 * Controller menyiapkan data, menangani request POST, lalu memanggil View.
 */
declare(strict_types=1);

require_once __DIR__ . '/../models/Destination.php';

// Site configuration (data yang dibutuhkan oleh View).
$siteName = 'TripMate';
$siteTagline = 'Generasi Baru Pengalaman Berlibur';
$siteDescription = 'Rencanakan dan nikmati liburan impianmu dengan kemudahan, estetika, dan kenyamanan kelas dunia bersama TripMate.';
$contactEmail = 'halo@tripmate.com';
$contactPhone = '+62 (021) 8089-7700';
$currentYear = date('Y');

$heroMetrics = [
    ['angka' => '50+', 'label' => 'Destinasi Kurasi'],
    ['angka' => '12.5k', 'label' => 'Traveler Bahagia'],
    ['angka' => '4.98', 'label' => 'Rating Kepuasan'],
    ['angka' => '24/7', 'label' => 'Concierge & Tim'],
];

// Model mengembalikan object; Controller mengubahnya menjadi data yang dikonsumsi View.
$destinationObjects = Destination::all();
$destinasiList = array_map(
    static fn(Destination $destination): array => $destination->toArray(),
    $destinationObjects
);

// Paket wisata masih berupa data terstruktur; tetap dipertahankan dari versi tim.
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

// Penanganan request form berada di Controller, bukan di View.
$pesanStatus = null;
$namaPengirim = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaInput = trim((string) ($_POST['nama'] ?? ''));
    $emailInput = trim((string) ($_POST['email'] ?? ''));
    $pesanInput = trim((string) ($_POST['pesan'] ?? ''));

    if ($namaInput !== '' && filter_var($emailInput, FILTER_VALIDATE_EMAIL) && $pesanInput !== '') {
        $namaPengirim = htmlspecialchars($namaInput, ENT_QUOTES, 'UTF-8');
        $pesanStatus = [
            'tipe' => 'success',
            'judul' => 'Pesan Terkirim',
            'pesan' => 'Terima kasih, ' . $namaPengirim . '! Permintaan reservasi Anda telah berhasil kami terima.',
        ];
    } else {
        $pesanStatus = [
            'tipe' => 'error',
            'judul' => 'Form Belum Lengkap',
            'pesan' => 'Mohon isi nama, email yang valid, dan pesan sebelum mengirim.',
        ];
    }
}


// View hanya bertanggung jawab atas HTML/presentasi.
require __DIR__ . '/../views/home.php';
