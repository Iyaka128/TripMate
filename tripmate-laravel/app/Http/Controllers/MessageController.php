<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Simpan pesan reservasi dari form kontak ke tabel messages (ORM create).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        Message::create($validated);

        return redirect('/#kontak')->with('status', [
            'tipe' => 'success',
            'judul' => 'Pesan Terkirim',
            'pesan' => 'Terima kasih, ' . $validated['nama'] . '! Permintaan reservasi Anda telah berhasil kami terima.',
        ]);
    }
}
