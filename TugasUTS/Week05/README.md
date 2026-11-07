# TripMate — Pekan 5: PHP Procedural

## Tujuan
Membuat halaman TripMate yang memproses data di server menggunakan PHP procedural.

## Kriteria yang diterapkan
- Variable: nama situs, tagline, tahun.
- Array: daftar destinasi berbentuk associative array.
- Function: `escapeHtml()` dan `formatRupiah()`.
- Conditional: menentukan badge status destinasi dan validasi form.
- Loop: `foreach` untuk merender kartu destinasi dan pilihan form.
- Server-side rendering: PHP menghasilkan HTML.
- Form processing: menerima request `POST` dan menampilkan hasil validasi.

## Cara menjalankan
Pastikan PHP terpasang, lalu dari folder `Pekan-05` jalankan:
```bash
php -S localhost:8000
```
Buka `http://localhost:8000` di browser.

## Uji coba
- Pastikan tiga kartu destinasi tampil.
- Periksa harga dan status masing-masing destinasi.
- Kirim form dengan data valid.
- Coba email tidak valid atau kosong untuk melihat pesan error.
