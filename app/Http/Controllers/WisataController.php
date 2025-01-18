<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $wisatas = Wisata::all();
        return view('admin.wisata.index', compact('wisatas'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'required|string|max:255',
            'jenis_wisata' => 'nullable|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'rating' => 'nullable|numeric|min:0|max:5',
            'link_peta' => 'nullable|string|max:255',
            'jam_operasional' => 'nullable|string|max:100',
            'fasilitas' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = $request->hasFile('foto') 
            ? $request->file('foto')->store('wisata', 'public') 
            : null;

        Wisata::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'jenis_wisata' => $request->jenis_wisata,
            'kontak' => $request->kontak,
            'rating' => $request->rating,
            'link_peta' => $request->link_peta,
            'jam_operasional' => $request->jam_operasional,
            'fasilitas' => $request->fasilitas,
            'foto' => $fotoPath,
        ]);
        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil ditambahkan!');
    }


    public function edit(Wisata $wisata)
    {
        return view('admin.wisata.edit', compact('wisata'));
    }

    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'lokasi' => 'required|string|max:255',
            'jenis_wisata' => 'nullable|string|max:100',
            'kontak' => 'nullable|string|max:50',
            'rating' => 'nullable|numeric|min:0|max:5',
            'link_peta' => 'nullable|string|max:255',
            'jam_operasional' => 'nullable|string|max:100',
            'fasilitas' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($request->hasFile('foto')) {
            if ($wisata->foto && Storage::exists('public/' . $wisata->foto)) {
                Storage::delete('public/' . $wisata->foto);
            }
    
            $wisata->foto = $request->file('foto')->store('wisata', 'public');
        }
    
        $wisata->update($request->only([
            'nama',
            'deskripsi',
            'lokasi',
            'jenis_wisata',
            'kontak',
            'rating',
            'link_peta',
            'jam_operasional',
            'fasilitas',
        ]));
    
        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil diperbarui!');
    }
    

    public function destroy(Wisata $wisata)
    {
        if ($wisata->foto && Storage::exists('public/' . $wisata->foto)) {
            Storage::delete('public/' . $wisata->foto);
        }

        $wisata->delete();

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil dihapus!');
    }
}
