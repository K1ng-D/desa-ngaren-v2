<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('lokasi');
            $table->string('jenis_wisata')->nullable(); // Jenis wisata
            $table->string('kontak')->nullable(); // Kontak
            $table->decimal('rating', 2, 1)->nullable(); // Rating (e.g., 4.5)
            $table->string('link_peta')->nullable(); // Link Google Maps
            $table->string('jam_operasional')->nullable(); // Jam Operasional
            $table->text('fasilitas')->nullable(); // Fasilitas
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
}
