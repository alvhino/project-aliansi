<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KerjaSamaDaerahController extends Controller
{
    public function index()
    {
        $data = [
            ['name' => 'TVRI ACEH', 'kerjasama' => 25, 'program' => 30],
            ['name' => 'TVRI SUMATRA UTARA', 'kerjasama' => 25, 'program' => 30],
            ['name' => 'TVRI SUMATRA SELATAN', 'kerjasama' => 25, 'program' => 30],
            ['name' => 'TVRI JAMBI', 'kerjasama' => 25, 'program' => 30],
            ['name' => 'TVRI RIAU', 'kerjasama' => 25, 'program' => 30],
            ['name' => 'TVRI BENGKULU', 'kerjasama' => 25, 'program' => 30],
            ['name' => 'TVRI BANGKA BELITUNG', 'kerjasama' => 25, 'program' => 30],
            ['name' => 'TVRI KEPULAUAN RIAU', 'kerjasama' => 25, 'program' => 30],
            ['name' => 'TVRI LAMPUNG', 'kerjasama' => 25, 'program' => 30],
        ];

        return view('kerjasama_daerah.index', compact('data'));
    }
}