<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('keuangan_desas', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->decimal('jumlah', 15, 2);
            $table->text('deskripsi')->nullable();
            $table->date('tanggal');
            $table->string('foto')->nullable(); // Tambahkan kolom foto di sini
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('keuangan_desas');
    }

};
