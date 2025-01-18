<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peninggalan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Data Peninggalan</h1>
        <div class="mb-3">
            <a href="{{ route('admin.wisata.create') }}" class="btn btn-primary mb-3">Tambah Peninggalan</a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Lokasi</th>
                    <th>Jenis Peninggalan</th>
                    <th>Kontak</th>
                    <!-- <th>Rating</th> -->
                    <th>Link Peta</th>
                    <th>Jam Operasional</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wisatas as $wisata)
                    <tr>
                        <td>
                            @if ($wisata->foto)
                                <img src="{{ asset('storage/' . $wisata->foto) }}" alt="Foto {{ $wisata->nama }}" class="img-thumbnail" style="max-height: 100px;">
                            @else
                                <small class="text-muted">Tidak ada foto</small>
                            @endif
                        </td>
                        <td>{{ $wisata->nama }}</td>
                        <td>{{ $wisata->lokasi }}</td>
                        <td>{{ $wisata->jenis_wisata ?? '-' }}</td>
                        <td>{{ $wisata->kontak ?? '-' }}</td>
                        <!-- <td>{{ $wisata->rating ?? '-' }}</td> -->
                        <td>
                            @if ($wisata->link_peta)
                                <a href="{{ $wisata->link_peta }}" target="_blank" class="btn btn-sm btn-info">Lihat Peta</a>
                            @else
                                <small class="text-muted">Tidak tersedia</small>
                            @endif
                        </td>
                        <td>{{ $wisata->jam_operasional ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.wisata.edit', $wisata) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.wisata.destroy', $wisata) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>
