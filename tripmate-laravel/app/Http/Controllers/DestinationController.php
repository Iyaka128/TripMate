<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Tampilkan halaman utama TripMate.
     * Data destinasi & paket diambil dari database via ORM (Eloquent).
     */
    public function index()
    {
        $siteName = 'TripMate';
        $siteTagline = 'Generasi Baru Pengalaman Berlibur';
        $siteDescription = 'Rencanakan dan nikmati liburan impianmu dengan kemudahan, estetika, dan kenyamanan kelas dunia bersama TripMate.';
        $contactEmail = 'halo@tripmate.com';
        $contactPhone = '+62 (021) 8089-7700';
        $currentYear = date('Y');

        $heroMetrics = [
            ['angka' => '50+', 'label' => 'Destinasi Kurasi'],
            ['angka' => '12.5k', 'label' => 'Traveler Bahagia'],
            ['angka' => '4.98', 'label' => 'Rating Kepuasan'],
            ['angka' => '24/7', 'label' => 'Concierge & Tim'],
        ];

        $destinasiList = Destination::all();
        $paketWisata = Package::all();

        return view('home', compact(
            'siteName',
            'siteTagline',
            'siteDescription',
            'contactEmail',
            'contactPhone',
            'currentYear',
            'heroMetrics',
            'destinasiList',
            'paketWisata'
        ));
    }
}
