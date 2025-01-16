<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerjasama;

class KerjasamaNasionalController extends Controller
{
    public function index(Request $request)
    {
        $entries = $request->input('entries', 10);
        $search = $request->input('search', null);

        $query = Kerjasama::query();

        if ($search) {
            $query->where('nama_kerjasama', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
        }

        $kerjasamaNasional = $query->paginate($entries);

        return view('kerjasama_nasional.index', compact('kerjasamaNasional'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kerjasama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|boolean',
        ]);

        Kerjasama::create($validated);

        return redirect()->route('kerjasama-nasional.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kerjasama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $kerjasama = Kerjasama::findOrFail($id);
        $kerjasama->update($validated);

        return redirect()->route('kerjasama-nasional.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kerjasama = Kerjasama::findOrFail($id);
        $kerjasama->delete();

        return redirect()->route('kerjasama-nasional.index')->with('success', 'Data berhasil dihapus.');
    }
}

