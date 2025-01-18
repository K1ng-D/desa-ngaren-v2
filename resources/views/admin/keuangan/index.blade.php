<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Keuangan Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Data Keuangan Desa</h1>
        <div class="mb-3">
            <a href="{{ route('admin.keuangan.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Foto</th> <!-- Kolom baru -->
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($keuangans as $keuangan)
                        <tr>
                            <td>
                                @if ($keuangan->foto)
                                    <img src="{{ asset('storage/' . $keuangan->foto) }}" alt="Foto Keuangan" width="100" class="img-thumbnail">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>{{ $keuangan->kategori }}</td>
                            <td>Rp {{ number_format($keuangan->jumlah, 2) }}</td>
                            <td>{{ $keuangan->deskripsi }}</td>
                            <td>{{ $keuangan->tanggal }}</td>
                            <td>
                                <a href="{{ route('admin.keuangan.edit', $keuangan) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.keuangan.destroy', $keuangan) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
