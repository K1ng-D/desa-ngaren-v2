<?php

// database/seeders/SejarahSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SejarahSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sejarahs')->insert([
            [
                'tanggal' => '2024-12-29',
                'foto' => 'example1.jpg',
                'deskripsi' => 'Sejarah pertama desa ini.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tanggal' => '2023-12-29',
                'foto' => 'example2.jpg',
                'deskripsi' => 'Sejarah kedua desa ini.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


