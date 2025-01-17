<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriAcaraController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\UmpanBalikController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\WilayahStasiunController;
use App\Http\Controllers\ListKerjaSamaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApprovalKerjaSamaController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\StasiunController;
use App\Http\Controllers\KerjaSamaDaerahController;
use App\Http\Controllers\KerjasamaNasionalController;


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

// Routes untuk Hak Akses
Route::get('/role', [RoleController::class, 'index']);
Route::post('/role/add', [RoleController::class, 'store']);
Route::get('/role/edit/{role_id}', [RoleController::class, 'edit']);
Route::post('/role/update/{role_id}', [RoleController::class, 'update']);
Route::get('/role/delete/{role_id}', [RoleController::class, 'destroy']);

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
Route::get('/list-kerjasama', [ListKerjaSamaController::class, 'index']);
Route::post('/list-kerjasama/add', [ListKerjaSamaController::class, 'store']);
Route::get('/list-kerjasama/edit/{list_kerja_sama_id}', [ListKerjaSamaController::class, 'edit']);
Route::post('/list-kerjasama/update/{list_kerja_sama_id}', [ListKerjaSamaController::class, 'update']);
Route::get('/list-kerjasama/delete/{list_kerja_sama_id}', [ListKerjaSamaController::class, 'destroy']);

// Routes untuk Riwayat
Route::get('/riwayat', [RiwayatController::class, 'index']);
Route::post('/riwayat/add', [RiwayatController::class, 'store']);
Route::get('/riwayat/edit/{riwayat_id}', [RiwayatController::class, 'edit']);
Route::post('/riwayat/update/{riwayat_id}', [RiwayatController::class, 'update']);
Route::get('/riwayat/delete/{riwayat_id}', [RiwayatController::class, 'destroy']);

// Routes untuk Pengguna
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/add', [UserController::class, 'store']);
Route::get('/user/edit/{user_id}', [UserController::class, 'edit']);
Route::post('/user/update/{user_id}', [UserController::class, 'update']);
Route::get('/user/delete/{user_id}', [UserController::class, 'destroy']);

// Routes untuk Approval Kerja Sama
Route::get('/approval-kerja-sama', [ApprovalKerjaSamaController::class, 'index']);
Route::post('/approval-kerja-sama/add', [ApprovalKerjaSamaController::class, 'store']);
Route::get('/approval-kerja-sama/edit/{approval_kerja_sama_id}', [ApprovalKerjaSamaController::class, 'edit']);
Route::post('/approval-kerja-sama/update/{approval_kerja_sama_id}', [ApprovalKerjaSamaController::class, 'update']);
Route::get('/approval-kerja-sama/delete/{approval_kerja_sama_id}', [ApprovalKerjaSamaController::class, 'destroy']);

// Routes untuk Kerjasama Nasional
Route::get('/kerjasama-nasional', [KerjasamaNasionalController::class, 'index']);
Route::post('/kerjasama-nasional/add', [KerjasamaNasionalController::class, 'store']);
Route::post('/kerjasama-nasional/update/{id}', [KerjasamaNasionalController::class, 'update']);
Route::post('/kerjasama-nasional/delete/{id}', [KerjasamaNasionalController::class, 'destroy']);


// Routes untuk Kerjasama Daerah
Route::get('/kerja-sama-daerah', [KerjaSamaDaerahController::class, 'index']);
Route::post('/kerja-sama-daerah/add', [KerjaSamaDaerahController::class, 'store']);
Route::get('/kerja-sama-daerah/edit/{daerah_id}', [KerjaSamaDaerahController::class, 'edit']);
Route::post('/kerja-sama-daerah/update/{daerah_id}', [KerjaSamaDaerahController::class, 'update']);
Route::get('/kerja-sama-daerah/delete/{daerah_id}', [KerjaSamaDaerahController::class, 'destroy']);