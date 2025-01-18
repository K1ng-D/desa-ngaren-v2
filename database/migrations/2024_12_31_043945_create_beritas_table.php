<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritasTable extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Judul berita
            $table->text('konten'); // Konten berita
            $table->string('foto')->nullable(); // Foto berita
            $table->string('kategori'); // Kategori: "Informasi Terbaru" atau "Publikasi Kegiatan"
            $table->date('tanggal'); // Tanggal berita
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
}
