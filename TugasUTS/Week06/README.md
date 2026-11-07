# TripMate — Pekan 6: PHP OOP

## Tujuan
Mengelola data destinasi TripMate menggunakan class dan object PHP.

## Kriteria yang diterapkan
- Class `Destination`.
- Object: tiga instance `new Destination(...)`.
- Properties: name, region, description, price, status.
- Constructor `__construct()` untuk inisialisasi object.
- Encapsulation melalui property `private`.
- Getter untuk mengakses property.
- Method `getProfile()` dan `isAvailable()`.
- Object dipakai untuk menghasilkan HTML secara dinamis dengan `foreach`.

## Cara menjalankan
Pastikan PHP terpasang, lalu dari folder `Pekan-06` jalankan:
```bash
php -S localhost:8000
```
Buka `http://localhost:8000` di browser.

## Uji coba
- Pastikan tiga object destinasi tampil sebagai tiga kartu.
- Periksa hasil getter nama, wilayah, harga, dan status.
- Perhatikan badge status: `Tersedia` dan `Hampir Penuh`.
- Buka kode `Destination` untuk melihat property private, constructor, dan method.
