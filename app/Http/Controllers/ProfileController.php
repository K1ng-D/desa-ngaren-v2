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
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index()
    {
        try {
            // Retrieve data from database
            $sejarah = Sejarah::all();
            $geografis = Geografis::all();
            $keuangans = KeuanganDesa::all();
            $beritas = Berita::orderBy('tanggal', 'desc')->paginate(10);
            $umkms = UMKM::all();
            $wisatas = Wisata::all();
            $aparatur = Aparatur::all();
            $diagram = DiagramAparatur::first();

            // Return view with data
            return view('profil', compact('sejarah', 'geografis', 'beritas', 'keuangans', 'umkms', 'wisatas', 'aparatur', 'diagram'));
        } catch (\Exception $e) {
            Log::error('Database error: ' . $e->getMessage());
            return abort(500, 'Internal Server Error. Please check your database connection.');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->hasFile('image') ? $request->file('image')->store('profiles', 'public') : null;

        Profile::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image' => $path,
        ]);

        return redirect()->route('profiles.index')->with('success', 'Profile created successfully.');
    }

    public function update(Request $request, Profile $profile)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('profiles', 'public');
            $profile->update(['image' => $path]);
        }

        $profile->update($validated);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully.');
    }
}
