<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\DiagramAparatur;

class DiagramAparaturController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string',
        ]);
    
        // Simpan file foto
        $filename = $request->file('foto')->store('photos', 'public');
        
        // Tambahkan path file foto ke data yang akan disimpan
        $validated['foto'] = $filename;
    
        // Simpan data ke database dengan mass assignment
        DiagramAparatur::create([
            'judul' => $validated['judul'],
            'foto' => $validated['foto'],
            'deskripsi' => $validated['deskripsi']
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.aparatur.index')->with('success', 'Diagram aparatur berhasil disimpan.');
    }
    
    public function edit($id)
    {
        // Ambil data diagram aparatur berdasarkan ID
        $diagram = DiagramAparatur::find($id);
        
        // Pastikan diagram ditemukan, jika tidak redirect ke daftar
        if (!$diagram) {
            return redirect()->route('admin.aparatur.index')->with('error', 'Data tidak ditemukan.');
        }

        // Kirim data ke view untuk diedit
        return view('admin.aparatur.diagram.edit', compact('diagram'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Cari diagram aparatur berdasarkan ID
        $diagram = DiagramAparatur::find($id);
        if (!$diagram) {
            return redirect()->route('admin.aparatur.index')->with('error', 'Data tidak ditemukan.');
        }
    
        // Update data
        $diagram->judul = $validated['judul'];
        $diagram->deskripsi = $validated['deskripsi'];
    
        // Jika ada foto yang diunggah, simpan foto baru
        if ($request->hasFile('foto')) {
            // Menghapus foto lama sebelum menyimpan foto baru
            if ($diagram->foto) {
                Storage::delete('public/' . $diagram->foto);
            }
            $fotoPath = $request->file('foto')->store('photos', 'public');
            $diagram->foto = $fotoPath;
        }
    
        // Simpan perubahan
        $diagram->save();
    
        // Redirect dengan pesan sukses
        return redirect()->route('admin.aparatur.index')->with('success', 'Diagram Aparatur berhasil diperbarui.');
    }
    

}
