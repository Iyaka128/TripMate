<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Menampilkan halaman utama TripMate.
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

    /**
     * Menampilkan daftar destinasi untuk pengelolaan.
     */
    public function manageIndex()
    {
        $destinations = Destination::all();

        return view('destinations.index', compact('destinations'));
    }

    /**
     * Menampilkan form tambah destinasi.
     */
    public function create()
    {
        return view('destinations.create');
    }

    /**
     * Menyimpan destinasi baru.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'nama',
            'wilayah',
            'deskripsi',
            'harga',
            'rating',
            'kategori',
            'status',
            'gambar',
            'gambar_alt',
        ]);

        Destination::create($data);

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit destinasi.
     */
    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    /**
     * Memperbarui data destinasi.
     */
    public function update(Request $request, Destination $destination)
    {
        $data = $request->only([
            'nama',
            'wilayah',
            'deskripsi',
            'harga',
            'rating',
            'kategori',
            'status',
            'gambar',
            'gambar_alt',
        ]);

        $destination->update($data);

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil diperbarui.');
    }

    /**
     * Menghapus destinasi.
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil dihapus.');
    }
}
