
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Destinasi - TripMate</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f7; padding: 40px; color: #1d1d1f; }
        .container { max-width: 650px; margin: auto; background: white; padding: 30px; border-radius: 16px; }
        input, textarea, select { width: 100%; box-sizing: border-box; padding: 11px; margin: 7px 0 18px; border: 1px solid #ddd; border-radius: 8px; }
        button { background: #0071e3; color: white; border: 0; padding: 12px 20px; border-radius: 8px; cursor: pointer; }
        label { font-weight: bold; }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Destinasi</h1>

    <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama Destinasi</label>
        <input type="text" name="nama" value="{{ old('nama', $destination->nama) }}" required>

        <label>Wilayah</label>
        <input type="text" name="wilayah" value="{{ old('wilayah', $destination->wilayah) }}" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" required>{{ old('deskripsi', $destination->deskripsi) }}</textarea>

        <label>Harga</label>
        <input type="text" name="harga" value="{{ old('harga', $destination->harga) }}" required>

        <label>Rating</label>
        <input type="number" name="rating" step="0.01" min="0" max="5" value="{{ old('rating', $destination->rating) }}">

        <label>Kategori</label>
        <input type="text" name="kategori" value="{{ old('kategori', $destination->kategori) }}" required>

        <label>Status</label>
        <select name="status" required>
            <option value="Tersedia" {{ old('status', $destination->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="Hampir Penuh" {{ old('status', $destination->status) == 'Hampir Penuh' ? 'selected' : '' }}>Hampir Penuh</option>
        </select>

        <label>URL Gambar</label>
        <input type="url" name="gambar" value="{{ old('gambar', $destination->gambar) }}" required>

        <label>Deskripsi Gambar (Alt)</label>
        <input type="text" name="gambar_alt" value="{{ old('gambar_alt', $destination->gambar_alt) }}">

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p><a href="{{ route('admin.destinations.index') }}">← Kembali</a></p>
</div>
</body>
</html>
