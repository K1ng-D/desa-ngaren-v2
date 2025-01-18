<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'lokasi',
        'jenis_wisata',
        'kontak',
        'rating',
        'link_peta',
        'jam_operasional',
        'fasilitas',
        'foto',
    ];
    
}
