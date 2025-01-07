<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriAcaraController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('template.index');
});

Route::get('/kategori-acara', [KategoriAcaraController::class, 'index']);
Route::post('/kategori-acara/add', [KategoriAcaraController::class, 'store']);
Route::get('/kategori-acara/edit/{kategori_id}', [KategoriAcaraController::class, 'edit']);
Route::post('/kategori-acara/update/{kategori_id}', [KategoriAcaraController::class, 'update']);
Route::get('/kategori-acara/delete/{kategori_id}', [KategoriAcaraController::class, 'destroy']);