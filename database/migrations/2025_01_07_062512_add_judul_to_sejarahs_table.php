<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJudulToSejarahsTable extends Migration
{
    public function up()
    {
        Schema::table('sejarahs', function (Blueprint $table) {
            $table->string('judul')->nullable(); // Tambahkan kolom judul
        });
    }

    public function down()
    {
        Schema::table('sejarahs', function (Blueprint $table) {
            $table->dropColumn('judul');
        });
    }
}

