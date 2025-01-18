<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganDesa extends Model

{
    use HasFactory;
    // protected $primaryKey = 'id'; // Pastikan ini sesuai
    
    protected $fillable = ['kategori', 'jumlah', 'deskripsi', 'tanggal', 'foto'];

}
