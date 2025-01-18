<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmsTable extends Migration
{
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_usaha'); // Nama UMKM
            $table->string('pemilik'); // Nama Pemilik UMKM
            $table->string('kategori'); // Kategori Usaha (e.g., Makanan, Kerajinan)
            $table->string('lokasi'); // Alamat Lokasi UMKM
            $table->string('kontak'); // Nomor Kontak UMKM
            $table->text('deskripsi'); // Deskripsi UMKM
            $table->string('foto')->nullable(); // Gambar/Foto UMKM
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
}
