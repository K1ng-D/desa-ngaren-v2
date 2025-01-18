<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Geografis;
use Illuminate\Support\Facades\Storage;

class GeografisController extends Controller
{
    public function index()
    {
        $geografis = Geografis::all();
        return view('admin.geografis.index', compact('geografis'));
    }

    public function create()
    {
        return view('admin.geografis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'foto' => 'required|image',
            'deskripsi' => 'required|string',
        ]);

        $path = $request->file('foto')->store('geografis', 'public');

        Geografis::create([
            'tanggal' => $request->tanggal,
            'foto' => $path,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.geografis.index')->with('success', 'Geografis berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $geografis = Geografis::findOrFail($id);
        return view('admin.geografis.edit', compact('geografis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'foto' => 'nullable|image',
            'deskripsi' => 'required|string',
        ]);

        $geografis = Geografis::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($geografis->foto && Storage::disk('public')->exists($geografis->foto)) {
                Storage::disk('public')->delete($geografis->foto);
            }
            $path = $request->file('foto')->store('geografis', 'public');
            $geografis->foto = $path;
        }

        $geografis->tanggal = $request->tanggal;
        $geografis->deskripsi = $request->deskripsi;
        $geografis->save();

        return redirect()->route('admin.geografis.index')->with('success', 'Geografis berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $geografis = Geografis::findOrFail($id);

        if ($geografis->foto && Storage::disk('public')->exists($geografis->foto)) {
            Storage::disk('public')->delete($geografis->foto);
        }

        $geografis->delete();

        return redirect()->route('admin.geografis.index')->with('success', 'Geografis berhasil dihapus.');
    }
}
