<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah UMKM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Tambah UMKM</h1>
        <form action="{{ route('admin.umkm.store') }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="nama_usaha" class="form-label">Nama Usaha:</label>
                <input type="text" name="nama_usaha" id="nama_usaha" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="pemilik" class="form-label">Pemilik:</label>
                <input type="text" name="pemilik" id="pemilik" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <input type="text" name="kategori" id="kategori" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi:</label>
                <input type="text" name="lokasi" id="lokasi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak:</label>
                <input type="text" name="kontak" id="kontak" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Tambah UMKM</button>
            <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
