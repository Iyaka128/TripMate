<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            [
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

        foreach ($destinations as $destination) {
            Destination::create($destination);
        }
    }
}
