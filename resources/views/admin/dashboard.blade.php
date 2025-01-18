<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 0; }
        .container { padding: 20px; }
        .card { margin: 15px 0; padding: 20px; background: white; border: 1px solid #ddd; border-radius: 8px; }
        .card h3 { margin: 0; }
        .link { text-decoration: none; color: #007bff; font-weight: bold; }
        .header { background: #007bff; color: white; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { margin: 0; font-size: 1.5rem; }
        .logout-button { background: white; color: #007bff; border: none; padding: 8px 12px; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .logout-button:hover { background: #0056b3; color: white; }
    </style>
</head>
<body>
    <!-- <div class="header">
        <h1>Dashboard Admin</h1>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div> -->
    <div class="header">
        <h1>Dashboard Admin</h1>
        <a href="{{ route('profile.index') }}" class="btn btn-secondary">Ke Halaman Profil</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>

    <div class="container">
        <p>Selamat datang, Admin! Berikut adalah pengelolaan fitur:</p>
        <div class="card">
            <h3>Kelola Sejarah</h3>
            <a href="{{ route('admin.sejarah.index') }}" class="link">Lihat Semua Sejarah</a>
        </div>

        <div class="card">
            <h3>Kelola Geografis</h3>
            <a href="{{ route('admin.geografis.index') }}" class="link">Lihat Semua Data Geografis</a>
        </div>

        <div class="card">
            <h3>Kelola Berita</h3>
            <a href="{{ route('admin.berita.index') }}" class="link">Lihat Semua Berita</a>
        </div>

        <div class="card">
            <h3>Kelola Keuangan Desa</h3>
            <a href="{{ route('admin.keuangan.index') }}" class="link">Lihat Semua Data Keuangan</a>
        </div>

        <div class="card">
            <h3>Kelola UMKM</h3>
            <a href="{{ route('admin.umkm.index') }}" class="link">Lihat Semua UMKM</a>
        </div>
        
        <div class="card">
            <h3>Kelola Peninggalan</h3>
            <a href="{{ route('admin.wisata.index') }}" class="link">Lihat Semua Peninggalan</a>
        </div>

        <div class="card">
            <h3>Kelola Aparatur</h3>
            <a href="{{ route('admin.aparatur.index') }}" class="link">Lihat Semua Aparatur</a>
        </div>
    </div>
</body>
</html>
