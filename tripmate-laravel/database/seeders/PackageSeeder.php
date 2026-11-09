<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'tier' => 'Starter',
                'judul' => 'Liburan Hemat',
                'deskripsi' => 'Pilihan ideal untuk akhir pekan santai dan pelancong cerdas.',
                'harga' => '1.500.000',
                'is_popular' => false,
                'fasilitas' => [
                    'Durasi 3 Hari 2 Malam',
                    'Hotel Nyaman Bintang 3',
                    'Transportasi Antar-Jemput',
                    'Tour Guide Berpengalaman',
                ],
            ],
            [
                'tier' => 'Pro Experience',
                'judul' => 'Liburan Premium',
                'deskripsi' => 'Kenyamanan menyeluruh dengan fasilitas istimewa dan akses privat.',
                'harga' => '3.500.000',
                'is_popular' => true,
                'fasilitas' => [
                    'Durasi 5 Hari 4 Malam',
                    'Resor & Hotel Premium Bintang 5',
                    'Transportasi Privat & Driver Eksekutif',
                    'Akses Wisata Eksklusif & VIP Skip-line',
                    'Fotografer Profesional & Dokumentasi',
                ],
            ],
            [
                'tier' => 'Explorer',
                'judul' => 'Adventure Trip',
                'deskripsi' => 'Tantangan alam bebas dengan perlengkapan lengkap berstandar aman.',
                'harga' => '2.500.000',
                'is_popular' => false,
                'fasilitas' => [
                    'Durasi 4 Hari 3 Malam',
                    'Glamping & Safari Camping',
                    'Transportasi 4x4 Offroad',
                    'Perlengkapan Adventure & Safety Guide',
                ],
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
