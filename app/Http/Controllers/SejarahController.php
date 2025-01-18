<?php
// app/Http/Controllers/SejarahController.php
namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::all();
        return view('admin.sejarah.index', compact('sejarah'));
    }

    public function create()
    {
        return view('admin.sejarah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'required',
        ]);

        $fotoPath = $request->file('foto')->store('images', 'public');

        Sejarah::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'foto' => $fotoPath,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.sejarah.index');
    }

    public function edit($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        return view('admin.sejarah.edit', compact('sejarah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif',
            'deskripsi' => 'required',
        ]);

        $sejarah = Sejarah::findOrFail($id);
        $sejarah->judul = $request->judul;
        $sejarah->tanggal = $request->tanggal;
        $sejarah->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('images', 'public');
            $sejarah->foto = $fotoPath;
        }

        $sejarah->save();

        return redirect()->route('admin.sejarah.index');
    }

    public function destroy($id)
    {
        $sejarah = Sejarah::findOrFail($id);
        $sejarah->delete();
        return redirect()->route('admin.sejarah.index');
    }
}

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class SejarahController extends Controller
// {
//     //
// }
