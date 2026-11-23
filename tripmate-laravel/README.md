# TripMate — Week 10 (Controller, Routing, Validation & REST API)

Pada Week 10, pengembangan TripMate difokuskan pada pengelolaan data destinasi menggunakan Controller, penerapan Request Validation, serta pembuatan RESTful API menggunakan Laravel 13.

## 1. Controller-Based CRUD

Fitur CRUD destinasi dikelola melalui `DestinationController.php`:

- **Create** — menambahkan destinasi baru.
- **Read** — menampilkan daftar destinasi.
- **Update** — memperbarui informasi destinasi.
- **Delete** — menghapus destinasi.

Route CRUD didefinisikan pada `routes/web.php` dengan HTTP method GET, POST, PUT, dan DELETE.

View CRUD berada di `resources/views/destinations/`.

## 2. Request & Validation

Validasi diterapkan pada proses Create dan Update menggunakan `$request->validate()`.

Aturan validasi meliputi:
- Nama, wilayah, deskripsi, harga, kategori, dan gambar wajib diisi.
- Nama maksimal 100 karakter.
- Rating berupa angka dengan rentang 0–5.
- Status hanya menerima `Tersedia` atau `Hampir Penuh`.
- URL gambar harus valid.

Jika validasi gagal, pesan kesalahan ditampilkan pada form dan data tidak disimpan. Jika berhasil, data disimpan atau diperbarui menggunakan Eloquent.

## 3. RESTful API

REST API dibuat untuk menyediakan akses pengelolaan data destinasi dalam format JSON.

Controller API: `app/Http/Controllers/Api/DestinationApiController.php`

Route API: `routes/api.php`

| HTTP Method | Endpoint | Fungsi |
|---|---|---|
| GET | `/api/destinations` | Menampilkan semua destinasi |
| POST | `/api/destinations` | Menambahkan destinasi |
| GET | `/api/destinations/{id}` | Menampilkan detail destinasi |
| PUT | `/api/destinations/{id}` | Memperbarui seluruh data |
| PATCH | `/api/destinations/{id}` | Memperbarui sebagian data |
| DELETE | `/api/destinations/{id}` | Menghapus destinasi |

Respons API menggunakan JSON dengan HTTP status code seperti `200`, `201`, `404`, dan `422`.

Dokumentasi API tersedia pada `API_DOCUMENTATION.md`.

## 4. Menjalankan dan Menguji

Jalankan aplikasi menggunakan:

```bash
php artisan serve
```

Pengujian dilakukan melalui:
- Halaman `/admin/destinations` untuk menguji CRUD.
- Form Create dan Update untuk menguji validasi.
- Endpoint `/api/destinations` untuk menguji RESTful API menggunakan browser atau Postman.

**Hasil Week 10:** TripMate telah memiliki fitur CRUD destinasi berbasis Controller, validasi input, dan RESTful API untuk pengelolaan data destinasi.

---

Hak Cipta Sistem (c) 2026 TripMate. Seluruh Hak Cipta Dilindungi Undang-Undang.