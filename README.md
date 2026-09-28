# TripMate — Apple Design & Tailwind CSS Edition

> Proyek Landing Page Eksplorasi Wisata Premium yang dirancang dan dikembangkan dengan memadukan standar **Bahasa Desain Apple (Apple Design Language / Human Interface Guidelines)** dan framework utilitas **Tailwind CSS**.

---

## 👨‍💻 Informasi Pengembang / Developer Identity

| Keterangan | Detail |
| :--- | :--- |
| **Nama Pengembang** | **Shafi** (شفیع) |
| **NIM / ID Mahasiswa** | **`202410370110484`** |
| **Peran** | Lead Frontend Designer & Developer |
| **Proyek** | TripMate Travel Web Portal |
| **Teknologi** | HTML5, Tailwind CSS v3.4, Vanilla JavaScript ES6+, PostCSS |

---

## 🚀 Ringkasan Transformasi Proyek oleh Shafi (`202410370110484`)

Website TripMate awalnya merupakan template web HTML/CSS statis sederhana. **Shafi (`202410370110484`)** melakukan perombakan total (*complete redesign & rebuild*) dengan menghadirkan estetika premium kelas dunia ala ekosistem Apple:

```
[Template Dasar Awal] ──► [Redesign Apple Aesthetic] ──► [Implementasi Tailwind CSS] ──► [Pengembangan script.js Interaktif]
```

---

## 📌 Rincian Bagian yang Diperbarui & Ditambahkan oleh Shafi

Berikut adalah dokumentasi komprehensif mengenai seluruh modul, fitur, dan file yang **dibuat, diperbarui, dan ditambahkan oleh Shafi (NIM: 202410370110484)**:

### 1. 🎨 Desain Sistem & Tailwind CSS (`tailwind.config.js` & `input.css`)
- **Status**: **Baru Diciptakan & Dikonfigurasi Penuh oleh Shafi**
- **Detail Implementasi**:
  - Konfigurasi `tailwind.config.js` dengan palet warna resmi Apple:
    - `apple-blue`: `#0071e3` (Warna aksen utama Apple)
    - `apple-blue-hover`: `#0077ed`
    - `apple-gray`: Spektrum abu-abu netral (#fbfbfd hingga #121214)
  - Penambahan font stack resmi Apple: `-apple-system`, `SF Pro Display`, `SF Pro Text`, serta `Plus Jakarta Sans`.
  - Aturan tracking tipografi rapat (`tracking-apple-tight`: `-0.035em`) khas presentasi produk Apple Keynote.
  - Kompilasi otomatis dengan Tailwind CLI yang menghasilkan file produksi [`style.css`](style.css) yang bersih, teroptimasi, dan murni.

### 2. 🪟 Navbar Frosted Glass (`<header>` & `<nav>`)
- **Status**: **Diperbarui Total oleh Shafi**
- **Detail Implementasi**:
  - Penggunaan material transparan `apple-glass` dengan `backdrop-filter: blur(20px) saturate(180%)`.
  - Desain logo baru: Monogram kompas modern dalam wadah bergradien dengan interaksi rotasi halus saat di-hover.
  - **Scroll Elevation**: Navbar secara dinamis mendeteksi posisi scroll untuk menambah bayangan ambient yang presisi.
  - **Mobile Pill Navigation**: Tampilan navigasi di layar smartphone otomatis bertransformasi menjadi *horizontal scrollable pill menu* tanpa scrollbar yang mengganggu.

### 3. 🎬 Hero Section Apple Keynote (`#home`)
- **Status**: **Diperbarui Total oleh Shafi**
- **Detail Implementasi**:
  - Background sinematik resolusi tinggi dengan gradien gelap presisi untuk keterbacaan kontras tinggi (*high contrast readability*).
  - **Pill Badge**: Menambahkan elemen kustom `✦ Generasi Baru Pengalaman Berlibur` dengan efek frosted glass.
  - **Tipografi Raksasa**: Judul *"Jelajahi Dunia Bersama TripMate."* dengan hierarki visual dramatis.
  - **Floating Metrics Banner**: Komponen baru yang menampilkan metrik kredibilitas:
    - `50+ Destinasi Kurasi`
    - `12.5k Traveler Bahagia`
    - `4.98 Rating Kepuasan`
    - `24/7 Concierge AI & Tim`

### 4. 🏝️ Koleksi Destinasi Populer (`#destinasi`)
- **Status**: **Diperbarui oleh Shafi**
- **Detail Implementasi**:
  - Redesain kartu menjadi bentuk *Apple Squircle* (`rounded-[24px]`).
  - Efek interaktif: Zoom gambar halus (`group-hover:scale-105`) dan elevasi kartu ke atas saat disentuh kursor.
  - Penambahan pill tag kurasi (*Favorit Wisatawan*, *Heritage & Seni*, *Eksplorasi Alam*) serta pill rating bintang terintegrasi.
  - Informasi harga awal dan tombol tautan beranimasi panah.

### 5. 🍱 Apple Bento Grid Keunggulan (`#keunggulan`)
- **Status**: **Fitur Baru Ditambahkan 100% oleh Shafi**
- **Detail Implementasi**:
  - Shafi merancang dan menambahkan bagian Bento Grid baru yang terinspirasi langsung dari layout showcase fitur Apple (seperti pada peluncuran iPhone Pro & chip Apple Silicon).
  - Terdiri dari 4 kartu modular inovatif:
    1. **Eksklusivitas (Dark Mode Bento)**: Kartu utama bergradien hitam titanium dengan ornamen grafis transparan di latar belakang.
    2. **Pemesanan Cepat (1-Click Booking)**: Fokus pada kecepatan transaksi dalam 60 detik.
    3. **Harga Transparan (100% Clear)**: Penekanan pada komitmen nol biaya tersembunyi.
    4. **Concierge 24/7**: Layanan pendampingan digital dan personal tanpa henti.

### 6. 💎 Paket Wisata Tiering Apple Pro (`#paket`)
- **Status**: **Diperbarui Total oleh Shafi**
- **Detail Implementasi**:
  - Konsep diferensiasi produk Apple diterapkan pada paket:
    - *Starter*: **Liburan Hemat** (Rp1.500.000)
    - *Pro Flagship*: **Liburan Premium** (Rp3.500.000) — Ditonjolkan dengan border aksen biru Apple, badge *Paling Populer*, dan elevasi bayangan glow.
    - *Explorer*: **Adventure Trip** (Rp2.500.000)
  - Checklist fasilitas menggunakan ikon centang SVG presisi dengan wadah lingkaran beraksen lembut.

### 7. 📖 Tentang Kami & Pilar Filosofi (`#tentang`)
- **Status**: **Diperbarui Total oleh Shafi**
- **Detail Implementasi**:
  - Menghadirkan kutipan filosofis editorial ala manifesto Apple.
  - **3 Kartu Pilar Kepercayaan**:
    - `99.8%` Indeks Kepuasan Pelanggan
    - `150+` Mitra Hotel & Resort Teruji
    - `100%` Garansi Perlindungan Perjalanan

### 8. ✉️ Formulir Kontak Apple Support (`#kontak`)
- **Status**: **Diperbarui Total oleh Shafi**
- **Detail Implementasi**:
  - Tata letak 2 kolom: Sidebar saluran informasi (Email, WhatsApp, SLA Respon 5 Menit) dan panel formulir.
  - Desain input rounded modern dengan efek *Apple Focus Ring* (`focus:ring-4 focus:ring-blue-500/15`).
  - Tombol submit berkapsul dengan transisi taktil.

### 9. ⚡ Fitur Interaktif JavaScript (`script.js`)
- **Status**: **Baru Diciptakan & Diintegrasikan Penuh oleh Shafi**
- **Detail Fitur**:
  - **Dynamic Island Toast Notification**:
    - Popup notifikasi mengambang di bagian atas layar dengan animasi kurva pegas (*spring curve easing* `cubic-bezier(0.34, 1.56, 0.64, 1)`).
    - Memiliki varian icon status (Success hijau & Info biru Apple).
  - **Active Navigation Spy**:
    - Mendeteksi posisi scroll pengguna dan secara otomatis memberikan sorotan aktif pada menu navigasi yang bersesuaian.
  - **Auto-Fill & Smooth Scroll Paket Wisata**:
    - Saat pengunjung mengklik *"Pilih Paket"* pada salah satu kartu harga, halaman otomatis bergulir (*smooth scroll*) ke formulir kontak, dan kolom pesan otomatis terisi dengan nama paket yang dipilih.
  - **Simulasi Pengiriman Formulir & Feedback Taktil**:
    - Tombol kirim menampilkan status *loading spinner* SVG, dilanjutkan dengan reset form otomatis dan pemanggilan Dynamic Island Toast konfirmasi sukses secara personal.

### 10. 📸 Integrasi Aset Gambar Berkualitas Tinggi (`images/`)
- **Status**: **Diunduh & Dikonfigurasi oleh Shafi**
- **Detail**:
  - Memperbaiki tautan gambar yang awalnya kosong/rusak dengan menyediakan aset lokal beresolusi tinggi:
    - `images/bali.jpg`: Lanskap Pura dan pesisir Bali.
    - `images/yogyakarta.jpg`: Kemegahan Candi Borobudur / Prambanan.
    - `images/lombok.jpg`: Keindahan pantai toska dan Gunung Rinjani.
    - `images/hero.jpg`: Panorama fotografi perjalanan sinematik untuk latar hero banner.

---

## 📁 Struktur Berkas Proyek

```
TripMate-main/
│
├── index.html            # Struktur markup HTML5 lengkap dengan utility classes Tailwind
├── script.js             # Logika interaktif JavaScript buatan Shafi (Toast, Spy, Auto-fill)
├── tailwind.config.js    # Konfigurasi token desain Apple (warna, radius, font, shadow)
├── input.css             # Source CSS dengan direktif @tailwind dan utilitas apple-glass
├── style.css             # Output CSS murni yang telah dikompilasi dan diminifikasi
├── package.json          # Manajemen dependencies & skrip npm build/dev
├── README.md             # Dokumentasi proyek dan atribusi Shafi (202410370110484)
│
└── images/               # Aset fotografi resolusi tinggi
    ├── hero.jpg          # Background hero Apple Keynote
    ├── bali.jpg          # Destinasi Bali
    ├── yogyakarta.jpg    # Destinasi Yogyakarta
    └── lombok.jpg         # Destinasi Lombok
```

---

## ⚙️ Petunjuk Penggunaan & Pengembangan

### 1. Menjalankan Website Secara Langsung
Cukup buka berkas [`index.html`](index.html) langsung di peramban (browser) modern seperti Google Chrome, Safari, atau Microsoft Edge.

### 2. Menjalankan Mode Pengembangan Tailwind CSS (Opsional)
Jika ingin melakukan pengeditan kelas atau menambah komponen baru:

```bash
# Instalasi dependencies (hanya jika baru pertama kali)
npm install

# Menjalankan pemantauan perubahan secara otomatis (Watch mode)
npm run dev

# Membangun file CSS final yang diminifikasi untuk produksi
npm run build
```

---

## 🏆 Catatan Hak Cipta & Orisinalitas

- **Pengembang**: **Shafi**
- **NIM**: **`202410370110484`**
- **Tahun**: 2026
- **Lisensi**: Edukasi & Portofolio Frontend Engineering