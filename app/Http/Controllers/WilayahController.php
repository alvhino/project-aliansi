<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    // Method untuk menampilkan halaman wilayah
    public function index()
    {
        $wilayahs = Wilayah::paginate(10); // Pagination, sesuaikan jumlah data per halaman
        return view('wilayah.index', compact('wilayahs'));
    }

    // Method untuk menambah data wilayah
    public function store(Request $request)
    {
        $request->validate([
            'nama_wilayah' => 'required|string|max:255',
        ]);

        Wilayah::create([
            'nama_wilayah' => $request->nama_wilayah,
        ]);

        return redirect()->back()->with('success', 'Wilayah berhasil ditambahkan.');
    }

    // Method untuk memperbarui data wilayah
    public function update(Request $request, $wilayah_id)
    {
        $request->validate([
            'nama_wilayah' => 'required|string|max:255',
        ]);
    
        // Update data wilayah
        $wilayah = Wilayah::findOrFail($wilayah_id);
        $wilayah->nama_wilayah = $request->nama_wilayah;
        $wilayah->save();
    
        return redirect('wilayah')->with('success', 'Wilayah berhasil diperbarui.');
    }
    

    // Method untuk menghapus data wilayah
    public function destroy($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->delete();

        return redirect()->back()->with('success', 'Wilayah berhasil dihapus.');
    }
}