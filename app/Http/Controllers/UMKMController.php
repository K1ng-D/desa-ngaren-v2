<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UMKMController extends Controller
{
    public function index()
    {
        $umkms = UMKM::all();
        return view('admin.umkm.index', compact('umkms'));
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    // In UMKMController.php
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'nama_usaha' => 'required',
            'pemilik' => 'required',
            'kategori' => 'required',
            'lokasi' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image',
        ]);

        // Handle file upload if there is a foto
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('umkm_photos', 'public');
        } else {
            $fotoPath = null;
        }

        // Create the new UMKM
        UMKM::create([
            'nama_usaha' => $validated['nama_usaha'],
            'pemilik' => $validated['pemilik'],
            'kategori' => $validated['kategori'],
            'lokasi' => $validated['lokasi'],
            'kontak' => $validated['kontak'],
            'deskripsi' => $validated['deskripsi'],
            'foto' => $fotoPath,
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil ditambahkan!');
    }

        public function edit($id)
    {
        $umkm = UMKM::findOrFail($id);
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, $id)
    {
        $umkm = UMKM::findOrFail($id);
    
        $data = $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('umkm', 'public');
        }
    
        $umkm->update($data);
    
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil diupdate.');
    }
    

    public function destroy(UMKM $umkm)
    {
        if ($umkm->foto) {
            Storage::disk('public')->delete($umkm->foto);
        }
    
        $umkm->delete();
    
        return redirect()->route('admin.umkm.index')->with('success', 'UMKM berhasil dihapus!');
    }
    
}
