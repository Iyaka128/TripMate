
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Destinasi - TripMate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f7;
            color: #1d1d1f;
            margin: 0;
            padding: 40px;
        }
        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 16px;
        }
        h1 { margin-top: 0; }
        a, button {
            padding: 9px 14px;
            border: 0;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }
        .add { background: #0071e3; color: white; }
        .edit { background: #e8f2ff; color: #0071e3; }
        .delete { background: #ffe8e8; color: #d00; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        th, td {
            padding: 13px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }
        th { background: #f5f5f7; }
        form { display: inline; }
        .success { color: green; margin-top: 15px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Kelola Destinasi TripMate</h1>
    <p>Kelola daftar destinasi wisata TripMate.</p>

    <a href="{{ route('admin.destinations.create') }}" class="add">
        + Tambah Destinasi
    </a>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Wilayah</th>
                <th>Harga</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($destinations as $destination)
                <tr>
                    <td>{{ $destination->nama }}</td>
                    <td>{{ $destination->wilayah }}</td>
                    <td>{{ $destination->harga }}</td>
                    <td>{{ $destination->rating }}</td>
                    <td>
                        <a href="{{ route('admin.destinations.edit', $destination->id) }}"
                           class="edit">Edit</a>

                        <form action="{{ route('admin.destinations.destroy', $destination->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus destinasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data destinasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p><a href="{{ url('/') }}">← Kembali ke Homepage TripMate</a></p>
</div>
</body>
</html>
