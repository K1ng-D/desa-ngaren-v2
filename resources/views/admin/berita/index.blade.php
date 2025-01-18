<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-4">
    <h1 class="mb-4">Daftar Berita</h1>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>
        <!-- <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Tambah Berita</a> -->
        <!-- <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Kembali</a> -->
    </div>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Judul</th>
                <th>Konten</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beritas as $berita)
                <tr>
                    <td>{{ $berita->judul }}</td>
                    <td>{{ $berita->konten }}</td>
                    <td>{{ $berita->kategori }}</td>
                    <td>{{ $berita->tanggal }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto Berita" class="img-fluid" style="max-height: 100px; max-width: 100px;">
                    </td>
                    <td>
                        <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
