<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriAcaraController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\StasiunController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UmpanBalikController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\WilayahStasiunController;
use App\Http\Controllers\ListKerjaSamaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ApprovalKerjaSamaController;
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

// Kategori Acara
Route::get('/kategori-acara', [KategoriAcaraController::class, 'index']);
Route::post('/kategori-acara/add', [KategoriAcaraController::class, 'store']);
Route::get('/kategori-acara/edit/{kategori_id}', [KategoriAcaraController::class, 'edit']);
Route::post('/kategori-acara/update/{kategori_id}', [KategoriAcaraController::class, 'update']);
Route::get('/kategori-acara/delete/{kategori_id}', [KategoriAcaraController::class, 'destroy']);

// wilyah
Route::get('/wilayah', [WilayahController::class, 'index']);
Route::post('/wilayah/add', [WilayahController::class, 'store']);
Route::get('/wilayah/edit/{wilayah_id}', [WilayahController::class, 'edit']);
Route::post('/wilayah/update/{wilayah_id}', [WilayahController::class, 'update']);
Route::get('/wilayah/delete/{wilayah_id}', [WilayahController::class, 'destroy']);

// Feedback
Route::get('/feedback', [FeedbackController::class, 'index']);
Route::post('/feedback/add', [FeedbackController::class, 'store']);
Route::get('/feedback/edit/{feedback_id}', [FeedbackController::class, 'edit']);
Route::post('/feedback/update/{feedback_id}', [FeedbackController::class, 'update']);
Route::get('/feedback/delete/{feedback_id}', [FeedbackController::class, 'destroy']);

// Hak Akses
Route::get('/hak-akses', [HakAksesController::class, 'index']);
Route::post('/hak-akses/add', [HakAksesController::class, 'store']);
Route::get('/hak-akses/edit/{hak_akses_id}', [HakAksesController::class, 'edit']);
Route::post('/hak-akses/update/{hak_akses_id}', [HakAksesController::class, 'update']);
Route::get('/hak-akses/delete/{hak_akses_id}', [HakAksesController::class, 'destroy']);

// List Kerja Sama
Route::get('/list-kerja-sama', [ListKerjaSamaController::class, 'index']);
Route::post('/list-kerja-sama/add', [ListKerjaSamaController::class, 'store']);
Route::get('/list-kerja-sama/edit/{kerja_sama_id}', [ListKerjaSamaController::class, 'edit']);
Route::post('/list-kerja-sama/update/{kerja_sama_id}', [ListKerjaSamaController::class, 'update']);
Route::get('/list-kerja-sama/delete/{kerja_sama_id}', [ListKerjaSamaController::class, 'destroy']);

// Riwayat
Route::get('/riwayat', [RiwayatController::class, 'index']);
Route::post('/riwayat/add', [RiwayatController::class, 'store']);
Route::get('/riwayat/edit/{riwayat_id}', [RiwayatController::class, 'edit']);
Route::post('/riwayat/update/{riwayat_id}', [RiwayatController::class, 'update']);
Route::get('/riwayat/delete/{riwayat_id}', [RiwayatController::class, 'destroy']);

// Pengguna
Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::post('/pengguna/add', [PenggunaController::class, 'store']);
Route::get('/pengguna/edit/{pengguna_id}', [PenggunaController::class, 'edit']);
Route::post('/pengguna/update/{pengguna_id}', [PenggunaController::class, 'update']);
Route::get('/pengguna/delete/{pengguna_id}', [PenggunaController::class, 'destroy']);

// Approval Kerja Sama
Route::get('/approval-kerja-sama', [ApprovalKerjaSamaController::class, 'index']);
Route::post('/approval-kerja-sama/add', [ApprovalKerjaSamaController::class, 'store']);
Route::get('/approval-kerja-sama/edit/{approval_id}', [ApprovalKerjaSamaController::class, 'edit']);
Route::post('/approval-kerja-sama/update/{approval_id}', [ApprovalKerjaSamaController::class, 'update']);
Route::get('/approval-kerja-sama/delete/{approval_id}', [ApprovalKerjaSamaController::class, 'destroy']);



