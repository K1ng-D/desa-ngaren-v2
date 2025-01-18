<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Diagram Aparatur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Diagram Aparatur</h2>

        <!-- Tampilkan pesan sukses atau error -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Formulir Edit Diagram Aparatur -->
        <form action="{{ route('admin.diagramaparatur.update', $diagram->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $diagram->judul) }}" required>
                @error('judul')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $diagram->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto</small>

                <!-- Menampilkan foto yang sudah ada jika ada -->
                @if ($diagram->foto)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $diagram->foto) }}" alt="Diagram Foto" width="150">
                    </div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.aparatur.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
