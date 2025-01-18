<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'DesaNgaren', // Nama admin
            'email' => 'admindesangaren@gmail.com', // Email admin
            'password' => Hash::make('overworld'), // Password admin
        ]);
    }
}
