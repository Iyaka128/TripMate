# TripMate — Pekan 4: REST API, Fetch API & Data Dinamis

## Tujuan
Menghubungkan halaman TripMate dengan API, membaca response JSON, dan menampilkan hasilnya secara dinamis.

## API yang digunakan
Open-Meteo Geocoding API (gratis dan tidak membutuhkan API key):
`https://geocoding-api.open-meteo.com/v1/search`

## Fitur dan kriteria materi
1. Mengirim request HTTP GET dengan `fetch()`.
2. Memeriksa `response.ok`.
3. Membaca JSON menggunakan `response.json()`.
4. Menggunakan `async/await` dan `try/catch`.
5. Menampilkan loading state.
6. Menangani error dan hasil kosong.
7. Merender beberapa hasil lokasi ke DOM.

## Cara menjalankan
Buka `index.html` di browser yang terhubung ke internet. API membutuhkan koneksi internet.

## Uji coba
- Cari `Yogyakarta`, `Bali`, atau `Lombok`.
- Amati pesan loading ketika request berjalan.
- Periksa kartu hasil yang berisi nama lokasi, wilayah, dan koordinat.
- Cari nama kota acak untuk menguji kondisi hasil kosong.
- Putuskan koneksi internet untuk melihat penanganan error.
