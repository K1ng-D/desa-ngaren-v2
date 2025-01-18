<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aparatur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Aparatur</h1>
        <form action="{{ route('admin.aparatur.update', $aparatur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $aparatur->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi</label>
                <input type="text" name="posisi" id="posisi" class="form-control" value="{{ $aparatur->posisi }}" required>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
                @if ($aparatur->foto)
                <img src="{{ asset('storage/' . $aparatur->foto) }}" alt="Foto Lama" class="mt-2" width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.aparatur.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
