<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeuanganDesa;
use Illuminate\Support\Facades\Storage;

class KeuanganDesaController extends Controller
{
    public function index()
    {
        $keuangans = KeuanganDesa::all();
        return view('admin.keuangan.index', compact('keuangans'));
    }

    public function create()
    {
        return view('admin.keuangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
        ]);
    
        $fotoPath = null;
    
        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads/keuangan', 'public');
        }
    
        KeuanganDesa::create([
            'kategori' => $request->kategori,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'foto' => $fotoPath,
        ]);
    
        return redirect()->route('admin.keuangan.index')->with('success', 'Data keuangan berhasil ditambahkan!');
    }
    

    public function edit($id)
    {
        $keuangan = KeuanganDesa::find($id);

        if (!$keuangan) {
            return redirect()->route('admin.keuangan.index')->with('error', 'Data keuangan tidak ditemukan.');
        }

        return view('admin.keuangan.edit', compact('keuangan'));
    }


    public function update(Request $request, KeuanganDesa $keuangan)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'jumlah' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Update data keuangan
        $keuangan->kategori = $request->kategori;
        $keuangan->jumlah = $request->jumlah;
        $keuangan->deskripsi = $request->deskripsi;
        $keuangan->tanggal = $request->tanggal;
    
        // Proses unggah foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($keuangan->foto && file_exists(storage_path('app/public/' . $keuangan->foto))) {
                unlink(storage_path('app/public/' . $keuangan->foto));
            }
    
            // Simpan foto baru
            $path = $request->file('foto')->store('keuangan', 'public');
            $keuangan->foto = $path;
        }
    
        $keuangan->save();
    
        return redirect()->route('admin.keuangan.index')->with('success', 'Data keuangan berhasil diperbarui.');
    }
    


    public function destroy(KeuanganDesa $keuangan)
    {
        // Hapus foto dari storage jika ada
        if ($keuangan->foto && Storage::exists('public/' . $keuangan->foto)) {
            Storage::delete('public/' . $keuangan->foto);
        }
    
        // Hapus data keuangan
        $keuangan->delete();
    
        return redirect()->route('admin.keuangan.index')->with('success', 'Data keuangan berhasil dihapus!');
    }
    
}
