<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peninggalan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">Edit Data Peninggalan</h1>
        <form action="{{ route('admin.wisata.update', $wisata) }}" method="POST" enctype="multipart/form-data" 
              class="p-4 bg-white rounded shadow-sm">
            @csrf
            @method('PUT')

            <!-- Nama Wisata -->
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $wisata->nama }}" required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="form-control" rows="4">{{ $wisata->deskripsi }}</textarea>
            </div>

            <!-- Lokasi -->
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" class="form-control" value="{{ $wisata->lokasi }}" required>
            </div>

            <!-- Jenis Wisata -->
            <div class="mb-3">
                <label for="jenis_wisata" class="form-label">Jenis</label>
                <input type="text" id="jenis_wisata" name="jenis_wisata" class="form-control" value="{{ $wisata->jenis_wisata }}">
            </div>

            <!-- Kontak -->
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" id="kontak" name="kontak" class="form-control" value="{{ $wisata->kontak }}">
            </div>

            <!-- Rating -->
            <!-- <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" id="rating" name="rating" class="form-control" step="0.1" max="5" value="{{ $wisata->rating }}">
            </div> -->

            <!-- Link Peta -->
            <div class="mb-3">
                <label for="link_peta" class="form-label">Link Peta</label>
                <input type="text" id="link_peta" name="link_peta" class="form-control" value="{{ $wisata->link_peta }}">
            </div>

            <!-- Jam Operasional -->
            <div class="mb-3">
                <label for="jam_operasional" class="form-label">Jam Operasional</label>
                <input type="text" id="jam_operasional" name="jam_operasional" class="form-control" value="{{ $wisata->jam_operasional }}">
            </div>

            <!-- Fasilitas -->
            <!-- <div class="mb-3">
                <label for="fasilitas" class="form-label">Fasilitas</label>
                <textarea id="fasilitas" name="fasilitas" class="form-control" rows="4">{{ $wisata->fasilitas }}</textarea>
            </div> -->

            <!-- Foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" id="foto" name="foto" class="form-control">
                @if ($wisata->foto)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $wisata->foto) }}" alt="Foto Wisata" 
                            class="img-thumbnail" style="max-height: 150px;">
                        <p class="text-muted mt-1">Foto saat ini</p>
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.wisata.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
