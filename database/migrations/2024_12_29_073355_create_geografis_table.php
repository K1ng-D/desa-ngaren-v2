<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_geografis_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeografisTable extends Migration
{
    public function up()
    {
        Schema::create('geografis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('foto');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('geografis');
    }
}
