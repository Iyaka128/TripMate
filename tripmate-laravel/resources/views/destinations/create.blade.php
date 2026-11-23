<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi - TripMate</title>

    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f7; padding: 40px; color: #1d1d1f; }
        .container { max-width: 650px; margin: auto; background: white; padding: 30px; border-radius: 16px; }
        input, textarea, select { width: 100%; box-sizing: border-box; padding: 11px; margin: 7px 0 5px; border: 1px solid #ddd; border-radius: 8px; }
        textarea { min-height: 110px; }
        button { background: #0071e3; color: white; border: 0; padding: 12px 20px; border-radius: 8px; cursor: pointer; }
        label { font-weight: bold; display: block; margin-top: 14px; }
        .error { color: #b91c1c; font-size: 13px; margin: 3px 0 10px; }
        .error-summary { background: #fee2e2; color: #991b1b; border-radius: 8px; padding: 12px 16px; margin-bottom: 18px; }
        .invalid { border-color: #dc2626; }
    </style>

</head>
<body>
<div class="container">
    <h1>Tambah Destinasi</h1>

    @if ($errors->any())
        <div class="error-summary">
            <strong>Data belum valid. Periksa kembali:</strong>
            <ul>@foreach ($errors->all() as $error)<li>{ $error }</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('admin.destinations.store') }}" method="POST">
        @csrf

        <label>Nama Destinasi</label>
        <input type="text" name="nama" value="{{ old('nama') }}" maxlength="100" required class="@error('nama') invalid @enderror">
        @error('nama') <div class="error">{{ $message }}</div> @enderror

        <label>Wilayah</label>
        <input type="text" name="wilayah" value="{{ old('wilayah') }}" maxlength="150" required class="@error('wilayah') invalid @enderror">
        @error('wilayah') <div class="error">{{ $message }}</div> @enderror

        <label>Deskripsi</label>
        <textarea name="deskripsi" required class="@error('deskripsi') invalid @enderror">{{ old('deskripsi') }}</textarea>
        @error('deskripsi') <div class="error">{{ $message }}</div> @enderror

        <label>Harga</label>
        <input type="text" name="harga" value="{{ old('harga') }}" maxlength="255" required class="@error('harga') invalid @enderror">
        @error('harga') <div class="error">{{ $message }}</div> @enderror

        <label>Rating (0 sampai 5)</label>
        <input type="number" name="rating" step="0.01" min="0" max="5" value="{{ old('rating', 0) }}" class="@error('rating') invalid @enderror">
        @error('rating') <div class="error">{{ $message }}</div> @enderror

        <label>Kategori</label>
        <input type="text" name="kategori" value="{{ old('kategori') }}" maxlength="100" required class="@error('kategori') invalid @enderror">
        @error('kategori') <div class="error">{{ $message }}</div> @enderror

        <label>Status</label>
        <select name="status" required class="@error('status') invalid @enderror">
            <option value="">Pilih status</option>
            <option value="Tersedia" @selected(old('status') === 'Tersedia')>Tersedia</option>
            <option value="Hampir Penuh" @selected(old('status') === 'Hampir Penuh')>Hampir Penuh</option>
        </select>
        @error('status') <div class="error">{{ $message }}</div> @enderror

        <label>URL Gambar</label>
        <input type="url" name="gambar" value="{{ old('gambar') }}" maxlength="2048" required class="@error('gambar') invalid @enderror">
        @error('gambar') <div class="error">{{ $message }}</div> @enderror

        <label>Deskripsi Gambar (Alt)</label>
        <input type="text" name="gambar_alt" value="{{ old('gambar_alt') }}" maxlength="255" class="@error('gambar_alt') invalid @enderror">
        @error('gambar_alt') <div class="error">{{ $message }}</div> @enderror

        <button type="submit">Simpan Destinasi</button>
    </form>

    <p><a href="{{ route('admin.destinations.index') }}">← Kembali</a></p>
</div>
</body>
</html>
