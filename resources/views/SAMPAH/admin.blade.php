<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel - Profil Kabupaten Sukoharjo</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> 
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet" />
</head>
<body>
    <header>
        <div class="jumbotron">
            <h1>Admin Panel - Profil Kabupaten Sukoharjo</h1>
        </div>
    </header>

    <main>
        <section id="sejarah-admin" class="admin-card">
            <h2>Edit Sejarah</h2>
            <form action="update_sejarah.php" method="POST" enctype="multipart/form-data">
                <label for="sejarah-title">Judul Sejarah</label>
                <input type="text" id="sejarah-title" name="sejarah-title" value="Sejarah Kabupaten Sukoharjo" required>

                <label for="sejarah-image">Gambar Sejarah</label>
                <input type="file" id="sejarah-image" name="sejarah-image" accept="image/*">

                <label for="sejarah-content">Isi Sejarah</label>
                <textarea id="sejarah-content" name="sejarah-content" rows="6" required>
                    <!-- Add content here -->
                </textarea>

                <button type="submit">Simpan Perubahan</button>
            </form>
        </section>

        <section id="geografis-admin" class="admin-card">
            <h2>Edit Geografis</h2>
            <form action="update_geografis.php" method="POST" enctype="multipart/form-data">
                <label for="geografis-title">Judul Geografis</label>
                <input type="text" id="geografis-title" name="geografis-title" value="Geografis Kabupaten Sukoharjo" required>

                <label for="geografis-image">Gambar Geografis</label>
                <input type="file" id="geografis-image" name="geografis-image" accept="image/*">

                <label for="geografis-content">Isi Geografis</label>
                <textarea id="geografis-content" name="geografis-content" rows="6" required>
                    <!-- Add content here -->
                </textarea>

                <button type="submit">Simpan Perubahan</button>
            </form>
        </section>

        <section id="wisata-admin" class="admin-card">
            <h2>Edit Wisata</h2>
            <form action="update_wisata.php" method="POST" enctype="multipart/form-data">
                <label for="wisata-title">Judul Wisata</label>
                <input type="text" id="wisata-title" name="wisata-title" value="Wisata Kabupaten Sukoharjo" required>

                <label for="wisata-image">Gambar Wisata</label>
                <input type="file" id="wisata-image" name="wisata-image" accept="image/*">

                <label for="wisata-content">Isi Wisata</label>
                <textarea id="wisata-content" name="wisata-content" rows="6" required>
                    <!-- Add content here -->
                </textarea>

                <label for="wisata-alam">Wisata Alam</label>
                <input type="text" id="wisata-alam" name="wisata-alam" value="Gunung Sepikul, Telaga Biru, Alas Karet Polokarto">

                <label for="wisata-budaya">Wisata Budaya</label>
                <input type="text" id="wisata-budaya" name="wisata-budaya" value="Petilasan Keraton Kerajaan Pajang, Museum Pesanggrahan Langenharjo">

                <button type="submit">Simpan Perubahan</button>
            </form>
        </section>

        <section id="lambang-admin" class="admin-card">
            <h2>Edit Lambang</h2>
            <form action="update_lambang.php" method="POST" enctype="multipart/form-data">
                <label for="lambang-title">Judul Lambang</label>
                <input type="text" id="lambang-title" name="lambang-title" value="Arti Lambang Kabupaten Sukoharjo" required>

                <label for="lambang-image">Gambar Lambang</label>
                <input type="file" id="lambang-image" name="lambang-image" accept="image/*">

                <label for="lambang-content">Isi Lambang</label>
                <textarea id="lambang-content" name="lambang-content" rows="6" required>
                    <!-- Add content here -->
                </textarea>

                <button type="submit">Simpan Perubahan</button>
            </form>
        </section>
    </main>

    <footer>
        <p>Muhammad Abdullah &#169; 2024, Dicoding Academy</p>
    </footer>
</body>
</html>
