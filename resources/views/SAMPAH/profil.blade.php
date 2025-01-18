<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profil Kabupaten Sukoharjo</title>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> 
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet" />

</head>
<body>
    
    <header>
        <nav>
            <ul>
                <li>
                    <a href="#sejarah">Sejarah</a>
                </li>
                <li>
                    <a href="#geografis">Geografis</a>
                </li>
                <li>
                    <a href="#wisata">Wisata</a>
                    <ul class="dropdown">
                        <li>
                            <a href="#wstalam">Alam</a>
                        </li>
                        <li>
                            <a href="#wstbudaya">Budaya</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#lambang">Lambang</a>
                </li>
            </ul>
        </nav>
        <div class="jumbotron">
            <h1>Kabupaten Sukoharjo</h1>
        </div>
    </header>

    <main>
        <div id="content">
            @foreach ($sejarah as $item)
                <article id="sejarah" class="card">
                    <h2>{{ $item->tanggal }}</h2>
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="sejarah" class="imgSejarah">
                    <p>{{ $item->deskripsi }}</p>
                </article>
            @endforeach
            @foreach ($geografis as $item)
                <div class="card">
                    <h3>{{ $item->tanggal }}</h3>
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Geografis" class="imgSejarah">
                    <p>{{ $item->deskripsi }}</p>
                </div>
            @endforeach

            <article id="struktur" class="card">
                <h2>Struktur Aparatur</h2>
                <p>Berikut adalah struktur organisasi pemerintah Kabupaten Sukoharjo:</p>
                <img src="image/struktur-aparatur.png" alt="Struktur Aparatur" class="imgSejarah">
            </article>

            <article id="info-terbaru" class="card">
                <h2>Informasi Terbaru dan Publikasi Kegiatan</h2>
                <p>Berita dan kegiatan terbaru dari Kabupaten Sukoharjo:</p>
                <section>
                    <h3>Publikasi Kegiatan</h3>
                    <ul>
                        @if($beritas->isEmpty())
                            <li>Tidak ada berita terbaru.</li>
                        @else
                            @foreach ($beritas as $berita)
                                <li>
                                    <a href="#">{{ $berita->judul }}</a>
                                    <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}" class="imgBerita">
                                    <p>{{ $berita->deskripsi }}</p>
                                    <p><small>{{ $berita->tanggal }}</small></p>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </section>
            </article>

            <article id="keuangan-desa" class="card">
                <h2>Informasi Keuangan Desa</h2>
                <p>Berikut adalah data transparansi keuangan desa:</p>
                <table border="1">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Kategori</th>
                            <th>Jumlah</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($keuangans as $keuangan)
                            <tr>
                                <td>
                                    @if ($keuangan->foto)
                                        <img src="{{ asset('storage/' . $keuangan->foto) }}" alt="Foto Keuangan" style="max-height: 100px; max-width: 100px;">
                                    @else
                                        Tidak ada foto
                                    @endif
                                </td>
                                <td>{{ $keuangan->kategori }}</td>
                                <td>Rp {{ number_format($keuangan->jumlah, 2) }}</td>
                                <td>{{ $keuangan->deskripsi }}</td>
                                <td>{{ $keuangan->tanggal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </article>

            <article id="umkm" class="card">
                <h2>UMKM Kabupaten Sukoharjo</h2>
                <p>Potensi usaha mikro, kecil, dan menengah di Kabupaten Sukoharjo:</p>
                <section>
                    <h3>Produk Unggulan</h3>
                    <ul>
                        <li>Batik Sukoharjo</li>
                        <li>Jamu Tradisional</li>
                        <li>Souvenir Khas Jawa</li>
                    </ul>
                    <img src="{{ asset('image/produk-umkm.png') }}" alt="Produk UMKM" class="imgSejarah">
                </section>

                <section>
                    <h3>Daftar UMKM</h3>
                    @if ($umkms->isEmpty())
                        <p>Tidak ada UMKM yang tersedia saat ini.</p>
                    @else
                        <ul>
                            @foreach ($umkms as $umkm)
                                <li>
                                    <h4>{{ $umkm->nama_usaha }}</h4>
                                    <p><strong>Pemilik:</strong> {{ $umkm->pemilik }}</p>
                                    <p><strong>Kategori:</strong> {{ $umkm->kategori }}</p>
                                    <p><strong>Lokasi:</strong> {{ $umkm->lokasi }}</p>
                                    <p><strong>Kontak:</strong> {{ $umkm->kontak }}</p>
                                    <p><strong>Deskripsi:</strong> {{ $umkm->deskripsi }}</p>
                                    @if ($umkm->foto)
                                        <img src="{{ asset('storage/' . $umkm->foto) }}" alt="Foto UMKM" width="100">
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </section>
            </article> 

            <article id="wisata" class="card">
                <h2>Daftar Wisata</h2>
                @foreach($wisatas as $wisata)
                    <section class="wisata-item">
                        <h3>{{ $wisata->nama }}</h3>
                        <img src="{{ $wisata->foto ? asset('storage/' . $wisata->foto) : asset('images/default.png') }}" 
                             alt="{{ $wisata->nama }}" class="imgSejarah">
                        <p><strong>Lokasi:</strong> {{ $wisata->lokasi }}</p>
                        <p><strong>Deskripsi:</strong> {{ $wisata->deskripsi }}</p>
                        <p><strong>Jenis Wisata:</strong> {{ $wisata->jenis_wisata }}</p>
                        <p><strong>Jam Operasional:</strong> {{ $wisata->jam_operasional }}</p>
                        <p><strong>Fasilitas:</strong> {{ $wisata->fasilitas }}</p>
                        <p><strong>Kontak:</strong> {{ $wisata->kontak }}</p>
                        <p><strong>Rating:</strong> {{ $wisata->rating }}/5</p>
                        @if($wisata->link_peta)
                            <a href="{{ $wisata->link_peta }}" target="_blank">Lihat Lokasi di Peta</a>
                        @endif
                    </section>
                @endforeach
            </article>

            <article id="lambang" class="card">
                <h2>Arti Lambang</h2>
                <p>Deskripsi arti lambang Kabupaten Sukoharjo akan ditampilkan di sini.</p>
            </article>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Kabupaten Sukoharjo. All rights reserved.</p>
    </footer>

</body>
</html>
