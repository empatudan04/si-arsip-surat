<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/arsip', [SuratController::class, 'index'])->name('arsip');
Route::get('/unggahArsip', function () {
    return view('unggahArsip');
})->name('unggahArsip');
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/unggah-arsip', [SuratController::class, 'create'])->name('unggah-arsip');
Route::post('/unggah-arsip', [SuratController::class, 'store'])->name('arsip.create');
Route::get('/tambahKategori', [KategoriController::class, 'create'])->name('tambah-kategori');
Route::post('/tambahKategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/kategori/hapus/{kategori}',[KategoriController::class,'destroy'])->name('kategori.destroy');
Route::get('/kategori/edit/{kategori}',[KategoriController::class,'edit'])->name('kategori.edit');
Route::post('/kategori/update/{kategori}',[KategoriController::class,'update'])->name('kategori.update');
Route::get('/lihat-arsip/{id}', [SuratController::class, 'show'])->name('lihat-arsip');
Route::get('/unduh-arsip/{id}', [SuratController::class, 'unduhArsip'])->name('unduh-arsip');
Route::get('/hapus-surat/{id}', [SuratController::class, 'destroy'])->name('hapus-surat');
