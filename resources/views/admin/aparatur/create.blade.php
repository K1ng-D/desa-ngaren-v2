<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Aparatur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Tambah Aparatur</h1>

        <!-- Tampilkan Pesan Sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.aparatur.store') }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" 
                    name="nama" 
                    id="nama" 
                    class="form-control @error('nama') is-invalid @enderror" 
                    value="{{ old('nama') }}" 
                    required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi:</label>
                <input type="text" 
                    name="posisi" 
                    id="posisi" 
                    class="form-control @error('posisi') is-invalid @enderror" 
                    value="{{ old('posisi') }}" 
                    required>
                @error('posisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" 
                    name="foto" 
                    id="foto" 
                    class="form-control @error('foto') is-invalid @enderror" 
                    value="{{ old('foto') }}">
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.aparatur.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
