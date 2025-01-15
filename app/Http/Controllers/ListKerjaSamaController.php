<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerjasama;


class ListKerjaSamaController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $kerjasama = [
            ['name' => 'TVRI ACEH', 'detail' => '25 Program Acara | 75% Slot Terpakai | 20 Januari 2025 Transaksi Terakhir'],
            ['name' => 'TVRI SUMATRA UTARA', 'detail' => '25 Program Acara | 75% Slot Terpakai | 20 Januari 2025 Transaksi Terakhir'],
            ['name' => 'TVRI SUMATRA SELATAN', 'detail' => '25 Program Acara | 75% Slot Terpakai | 20 Januari 2025 Transaksi Terakhir'],
            ['name' => 'TVRI JAMBI', 'detail' => '25 Program Acara | 75% Slot Terpakai | 20 Januari 2025 Transaksi Terakhir'],
            ['name' => 'TVRI RIAU', 'detail' => '25 Program Acara | 75% Slot Terpakai | 20 Januari 2025 Transaksi Terakhir'],
            ['name' => 'TVRI BENGKULU', 'detail' => '25 Program Acara | 75% Slot Terpakai | 20 Januari 2025 Transaksi Terakhir'],
            ['name' => 'TVRI BANGKA BELITUNG', 'detail' => '25 Program Acara | 75% Slot Terpakai | 20 Januari 2025 Transaksi Terakhir'],
            ['name' => 'TVRI KEPULAUAN RIAU', 'detail' => '25 Program Acara | 75% Slot Terpakai | 20 Januari 2025 Transaksi Terakhir'],
            ['name' => 'TVRI LAMPUNG', 'detail' => '25 Program Acara | 75% Slot Terpakai | 20 Januari 2025 Transaksi Terakhir'],
        ];

        return view('list_kerjasama.index', compact('kerjasama'));
    }
}
=======

    
}
>>>>>>> 4f61ef77fe9c4425c137246efc7d0c931ff3d82c
