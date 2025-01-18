<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Aparatur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Aparatur</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Tabel untuk Judul, Foto, dan Deskripsi -->
        <h2 class="mb-4">Diagram Aparatur</h2>
        @if ($diagramAparatur)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $diagramAparatur->judul }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $diagramAparatur->foto) }}" alt="Foto" width="50">
                    </td>
                    <td>{{ $diagramAparatur->deskripsi }}</td>
                    <td>
                        <a href="{{ route('admin.diagramaparatur.edit', $diagramAparatur->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
        @else
        <!-- Form untuk menambahkan Diagram Aparatur jika belum ada data -->
        <form action="{{ route('diagramaparatur.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @endif


        <hr>

        <!-- Tabel Daftar Aparatur -->
        <h2 class="mb-4">Daftar Aparatur</h2>
        <a href="{{ route('admin.aparatur.create') }}" class="btn btn-primary mb-3">Tambah Aparatur</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Kembali</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Posisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aparatur as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto" width="50">
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->posisi }}</td>
                    <td>
                        <a href="{{ route('admin.aparatur.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.aparatur.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $aparatur->links() }}
    </div>
</body>
</html>
