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
|-- index.php             Implementasi PHP Prosedural & Server-Side Rendering (Week 5)
|-- index.html            Struktur dokumen HTML5 dengan utilitas Tailwind CSS (Week 4)
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

## 8. گزارش رفع ایرادات و بهینه‌سازی‌ها (Troubleshooting & Fixes Report)

در بازبینی و تست پروژه، اشکالات زیر شناسایی و برطرف گردیدند:

### ۱. مشکل تصاویر مفقود (Missing Images & Broken Links)
* **ایراد:** در فایل `index.html` به ۴ تصویر (`hero.jpg`, `bali.jpg`, `yogyakarta.jpg`, `lombok.jpg`) در مسیر `images/` ارجاع داده شده بود؛ اما پوشه `images` به کلی وجود نداشت و تصاویر در صفحه به صورت شکسته نمایش داده می‌شدند.
* **اقدام و رفع:** 
  - تصاویر باکیفیت آنلاین از CDN مطمئن Unsplash مستقیماً در `index.html` متصل شدند تا لود آنی و پرسرعت داشته باشند.
  - برای هر تصویر هندلر خطای `onerror` اضافه شد تا در صورت بروز هرگونه قطعی شبکه، به نسخه محلی سوئیچ کند.
  - پوشه فیزیکی `images/` ایجاد شد و هر ۴ تصویر برای استفاده آفلاین در آن ذخیره گردید.

### ۲. فقدان پکیج‌های توسعه Tailwind CSS (`node_modules`)
* **ایراد:** پکیج‌های وابسته پروژه نصب نبودند و امکان بیلد یا ادیت استایل‌های Tailwind با `npm run build` وجود نداشت.
* **اقدام و رفع:** دستور `npm install` اجرا شد و تمامی وابستگی‌های Tailwind CSS (نسخه 3.4) نصب گردید. سپس با `npm run build`، فایل `style.css` با موفقیت کامپایل و فشرده‌سازی شد.

### ۳. لینک‌های غیرفعال فوتر (Dead Links in Footer)
* **ایراد:** لینک‌های بخش «حریم خصوصی» (Privasi) و «قوانین» (Ketentuan) در فوتر به `#` متصل بودند که هنگام کلیک باعث پرش ناگهانی صفحه به بالا می‌شد.
* **اقدام و رفع:** در فایل `script.js` یک هندلر تعاملی اختصاصی اضافه شد که هنگام کلیک، از سیستم نوتیفیکیشن Dynamic Island برای اطلاع‌رسانی به کاربر استفاده می‌کند.

### ۴. تست و اطمینان از سلامت عملکرد اسکریپت‌ها و API
* **بررسی:** سلامت کدهای جاوااسکریپت و تابع اتصال به API مقصد (`Open-Meteo Geocoding API`) بررسی شد و بدون خطای سینتکسی یا اجرایی کار می‌کند.

---

## 9. پیاده‌سازی کامل PHP رویه‌ای برای وب‌سایت TripMate (Week 5 — PHP Prosedural & SSR)

طبق اصول درسی **Week 5 (PHP Prosedural & Server-Side Rendering)**، تمامی مفاهیم آموزشی PHP مستقیماً روی وب‌سایت اصلی **TripMate** در فایل [`index.php`](file:///c:/Users/shafi/Downloads/Compressed/TripMate-main/index.php) پیاده‌سازی و یکپارچه شدند:

### ساختار پیاده‌سازی شده در [`index.php`](file:///c:/Users/shafi/Downloads/Compressed/TripMate-main/index.php):

1. **بخش ۱: متغیرهای اصلی سیستم ([PHP Variables]):**
   - متغیرهای اطلاعات پایه سایت نظیر `$siteName`، `$siteTagline`، `$siteDescription`، `$contactEmail`، `$contactPhone` و `$currentYear` در خطوط ۱۷ تا ۲۳ تعریف شدند.
   - آرایه آمار کلیدی هیرو (`$heroMetrics`) شامل مقاصد، تعداد مسافران، امتیاز رضایت و پشتیبانی (خطوط ۲۵ تا ۳۱).

2. **بخش ۲: آرایه چندبعدی مقاصد گردشگری ([PHP Multidimensional Array]):**
   - تعریف آرایه `$destinasiList` شامل کارت‌های بالی، یوگیاکارتا، و لومبوک با فیلدهای `nama`، `wilayah`، `deskripsi`، `harga`، `rating`، `kategori`، `status` و `gambar` (خطوط ۳۵ تا ۷۴).

3. **بخش ۳: آرایه چندبعدی پکیج‌های گردشگری ([PHP Multidimensional Array]):**
   - تعریف آرایه `$paketWisata` شامل سطوح Starter، Pro Experience، و Explorer به همراه فیلد پرچم شرطی `is_popular` و آرایه تودرتوی امکانات (`fasilitas`) (خطوط ۷۸ تا ۱۱۸).

4. **بخش ۴: پردازش فرم سرورساید با متد POST ([PHP Backend Processing]):**
   - بررسی درخواست با `$_SERVER['REQUEST_METHOD'] === 'POST'`، اعتبارسنجی و پاکسازی فیلدهای ارسالی (`htmlspecialchars`) و تولید پیام بازخورد سرورساید (`$pesanStatus`) در خطوط ۱۲۲ تا ۱۴۶.

5. **بخش ۵: رندر داینامیک سرورساید (SSR) با منطق شرطی و شماره‌گذاری:**
   - **رندر مقاصد (`#destinasi`):** رندر کارت‌ها با حلقه `foreach`، نشان وضعیت شرطی بر اساس فیلد `$dest['status']` (رنگ سبز برای «Tersedia» و نارنجی برای «Hampir Penuh»)، و شماره‌گذاری خودکار.
   - **رندر پکیج‌ها (`#paket`):** تفکیک بصری خودکار کارت برتر (Pro Tier) از سایر کارت‌ها با شرط `if ($paket['is_popular'])`.
   - **رندر فوتر:** داینامیک‌سازی لیست مقاصد و پکیج‌ها در فوتر بر اساس آرایه‌های PHP.

### راهنمای یافتن کامنت‌ها در کد [`index.php`](file:///c:/Users/shafi/Downloads/Compressed/TripMate-main/index.php):
* **تعریف متغیرها و داده‌ها:** خطوط ۱ تا ۱۲۰ را بررسی کنید (کامنت‌های `[PHP VARIABLES]` و `[PHP MULTIDIMENSIONAL ARRAY]`).
* **پردازش فرم POST:** خطوط ۱۲۲ تا ۱۴۶ (کامنت `[PHP BACKEND PROCESSING]`).
* **رندر کارت‌های مقاصد:** خطوط ۲۴۰ تا ۳۱۰ (کامنت `[PHP SSR] KATALOG DESTINASI POPULER`).
* **رندر پکیج‌های گردشگری:** خطوط ۳۷۰ تا ۴۵۰ (کامنت `[PHP SSR] PAKET WISATA DENGAN CONDITIONAL PRO TIER`).

### نحوه اجرا:
در خط فرمان پروژه دستور زیر را وارد نمایید:
```bash
php -S localhost:8000
```
سپس آدرس `http://localhost:8000/index.php` را در مرورگر مشاهده کنید.

---

Hak Cipta Sistem (c) 2026 TripMate. Seluruh Hak Cipta Dilindungi Undang-Undang.