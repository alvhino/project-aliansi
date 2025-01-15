<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    // Menampilkan daftar role
    public function index(Request $request)
    {
        $entries = $request->get('entries', 10); // Default 10 entries per halaman
        $search = $request->get('search', '');

        $roles = Role::when($search, function ($query, $search) {
                $query->where('nama_role', 'like', "%$search%")
                      ->orWhere('deskripsi', 'like', "%$search%");
            })
            ->paginate($entries);

        return view('role.index', compact('roles'));
    }

    // Menyimpan role baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_role' => 'required|string|max:255',
            'level' => 'required|integer',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        Role::create($validatedData);

        return redirect()->back()->with('success', 'Role berhasil ditambahkan.');
    }

    // Mengupdate data role
    public function update(Request $request, $role_id)
    {
        $validatedData = $request->validate([
            'nama_role' => 'required|string|max:255',
            'level' => 'required|integer',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $role = Role::findOrFail($role_id);
        $role->update($validatedData);

        return redirect()->back()->with('success', 'Role berhasil diperbarui.');
    }

    // Menghapus role
    public function destroy($role_id)
    {
        $role = Role::findOrFail($role_id);
        $role->delete();

        return redirect()->back()->with('success', 'Role berhasil dihapus.');
    }
}