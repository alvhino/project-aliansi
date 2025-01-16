<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriAcara;


class KategoriAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $entries = $request->get('entries', 10);
        $search = $request->get('search', '');
    
        $categories = KategoriAcara::where('nama_kategori', 'like', "%$search%")
            ->paginate($entries);
    
        return view('kategori_acara.index', compact('categories', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);
        
        // Menyimpan kategori baru
        $kategori = new KategoriAcara();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->status = $request->status;
        $kategori->save();
    
        // Mengalihkan kembali ke halaman index kategori dengan pesan sukses
        return redirect('kategori-acara');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kategori_id)
    {
        $kategori = KategoriAcara::findOrFail($kategori_id);

        return view('kategori_acara.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kategori_id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Update data kategori
        $kategori = KategoriAcara::findOrFail($kategori_id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->status = $request->status;
        $kategori->save();

        return redirect('kategori-acara')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kategori_id)
    {
        $kategori = KategoriAcara::findOrFail($kategori_id);
        $kategori->delete();

        return redirect('kategori-acara')->with('success', 'Kategori berhasil dihapus.');
    }
}