# Dokumentasi Sistem TripMate — Travel Web Portal

TripMate adalah sistem web portal eksplorasi dan reservasi destinasi wisata berbasis antarmuka modern yang memadukan prinsip Apple Design System dan framework Tailwind CSS.

---

## 1. Deskripsi dan Tujuan Sistem

Sistem TripMate dirancang sebagai platform terintegrasi satu pintu (one-stop portal) bagi calon wisatawan untuk:
1. Mempelajari dan memilih destinasi unggulan terverifikasi di Indonesia (Bali, Yogyakarta, Lombok).
2. Membandingkan tingkatan paket tur wisata (Liburan Hemat, Liburan Premium, dan Adventure Trip) secara transparan.
3. Melakukan konsultasi dan pemesanan perjalanan langsung dengan sistem pengisian pesan otomatis (auto-fill reservation).
4. Menerima umpan balik interaktif secara langsung melalui sistem notifikasi Dynamic Island.

---

## 2. Arsitektur dan Alur Kerja Sistem (System Workflow)

Sistem beroperasi dengan arsitektur frontend modular:

1. Modul Presentasi (User Interface Layer):
   Dibangun dengan HTML5 semantik dan utilitas Tailwind CSS yang telah dikompilasi secara optimal untuk memastikan waktu muat (load time) di bawah 1 detik.

2. Modul Logika Interaktif (Client-Side Logic Layer):
   Dijalankan oleh berkas script.js yang menangani:
   - Pemantauan posisi gulir layar (Scroll Spy & Navbar Elevation).
   - Pengalihan pemesanan paket wisata ke formulir kontak (Package Selection Dispatcher).
   - Penanganan status pengiriman formulir konsultasi (Form State Handler).
   - Manajemen antrean visual notifikasi (Dynamic Island Toast Controller).

3. Modul Desain Sistem (Design System Token):
   Dikonfigurasi melalui tailwind.config.js yang menetapkan variabel warna resmi Apple, font stack San Francisco, skala tipografi, serta elevasi bayangan halus.

---

## 3. Modul-Modul Fungsional Sistem

Sistem TripMate terdiri dari 8 modul utama:

### Modul 1: Navigasi dan Pemantau Status (Navigation & Scroll Spy)
- Komponen: header dan nav pada index.html.
- Fungsi: Menyediakan akses instan ke seluruh bagian portal dengan efek frosted glass. Pada perangkat bergerak (mobile), menu secara otomatis bertransformasi menjadi navigasi horizontal berkapsul tanpa memotong ruang pandang.
- Logika: script.js mendeteksi pergeseran koordinat vertikal jendela untuk memberikan efek elevasi serta memperbarui status tautan aktif (active state) secara real-time.

### Modul 2: Pameran Utama (Hero Keynote Showcase)
- Komponen: section id="home".
- Fungsi: Menampilkan pernyataan nilai utama (value proposition) sistem dengan tipografi berskala besar dan visual fotografi sinematik resolusi tinggi.
- Fitur Sistem: Menyajikan ringkasan metrik kredibilitas sistem (50+ Destinasi, 12.5k Wisatawan, 4.98 Rating Kepuasan, dan 24/7 Concierge).

### Modul 3: Katalog Destinasi Wisata (Destination Catalog Engine)
- Komponen: section id="destinasi".
- Fungsi: Menampilkan kartu informasi destinasi dengan parameter terstruktur: nama wilayah, ulasan penilaian (rating), deskripsi pengalaman, estimasi harga mulai, dan tautan eksplorasi.

### Modul 4: Mesin Keunggulan Bento Grid (Bento Value-Proposition Engine)
- Komponen: section id="keunggulan".
- Fungsi: Modul yang mengelompokkan 4 pilar sistem dalam tata letak kisi asimetris:
  - Kurasi Kualitas Bintang Lima (Eksklusivitas).
  - Pemesanan Cepat 60 Detik (Seamless Workflow).
  - Transparansi Biaya 100% (No Hidden Fees).
  - Pendampingan 24 Jam (24/7 Concierge Support).

### Modul 5: Manajemen Paket dan Perbandingan Tingkatan (Package Tiering Engine)
- Komponen: section id="paket".
- Fungsi: Menampilkan tiga tingkatan paket wisata dengan struktur harga per orang dan rincian fasilitas. Paket Liburan Premium diposisikan sebagai tingkatan unggulan (Pro Tier) dengan aksen visual khusus.
- Interaktivitas: Setiap tombol pemesanan terhubung ke logika JavaScript untuk memicu pengisian formulir secara otomatis.

### Modul 6: Narasi Filosofi dan Penjaminan Mutu (Editorial & Trust System)
- Komponen: section id="tentang".
- Fungsi: Menyampaikan visi platform serta menyajikan tiga indikator mutu: 99.8% Kepuasan Pelanggan, 150+ Mitra Resort, dan 100% Garansi Proteksi Perjalanan.

### Modul 7: Formulir Reservasi dan Saluran Bantuan (Customer Dispatch Subsystem)
- Komponen: section id="kontak".
- Fungsi: Menyediakan kanal komunikasi langsung (Email, WhatsApp, Respon Cepat) serta formulir pesan terstruktur dengan validasi input bawaan.

### Modul 8: Notifikasi Dinamis (Dynamic Island Notification Subsystem)
- Komponen: div id="appleToast" dan pengendali showToast() pada script.js.
- Fungsi: Menghadirkan umpan balik taktil di bagian atas layar untuk mengonfirmasi tindakan penting (pemilihan paket tur atau keberhasilan pengiriman pesan).

---

## 4. Pembaruan dan Peningkatan Sistem (System Updates & Enhancements)

Pembaruan sistem mencakup perancangan ulang arsitektur, refaktorisasi antarmuka, dan pengembangan fitur baru pada TripMate:

1. Migrasi Arsitektur ke Tailwind CSS:
   - Mengubah struktur styling konvensional menjadi utility-first framework berbasis Tailwind v3.4.
   - Menyusun konfigurasi tailwind.config.js dengan parameter desain Apple (warna Apple Blue #0071e3, radius squircle 24px dan 28px, serta font stack San Francisco).

2. Pembangunan Modul Bento Grid (Fitur Baru):
   - Merancang dan mengimplementasikan section keunggulan berbasis Bento Grid yang sebelumnya belum ada pada sistem awal.

3. Pengembangan Logika Interaktif script.js (Fitur Baru):
   - Menciptakan subsistem Dynamic Island Toast dengan animasi kurva pegas (spring easing).
   - Membangun fitur auto-fill pesan paket wisata ke form reservasi.
   - Mengimplementasikan pendeteksi navigasi aktif (Scroll Spy).
   - Menghadirkan penanganan status pengiriman formulir dengan feedback waktu nyata.

4. Desain Antarmuka Berstandar Apple:
   - Menerapkan material frosted glass (apple-glass) pada header.
   - Merestrukturisasi tata letak paket tur dengan pembedaan tingkatan standar vs pro.
   - Mengoptimalkan tipografi Swiss-Apple yang bersih, fungsional, dan bebas dari ornamen non-esensial.

5. Resolusi dan Integrasi Aset Gambar:
   - Mengatasi permasalahan tautan gambar kosong pada sistem awal dengan mengintegrasikan berkas gambar resolusi tinggi untuk seluruh destinasi dan latar hero.

---

## 5. Spesifikasi Teknologi Sistem

- Bahasa Markup: HTML5 Semantic
- Bahasa Gaya: CSS3, Tailwind CSS v3.4.17
- Bahasa Pemrograman Klien: Vanilla JavaScript (ECMAScript 2022+)
- Build Tool: Tailwind CLI (dikompilasi melalui Node.js)
- Font: Apple System Font (-apple-system, SF Pro Display, SF Pro Text), Plus Jakarta Sans

---

## 6. Struktur Berkas Sistem

```
TripMate-main/
|-- index.html            Struktur dokumen HTML5 dengan utilitas Tailwind CSS
|-- script.js             Logika fungsional dan interaktivitas sistem
|-- tailwind.config.js    Konfigurasi token desain Apple (warna, radius, tipografi)
|-- input.css             Berkas sumber direktif Tailwind dan kelas utilitas kaca
|-- style.css             Berkas CSS akhir hasil kompilasi Tailwind CLI
|-- package.json          Konfigurasi dependensi dan perintah kompilasi sistem
|-- README.md             Dokumentasi teknis dan arsitektur sistem
`-- images/               Direktori aset visual resolusi tinggi
    |-- hero.jpg          Latar belakang pameran utama
    |-- bali.jpg          Visual destinasi Bali
    |-- yogyakarta.jpg    Visual destinasi Yogyakarta
    `-- lombok.jpg         Visual destinasi Lombok
```

---

## 7. Panduan Menjalankan dan Membangun Sistem

### Menjalankan Sistem
Buka berkas index.html langsung melalui peramban web modern (Google Chrome, Mozilla Firefox, Safari, atau Microsoft Edge).

### Menjalankan Perintah Kompilasi Tailwind CSS
Pastikan Node.js telah terpasang pada komputer:

```bash
# Memasang dependensi
npm install

# Menjalankan pemantauan berkas (mode pengembangan)
npm run dev

# Mengompilasi dan meminifikasi CSS untuk rilis produksi
npm run build
```

---

Hak Cipta Sistem (c) 2026 TripMate. Seluruh Hak Cipta Dilindungi Undang-Undang.