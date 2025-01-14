<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerjasama;


class ApprovalKerjaSamaController extends Controller
{
    public function index()
    {
        $data = kerjasama ::all();
        return view('approval_kerjasama.index', compact('data'));
    }

    public function show($id)
    {
        $data =Kerjasama ::findOrFail($id);
        return response()->json([
            'no_tiket' => $data->no_tiket,
            'nama_pemesan' => $data->nama_pemesan,
            'stasiun_tv' => $data->stasiun_tv,
            'kerjasama' => $data->kerjasama,
            'durasi' => $data->durasi,
            'dipesan' => $data->created_at->format('H:i:s d M Y'),
            'deskripsi' => $data->deskripsi,
            'tarif' => number_format($data->tarif, 0, ',', '.'),
            'total_tayang' => $data->total_tayang,
            'biaya_total' => number_format($data->biaya_total, 0, ',', '.'),
        ]);
    }

    public function edit($id)
{
    $data = Kerjasama::findOrFail($id);
    return view('approval-kerja-sama.edit', compact('data'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_pemesan' => 'required|string|max:255',
        'stasiun_tv' => 'required|string|max:255',
        'kerjasama' => 'required|string|max:255',
        'durasi' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tarif' => 'required|numeric|min:0',
        'total_tayang' => 'required|integer|min:0',
    ]);

    $data =Kerjasama ::findOrFail($id);
    $data->update([
        'nama_pemesan' => $request->nama_pemesan,
        'stasiun_tv' => $request->stasiun_tv,
        'kerjasama' => $request->kerjasama,
        'durasi' => $request->durasi,
        'deskripsi' => $request->deskripsi,
        'tarif' => $request->tarif,
        'total_tayang' => $request->total_tayang,
        'biaya_total' => $request->tarif * $request->total_tayang,
    ]);

    return redirect('/approval-kerja-sama')->with('success', 'Data berhasil diperbarui.');
}

public function store(Request $request)
{
    

    $request->validate([
        'no_tiket' => 'required|string|unique:approval_kerja_samas,no_tiket',
        'nama_pemesan' => 'required|string|max:255',
        'stasiun_tv' => 'required|string|max:255',
        'kerjasama' => 'required|string|max:255',
        'durasi' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tarif' => 'required|numeric|min:0',
        'total_tayang' => 'required|integer|min:0',
    ]);

    Kerjasama::create([
        'no_tiket' => $request->no_tiket,
        'nama_pemesan' => $request->nama_pemesan,
        'stasiun_tv' => $request->stasiun_tv,
        'kerjasama' => $request->kerjasama,
        'durasi' => $request->durasi,
        'deskripsi' => $request->deskripsi,
        'tarif' => $request->tarif,
        'total_tayang' => $request->total_tayang,
        'biaya_total' => $request->tarif * $request->total_tayang,
        'status' => 'Tertunda', // Status default
        'dipesan' => now(), // Waktu default
    ]);

    return redirect('/approval-kerja-sama')->with('success', 'Data berhasil ditambahkan.');
}

}
