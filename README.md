# TripMate — Apple Design Edition (Tailwind CSS)

TripMate adalah landing page perjalanan premium yang memadukan **Bahasa Desain Apple (Apple Design Language)** dengan framework **Tailwind CSS**.

##  Karakteristik Desain Apple
- **Tipografi Presisi**: Menggunakan font stack Apple San Francisco (`SF Pro Display` / `SF Pro Text`) dengan tracking rapat (`tracking-apple-tight`).
- **Material Glassmorphism**: Navigasi frosted glass mengambang dengan utilitas `apple-glass` (`backdrop-filter: blur(20px) saturate(180%)`).
- **Apple Bento Grid**: Grid interaktif modern untuk menampilkan keunggulan fitur utama.
- **Kartu Produk Apple Pro**: Pilihan paket unggulan dengan border aksen Apple Blue (`#0071e3`), bayangan glow, dan elevasi pro.
- **100% Pure CSS (Tanpa JavaScript Klien)**: Halaman berjalan sepenuhnya tanpa JavaScript di browser.

## 🛠️ Perintah Tailwind CSS
Proyek ini telah dikonfigurasi dengan Tailwind CLI:

- **Build CSS (Produksi)**:
  ```bash
  npm run build
  ```
- **Watch Mode (Pengembangan)**:
  ```bash
  npm run dev
  ```

## 📂 Struktur File
- [`index.html`](file:///index.html) — Dokumen HTML dengan utilitas Tailwind CSS.
- [`tailwind.config.js`](file:///tailwind.config.js) — Konfigurasi token desain Apple (warna, radius, shadow, font).
- [`input.css`](file:///input.css) — Directive Tailwind dan layer glassmorphism kustom.
- [`style.css`](file:///style.css) — File output CSS hasil kompilasi Tailwind yang siap digunakan di browser.
- [`package.json`](file:///package.json) — Konfigurasi dependencies dan script build.
- `images/` — Aset fotografi resolusi tinggi untuk destinasi (Bali, Yogyakarta, Lombok) dan hero banner.