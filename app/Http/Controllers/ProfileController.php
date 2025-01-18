<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use App\Models\Profile;
use App\Models\Geografis;
use App\Models\Berita;
use App\Models\KeuanganDesa;
use App\Models\UMKM;
use App\Models\Wisata;
use App\Models\Aparatur;
use App\Models\DiagramAparatur;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        try {
            // Ambil data dari database
            $sejarah = Sejarah::all();
            $geografis = Geografis::all();
            $keuangans = KeuanganDesa::all();
            $beritas = Berita::orderBy('tanggal', 'desc')->paginate(10);
            $umkms = UMKM::all();
            $wisatas = Wisata::all();
            $aparatur = Aparatur::all();
            $diagram = DiagramAparatur::first();

            // Kirim data ke view
            return view('profil', compact('sejarah', 'geografis', 'beritas', 'keuangans', 'umkms', 'wisatas', 'aparatur', 'diagram'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses penyimpanan gambar jika ada
        $path = $request->hasFile('image')
            ? $request->file('image')->store('profiles', 'public')
            : null;

        // Buat data baru
        Profile::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => $path,
        ]);

        return redirect()->route('profiles.index')->with('success', 'Profile berhasil dibuat.');
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Jika ada file baru, simpan dan update
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profiles', 'public');
            $profile->update(['image' => $path]);
        }

        // Update data yang lain
        $profile->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('profiles.index')->with('success', 'Profile berhasil diperbarui.');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profile berhasil dihapus.');
    }
}
