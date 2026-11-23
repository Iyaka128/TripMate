# TripMate REST API — Week 10 Task 3

Base URL saat local development: `http://127.0.0.1:8000/api`

Semua endpoint menggunakan JSON. Untuk request POST/PUT/PATCH, kirim header:
- `Accept: application/json`
- `Content-Type: application/json`

## Endpoints

| Method | Endpoint | Fungsi | Sukses |
|---|---|---|---|
| GET | `/destinations` | Daftar destinasi | 200 |
| POST | `/destinations` | Membuat destinasi | 201 |
| GET | `/destinations/{id}` | Detail destinasi | 200 |
| PUT | `/destinations/{id}` | Mengganti data destinasi | 200 |
| PATCH | `/destinations/{id}` | Memperbarui sebagian field | 200 |
| DELETE | `/destinations/{id}` | Menghapus destinasi | 200 |

## Contoh JSON untuk POST / PUT

```json
{
  "nama": "Pantai Contoh",
  "wilayah": "Bali",
  "deskripsi": "Pantai dengan pemandangan laut.",
  "harga": "Mulai Rp500.000",
  "rating": 4.8,
  "kategori": "Pantai",
  "status": "Tersedia",
  "gambar": "https://example.com/pantai.jpg",
  "gambar_alt": "Pemandangan pantai"
}
```

Status yang diterima: `Tersedia` atau `Hampir Penuh`. Rating harus berada pada rentang 0 sampai 5. Nama maksimal 100 karakter. URL gambar harus berupa URL yang valid.

## Validasi gagal

Laravel mengembalikan HTTP `422 Unprocessable Content` dan JSON berisi `message` serta `errors` jika request API tidak memenuhi aturan validasi.

## Menjalankan API

1. Pastikan dependensi sudah terpasang (`composer install`) dan `.env` sudah dikonfigurasi.
2. Jalankan migrasi bila database belum disiapkan (`php artisan migrate`).
3. Jalankan server (`php artisan serve`).
4. Uji endpoint melalui Postman atau Thunder Client.
