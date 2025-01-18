<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAparaturTable extends Migration
{
    public function up()
    {
        Schema::create('aparatur', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama');
            $table->string('posisi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aparatur');
    }
}
