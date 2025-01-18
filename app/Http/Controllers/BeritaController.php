<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'foto' => 'nullable|image',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $path = $request->file('foto') ? $request->file('foto')->store('uploads', 'public') : null;

        Berita::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'foto' => $path,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id); // Pastikan berita ditemukan
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id); // Pastikan data ada
    
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'kategori' => 'required|string',
            'tanggal' => 'required|date',
        ]);
    
        if ($request->hasFile('foto')) {
            // Hapus file lama jika ada
            if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                Storage::disk('public')->delete($berita->foto);
            }
            $berita->foto = $request->file('foto')->store('uploads', 'public');
        }
    
        // Update data
        $berita->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);
    
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate!');
    }
    


    public function destroy(Berita $berita)
    {
        if ($berita->foto) {
            // Gunakan Storage facade untuk menghapus file
            Storage::disk('public')->delete($berita->foto);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}