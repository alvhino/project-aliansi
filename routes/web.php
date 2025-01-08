<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriAcaraController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UmpanBalikController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\WilayahStasiunController;
use App\Http\Controllers\ListKerjaSamaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ApprovalKerjaSamaController;

Route::get('/', function () {
    return view('template.index');
});


// Routes untuk Kategori Acara
Route::get('/kategori-acara', [KategoriAcaraController::class, 'index']);
Route::post('/kategori-acara/add', [KategoriAcaraController::class, 'store']);
Route::get('/kategori-acara/edit/{kategori_id}', [KategoriAcaraController::class, 'edit']);
Route::post('/kategori-acara/update/{kategori_id}', [KategoriAcaraController::class, 'update']);
Route::get('/kategori-acara/delete/{kategori_id}', [KategoriAcaraController::class, 'destroy']);

// Routes untuk Feedback
Route::get('/feedback', [FeedbackController::class, 'index']);
Route::post('/feedback/add', [FeedbackController::class, 'store']);
Route::get('/feedback/edit/{feedback_id}', [FeedbackController::class, 'edit']);
Route::post('/feedback/update/{feedback_id}', [FeedbackController::class, 'update']);
Route::get('/feedback/delete/{feedback_id}', [FeedbackController::class, 'destroy']);

// Routes untuk Umpan Balik
Route::get('/umpan-balik', [UmpanBalikController::class, 'index']);
Route::post('/umpan-balik/add', [UmpanBalikController::class, 'store']);
Route::get('/umpan-balik/edit/{umpan_balik_id}', [UmpanBalikController::class, 'edit']);
Route::post('/umpan-balik/update/{umpan_balik_id}', [UmpanBalikController::class, 'update']);
Route::get('/umpan-balik/delete/{umpan_balik_id}', [UmpanBalikController::class, 'destroy']);

// Routes untuk Hak Akses
Route::get('/hak-akses', [HakAksesController::class, 'index']);
Route::post('/hak-akses/add', [HakAksesController::class, 'store']);
Route::get('/hak-akses/edit/{hak_akses_id}', [HakAksesController::class, 'edit']);
Route::post('/hak-akses/update/{hak_akses_id}', [HakAksesController::class, 'update']);
Route::get('/hak-akses/delete/{hak_akses_id}', [HakAksesController::class, 'destroy']);

// Routes untuk Wilayah Stasiun
Route::get('/wilayah', [WilayahController::class, 'index']);
Route::post('/wilayah/add', [WilayahController::class, 'store']);
Route::get('/wilayah/edit/{wilayah_id}', [WilayahController::class, 'edit']);
Route::post('/wilayah/update/{wilayah_id}', [WilayahController::class, 'update']);
Route::get('/wilayah/delete/{wilayah_id}', [WilayahController::class, 'destroy']);

Route::get('/stasiun', [StasiunController::class, 'index']);
Route::post('/stasiun/add', [StasiunController::class, 'store']);
Route::get('/stasiun/edit/{stasiun_id}', [StasiunController::class, 'edit']);
Route::post('/stasiun/update/{stasiun_id}', [StasiunController::class, 'update']);
Route::get('/stasiun/delete/{stasiun_id}', [StasiunController::class, 'destroy']);

// Routes untuk List Kerja Sama
Route::get('/list-kerja-sama', [ListKerjaSamaController::class, 'index']);
Route::post('/list-kerja-sama/add', [ListKerjaSamaController::class, 'store']);
Route::get('/list-kerja-sama/edit/{list_kerja_sama_id}', [ListKerjaSamaController::class, 'edit']);
Route::post('/list-kerja-sama/update/{list_kerja_sama_id}', [ListKerjaSamaController::class, 'update']);
Route::get('/list-kerja-sama/delete/{list_kerja_sama_id}', [ListKerjaSamaController::class, 'destroy']);

// Routes untuk Riwayat
Route::get('/riwayat', [RiwayatController::class, 'index']);
Route::post('/riwayat/add', [RiwayatController::class, 'store']);
Route::get('/riwayat/edit/{riwayat_id}', [RiwayatController::class, 'edit']);
Route::post('/riwayat/update/{riwayat_id}', [RiwayatController::class, 'update']);
Route::get('/riwayat/delete/{riwayat_id}', [RiwayatController::class, 'destroy']);

// Routes untuk Pengguna
Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::post('/pengguna/add', [PenggunaController::class, 'store']);
Route::get('/pengguna/edit/{pengguna_id}', [PenggunaController::class, 'edit']);
Route::post('/pengguna/update/{pengguna_id}', [PenggunaController::class, 'update']);
Route::get('/pengguna/delete/{pengguna_id}', [PenggunaController::class, 'destroy']);

// Routes untuk Approval Kerja Sama
Route::get('/approval-kerja-sama', [ApprovalKerjaSamaController::class, 'index']);
Route::post('/approval-kerja-sama/add', [ApprovalKerjaSamaController::class, 'store']);
Route::get('/approval-kerja-sama/edit/{approval_kerja_sama_id}', [ApprovalKerjaSamaController::class, 'edit']);
Route::post('/approval-kerja-sama/update/{approval_kerja_sama_id}', [ApprovalKerjaSamaController::class, 'update']);
Route::get('/approval-kerja-sama/delete/{approval_kerja_sama_id}', [ApprovalKerjaSamaController::class, 'destroy']);
