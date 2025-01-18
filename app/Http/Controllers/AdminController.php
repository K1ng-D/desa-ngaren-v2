<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Sejarah;
use App\Models\UMKM;
use App\Models\KeuanganDesa;
use App\Models\Geografis;
use App\Models\Aparatur;

class AdminController extends Controller
{
    public function index()
    {
        $beritas = Berita::count();
        $sejarahs = Sejarah::count();
        $umkms = UMKM::count();
        $keuangans = KeuanganDesa::count();
        $geografis = Geografis::count();

        // $aparatur = Aparatur::count();

        return view('admin.dashboard', compact('beritas', 'sejarahs', 'umkms', 'keuangans', 'geografis', 'aparatur'));
    }
}
