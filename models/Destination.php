<?php
/**
 * TripMate — Model Destinasi
 * Week 6: Class, Object, Properties, Methods, Constructor, Encapsulation.
 */
declare(strict_types=1);

class Destination
{
    private int $id;
    private string $nama;
    private string $wilayah;
    private string $deskripsi;
    private string $harga;
    private float $rating;
    private string $kategori;
    private string $status;
    private string $gambar;
    private string $gambarAlt;

    public function __construct(array $data)
    {
        $this->id = (int) ($data['id'] ?? 0);
        $this->nama = (string) ($data['nama'] ?? '');
        $this->wilayah = (string) ($data['wilayah'] ?? '');
        $this->deskripsi = (string) ($data['deskripsi'] ?? '');
        $this->harga = (string) ($data['harga'] ?? '');
        $this->rating = (float) ($data['rating'] ?? 0);
        $this->kategori = (string) ($data['kategori'] ?? 'Destinasi');
        $this->status = (string) ($data['status'] ?? 'Tersedia');
        $this->gambar = (string) ($data['gambar'] ?? '');
        $this->gambarAlt = (string) ($data['gambar_alt'] ?? '');
    }

    public function getNama(): string { return $this->nama; }
    public function getWilayah(): string { return $this->wilayah; }
    public function getHarga(): string { return $this->harga; }

    /** Method untuk merangkum informasi destinasi. */
    public function getProfile(): string
    {
        return $this->nama . ' — ' . $this->wilayah;
    }

    /** Mengubah object menjadi struktur data yang dipakai oleh View lama. */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'wilayah' => $this->wilayah,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            'rating' => $this->rating,
            'kategori' => $this->kategori,
            'status' => $this->status,
            'gambar' => $this->gambar,
            'gambar_alt' => $this->gambarAlt,
            'profil' => $this->getProfile(),
        ];
    }

    /** Sumber data destinasi untuk aplikasi. */
    public static function all(): array
    {
        $data = [
            [
                'id' => 1,
                'nama' => 'Pulau Dewata, Bali',
                'wilayah' => 'Bali, Indonesia',
                'deskripsi' => 'Nikmati ketenangan pantai sunset, kehangatan budaya lokal, kuliner autentik, dan lanskap alam magis.',
                'harga' => 'Rp1.850.000',
                'rating' => 4.95,
                'kategori' => 'Favorit Wisatawan',
                'status' => 'Tersedia',
                'gambar' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?auto=format&fit=crop&w=1000&q=80',
                'gambar_alt' => 'images/bali.jpg',
            ],
            [
                'id' => 2,
                'nama' => 'Yogyakarta Heritage',
                'wilayah' => 'D.I. Yogyakarta',
                'deskripsi' => 'Jelajahi megahnya candi warisan dunia, sentuhan seni keraton, keramahan istimewa, dan ragam kuliner legendaris.',
                'harga' => 'Rp1.450.000',
                'rating' => 4.91,
                'kategori' => 'Heritage & Seni',
                'status' => 'Hampir Penuh',
                'gambar' => 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=1000&q=80',
                'gambar_alt' => 'images/yogyakarta.jpg',
            ],
            [
                'id' => 3,
                'nama' => 'Lombok & Gili Island',
                'wilayah' => 'Lombok, NTB',
                'deskripsi' => 'Temukan air laut kristal toska, pasir putih memesona, dan kemegahan jalur pendakian Gunung Rinjani.',
                'harga' => 'Rp2.150.000',
                'rating' => 4.97,
                'kategori' => 'Eksplorasi Alam',
                'status' => 'Tersedia',
                'gambar' => 'https://images.unsplash.com/photo-1570789210967-2cac24afeb00?auto=format&fit=crop&w=1000&q=80',
                'gambar_alt' => 'images/lombok.jpg',
            ],
        ];

        return array_map(
            static fn(array $item): Destination => new Destination($item),
            $data
        );
    }
}
