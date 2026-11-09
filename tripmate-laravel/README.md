# TripMate — Laravel Edition (Week 9: Laravel CRUD + ORM)

TripMate adalah portal wisata yang awalnya dibangun dengan PHP prosedural/MVC sederhana, kemudian dipindahkan (port) ke **Laravel 13** dengan pola MVC penuh: database SQLite, Migration, Model Eloquent (ORM), Controller, Blade View, dan Route.

---

## 1. Instalasi Laravel

Proyek dibuat dengan Composer:

```bash
php composer.phar create-project laravel/laravel tripmate-laravel
```

Ekstensi PHP yang diaktifkan di `php.ini`: `openssl`, `mbstring`, `fileinfo`, `curl`, `pdo_sqlite`, `sqlite3`.

Laravel Boost (`laravel/boost`) dipasang sebagai dependency dev.

Asset frontend lama (`style.css` hasil compile Tailwind dan `script.js`) dipindahkan ke `public/` dan dipanggil dari Blade lewat `{{ asset('...') }}`.

## 2. Setting Database (`.env`)

Koneksi database dikonfigurasi di file `.env`:

```env
DB_CONNECTION=sqlite
```

File database berada di `database/database.sqlite`. Kunci aplikasi dibuat dengan:

```bash
php artisan key:generate
```

## 3. Migration — Membuat Tabel di Database

Tiga tabel dibuat melalui migration (`database/migrations/`):

| Migration | Tabel | Kolom |
|---|---|---|
| `2026_11_09_105705_create_destinations_table.php` | `destinations` | nama, wilayah, deskripsi, harga, rating, kategori, status, gambar, gambar_alt |
| `2026_11_09_105706_create_packages_table.php` | `packages` | tier, judul, deskripsi, harga, is_popular, fasilitas (JSON) |
| `2026_11_09_105707_create_messages_table.php` | `messages` | nama, email, pesan |

Menjalankan migration + seeder:

```bash
php artisan migrate:fresh --seed
```

## 4. Model — Satu Model untuk Setiap Tabel

Berada di `app/Models/`:

- **`Destination.php`** — `$fillable` untuk 9 kolom destinasi.
- **`Package.php`** — `$fillable` + `casts()` (`fasilitas` → array, `is_popular` → boolean).
- **`Message.php`** — `$fillable` untuk nama, email, pesan.

Model Eloquent = representasi tabel; `Model::all()` membaca data, `Model::create()` menyimpan data — tanpa SQL mentah.

## 5. Controller

Berada di `app/Http/Controllers/`:

- **`DestinationController.php`** — method **`index()`**: mengambil `Destination::all()` dan `Package::all()` dari database, lalu mengirimnya ke view `home` bersama konfigurasi situs.
- **`MessageController.php`** — method **`store()`**: memvalidasi input form (`nama`, `email`, `pesan`), menyimpan ke tabel `messages` lewat `Message::create()`, lalu redirect kembali dengan session flash status.

## 6. View

Berada di `resources/views/`:

- **`home.blade.php`** — view index halaman utama. Seluruh markup `views/home.php` versi lama dipindahkan dan diubah ke sintaks Blade:
  - `<?php echo $x; ?>` → `{{ $x }}`
  - `foreach` → `@foreach`, `if` → `@if`
  - Data array → objek Eloquent: `$dest['nama']` → `$dest->nama`
  - Form memakai `@csrf`, `action="{{ url('/kontak') }}"`, dan `old()` untuk input saat validasi gagal
  - Notifikasi hasil submit: `session('status')` + `$errors` → toast Dynamic Island (script.js)

## 7. Route

Berada di `routes/web.php`:

```php
Route::get('/', [DestinationController::class, 'index']);    // halaman index
Route::post('/kontak', [MessageController::class, 'store']); // simpan pesan form
```

## 8. Seeder — Data Awal

Berada di `database/seeders/`:

- **`DestinationSeeder.php`** — 3 destinasi (Bali, Yogyakarta, Lombok).
- **`PackageSeeder.php`** — 3 paket wisata (Liburan Hemat, Liburan Premium, Adventure Trip).
- **`DatabaseSeeder.php`** — memanggil kedua seeder di atas.

## 9. Menjalankan Aplikasi

Dari clone repository (vendor tidak ikut ter-commit):

```bash
composer install                      # install dependency (vendor/)
cp .env.example .env                  # buat file .env
php artisan key:generate              # isi APP_KEY
```

Buat file database kosong `database/database.sqlite`, lalu:

```bash
php artisan migrate:fresh --seed   # buat tabel + isi data awal
php artisan serve                  # jalankan server di http://localhost:8000
```

Form kontak mengirim POST ke `/kontak` — pesan tersimpan di tabel `messages` (cek dengan `php artisan tinker` → `App\Models\Message::all()`).

---

## Perbandingan Sebelum → Sesudah

| Sebelum (PHP Prosedural) | Sesudah (Laravel) |
|---|---|
| Array `$destinasiList` di Controller/Model manual | Tabel `destinations` + `Destination::all()` (ORM) |
| Array `$paketWisata` di Controller | Tabel `packages` + `Package::all()` (ORM) |
| Form diproses manual `$_POST` | `Request $request` + `$request->validate()` + `Message::create()` |
| `views/home.php` (echo, foreach) | `resources/views/home.blade.php` (`{{ }}`, `@foreach`, `@csrf`) |
| `index.php` sebagai front controller | `routes/web.php` + Controller |
| Pesan form tidak disimpan | Disimpan ke tabel `messages` (CRUD Create) |

Hak Cipta Sistem (c) 2026 TripMate. Seluruh Hak Cipta Dilindungi Undang-Undang.
