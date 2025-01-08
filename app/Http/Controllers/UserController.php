<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index(Request $request)
    {
        $entries = $request->get('entries', 10); // Default 10 entri per halaman
        $search = $request->get('search');

        $users = User::with('role') // Load relasi role
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%$search%")
                      ->orWhere('username', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");
            })
            ->paginate($entries);

        $roles = Role::all(); // Ambil semua role

        return view('user.index', compact('users', 'roles'));
    }

    // Menambah pengguna baru
    public function store(Request $request) 
    { 
    
        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $fileName = time() . '_' . $file->getClientOriginalName();
    
            // Pastikan direktori ada
            if (!file_exists(public_path('foto_profile'))) {
                mkdir(public_path('foto_profile'), 0777, true);
            }
    
            // Simpan file ke public/foto_profile
            $file->move(public_path('foto_profile'), $fileName);
    
            // Simpan path relatif ke database
            $fotoProfilePath = 'foto_profile/' . $fileName;
        }
    
        User::create([ 
            'nama' => $request->nama, 
            'username' => $request->username, 
            'email' => $request->email, 
            'telepon' => $request->telepon, 
            'foto_profile' => $fotoProfilePath, 
            'role_id' => $request->role_id, 
            'status' => $request->status, 
        ]);
    
        return redirect()->back()->with('success', 'Pengguna berhasil ditambahkan.'); 
    }
    

    // Update pengguna yang ada
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

       

        // Update foto_profile jika ada file baru
        if ($request->hasFile('foto_profile')) {
            // Hapus foto lama jika ada
            if ($user->foto_profile && Storage::disk('public')->exists($user->foto_profile)) {
                Storage::disk('public')->delete($user->foto_profile);
            }

            // Upload foto baru
            $fotoProfilePath = $request->file('foto_profile')->store('foto_profile', 'public');
        } else {
            $fotoProfilePath = $user->foto_profile; // Pertahankan foto lama
        }

        $user->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'foto_profile' => $fotoProfilePath,
            'role_id' => $request->role_id,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus foto_profile jika ada
        if ($user->foto_profile && Storage::disk('public')->exists($user->foto_profile)) {
            Storage::disk('public')->delete($user->foto_profile);
        }

        $user->delete();

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
