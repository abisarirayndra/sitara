<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\Siswa\SiswaController::class, 'kelas'])->name('kelas');
Route::get('/daftar_nama', [App\Http\Controllers\Siswa\SiswaController::class, 'daftar_nama'])->name('daftar_nama');
Route::get('/daftar_prestasi/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'daftar_prestasi'])->name('daftar_prestasi');
Route::get('/form_prestasi/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'form_prestasi'])->name('form_prestasi');
Route::post('/upload_prestasi', [App\Http\Controllers\Siswa\SiswaController::class, 'upload_prestasi'])->name('upload_prestasi');
Route::get('/edit_prestasi/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'edit_prestasi'])->name('edit_prestasi');
Route::get('/hapus_prestasi/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'hapus_prestasi'])->name('hapus_prestasi');
Route::post('/update_prestasi/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'update_prestasi'])->name('update_prestasi');
Route::get('/hapus_file/{id}', [App\Http\Controllers\Siswa\SiswaController::class, 'hapus_file'])->name('hapus_file');

Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
Route::post('/register/upload', [App\Http\Controllers\AuthController::class, 'upload_register'])->name('register.upload');
Route::post('/login/upload', [App\Http\Controllers\AuthController::class, 'upload_login'])->name('login.upload');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin','middleware' => ['auth','admin-role']], function(){
    Route::get('/daftar_nama', [App\Http\Controllers\AdminController::class, 'daftar_nama'])->name('admin.daftar_nama');
Route::get('/daftar_prestasi/{id}', [App\Http\Controllers\AdminController::class, 'daftar_prestasi'])->name('admin.daftar_prestasi');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/form_prestasi/{id}', [App\Http\Controllers\AdminController::class, 'form_prestasi'])->name('admin.form_prestasi');
Route::post('/upload_prestasi', [App\Http\Controllers\AdminController::class, 'upload_prestasi'])->name('admin.upload_prestasi');
Route::get('/edit_prestasi/{id}', [App\Http\Controllers\AdminController::class, 'edit_prestasi'])->name('admin.edit_prestasi');
Route::get('/hapus_prestasi/{id}', [App\Http\Controllers\AdminController::class, 'hapus_prestasi'])->name('admin.hapus_prestasi');
Route::post('/update_prestasi/{id}', [App\Http\Controllers\AdminController::class, 'update_prestasi'])->name('admin.update_prestasi');
Route::get('/hapus_file/{id}', [App\Http\Controllers\AdminController::class, 'hapus_file'])->name('admin.hapus_file');
Route::get('/kelas', [App\Http\Controllers\AdminController::class, 'kelas'])->name('admin.kelas');
Route::get('/lihat_prestasi/{id}', [App\Http\Controllers\AdminController::class, 'lihat_prestasi'])->name('admin.lihat_prestasi');
Route::get('/lampiran', [App\Http\Controllers\AdminController::class, 'lampiran_prestasi'])->name('admin.lampiran_prestasi');
Route::get('/download_lampiran', [App\Http\Controllers\AdminController::class, 'download_files_zip'])->name('admin.download_files_zip');
});

