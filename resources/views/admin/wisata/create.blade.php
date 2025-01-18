<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peninggalan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Data Peninggalan</h1>
        <form action="{{ route('admin.wisata.store') }}" method="POST" enctype="multipart/form-data" 
              class="p-4 bg-white rounded shadow-sm">
            @csrf

            <!-- Nama Wisata -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"></textarea>
            </div>

            <!-- Lokasi -->
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" required>
            </div>

            <!-- Jenis Wisata -->
            <div class="mb-3">
                <label for="jenis_wisata" class="form-label">Jenis</label>
                <input type="text" id="jenis_wisata" name="jenis_wisata" class="form-control">
            </div>

            <!-- Kontak -->
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" id="kontak" name="kontak" class="form-control">
            </div>

            <!-- Rating -->
            <!-- <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" id="rating" name="rating" class="form-control" step="0.1" max="5">
            </div> -->

            <!-- Link Peta -->
            <div class="mb-3">
                <label for="link_peta" class="form-label">Link Peta</label>
                <input type="text" id="link_peta" name="link_peta" class="form-control">
            </div>

            <!-- Jam Operasional -->
            <div class="mb-3">
                <label for="jam_operasional" class="form-label">Jam Operasional</label>
                <input type="text" id="jam_operasional" name="jam_operasional" class="form-control">
            </div>

            <!-- Fasilitas -->
            <!-- <div class="mb-3">
                <label for="fasilitas" class="form-label">Fasilitas</label>
                <textarea id="fasilitas" name="fasilitas" class="form-control" rows="4"></textarea>
            </div> -->

            <!-- Foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.wisata.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
