<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;

    protected $table = 'umkms'; // Menentukan nama tabel secara eksplisit

    protected $fillable = [
        'nama_usaha',
        'pemilik',
        'kategori',
        'lokasi',
        'kontak',
        'deskripsi',
        'foto',
    ];
}
