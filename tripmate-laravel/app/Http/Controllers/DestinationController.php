<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DestinationController extends Controller
{
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

    public function manageIndex()
    {
        $destinations = Destination::all();

        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    /**
     * Aturan validasi untuk form destinasi.
     * Status mengikuti pilihan yang sudah digunakan TripMate.
     */
    private function destinationRules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:100'],
            'wilayah' => ['required', 'string', 'max:150'],
            'deskripsi' => ['required', 'string'],
            'harga' => ['required', 'string', 'max:255'],
            'rating' => ['nullable', 'numeric', 'between:0,5'],
            'kategori' => ['required', 'string', 'max:100'],
            'status' => ['required', Rule::in(['Tersedia', 'Hampir Penuh'])],
            'gambar' => ['required', 'url', 'max:2048'],
            'gambar_alt' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->destinationRules());
        $validated['rating'] = $validated['rating'] ?? 0;

        Destination::create($validated);

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate($this->destinationRules());
        $validated['rating'] = $validated['rating'] ?? 0;

        $destination->update($validated);

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil diperbarui.');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return redirect()
            ->route('admin.destinations.index')
            ->with('success', 'Destinasi berhasil dihapus.');
    }
}
