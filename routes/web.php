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
