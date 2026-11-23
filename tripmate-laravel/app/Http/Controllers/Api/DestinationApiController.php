<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DestinationApiController extends Controller
{
    private function rules(bool $partial = false): array
    {
        $required = $partial ? 'sometimes' : 'required';

        return [
            'nama' => [$required, 'string', 'max:100'],
            'wilayah' => [$required, 'string', 'max:150'],
            'deskripsi' => [$required, 'string'],
            'harga' => [$required, 'string', 'max:255'],
            'rating' => ['sometimes', 'nullable', 'numeric', 'between:0,5'],
            'kategori' => [$required, 'string', 'max:100'],
            'status' => [$required, Rule::in(['Tersedia', 'Hampir Penuh'])],
            'gambar' => [$required, 'url', 'max:2048'],
            'gambar_alt' => ['sometimes', 'nullable', 'string', 'max:255'],
        ];
    }

    public function index()
    {
        return response()->json([
            'message' => 'Daftar destinasi berhasil diambil.',
            'data' => Destination::all(),
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());
        $validated['rating'] = $validated['rating'] ?? 0;

        $destination = Destination::create($validated);

        return response()->json([
            'message' => 'Destinasi berhasil dibuat.',
            'data' => $destination,
        ], 201);
    }

    public function show(Destination $destination)
    {
        return response()->json([
            'message' => 'Detail destinasi berhasil diambil.',
            'data' => $destination,
        ], 200);
    }

    public function update(Request $request, Destination $destination)
    {
        $partial = $request->isMethod('PATCH');
        $validated = $request->validate($this->rules($partial));

        if (array_key_exists('rating', $validated) && $validated['rating'] === null) {
            $validated['rating'] = 0;
        }

        $destination->update($validated);

        return response()->json([
            'message' => 'Destinasi berhasil diperbarui.',
            'data' => $destination->fresh(),
        ], 200);
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();

        return response()->json([
            'message' => 'Destinasi berhasil dihapus.',
        ], 200);
    }
}
