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
            // Retrieve all Sejarah, Geografis, and Berita records from the database
            $sejarah = Sejarah::all();
            $geografis = Geografis::all();
            $keuangans = KeuanganDesa::all();
            $beritas = Berita::orderBy('tanggal', 'desc')->get(); // Ambil data berita terbaru
            $umkms = UMKM::all();
            $wisatas = Wisata::all();
            $aparatur = Aparatur::all();
            $diagram = DiagramAparatur::first();

            $beritas = Berita::orderBy('tanggal', 'desc')->paginate(10);
            // Pass all data to the view
            return view('profil', compact('sejarah', 'geografis', 'beritas', 'keuangans', 'umkms', 'wisatas', 'aparatur', 'diagram'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('image')?->store('profiles', 'public');

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

        $profile->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);

        return redirect()->route('profiles.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profile deleted successfully.');
    }

}
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ProfileController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }
// }
