<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Berita</h1>
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="konten" class="form-label">Konten:</label>
                <textarea name="konten" id="konten" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <select name="kategori" id="kategori" class="form-select" required>
                    <option value="Informasi Terbaru">Informasi Terbaru</option>
                    <option value="Publikasi Kegiatan">Publikasi Kegiatan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
