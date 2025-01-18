<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_diagram_aparaturs_table.php
    public function up()
    {
        Schema::create('diagram_aparaturs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('foto');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagram_aparaturs');
    }
};
