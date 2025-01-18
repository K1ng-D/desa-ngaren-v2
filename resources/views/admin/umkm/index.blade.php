<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Daftar UMKM</h1>
        <a href="{{ route('admin.umkm.create') }}" class="btn btn-primary mb-3">Tambah UMKM</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali</a>
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Usaha</th>
                    <th>Pemilik</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Kontak</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($umkms as $umkm)
                    <tr>
                        <td>{{ $umkm->nama_usaha }}</td>
                        <td>{{ $umkm->pemilik }}</td>
                        <td>{{ $umkm->kategori }}</td>
                        <td>{{ $umkm->lokasi }}</td>
                        <td>{{ $umkm->kontak }}</td>
                        <td>
                            @if ($umkm->foto)
                                <img src="{{ asset('storage/' . $umkm->foto) }}" alt="Foto UMKM" class="img-thumbnail" style="width: 100px;">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.umkm.edit', $umkm->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.umkm.destroy', $umkm->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus UMKM ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
