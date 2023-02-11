<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminMitraController;
use App\Http\Controllers\Admin\AdminMobilController;
use App\Http\Controllers\Admin\AdminPengembalianController;
use App\Http\Controllers\Admin\AdminPesananController;
use App\Http\Controllers\Admin\AdminSedangPinjamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfilController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('mobil', [MobilController::class, 'index'])->name('mobil');
Route::get('mobil/{id}/detail', [MobilController::class, 'detail'])->name('detail');

Auth::routes();

//route user
Route::middleware('auth')->group(function() {
    Route::prefix('profil')->name('profil')->group(function() {
        Route::get('/', [ProfilController::class, 'index']);
        Route::post('edit', [ProfilController::class, 'edit'])->name('.edit');
    });
    Route::get('{id}/sewa', [PesananController::class, 'sewa'])->name('sewa');
    Route::post('{id}/sewa', [PesananController::class, 'simpan']);
    Route::prefix('pesanan')->name('pesanan')->group(function() {
        Route::get('/', [PesananController::class, 'index']);
        Route::get('{id}/bayar', [PesananController::class, 'bayar'])->name('.bayar');
        Route::post('bayar', [PesananController::class, 'bayarSimpan'])->name('.simpan');
        Route::get('{id}/nota', [PesananController::class, 'nota'])->name('.nota');
    });
});

//route admin
Route::prefix('admin')->name('admin')->middleware(['admin', 'auth'])->group(function() {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('.dashboard');
    Route::prefix('mobil')->name('.mobil')->group(function() {
        Route::get('/', [AdminMobilController::class, 'index']);
        Route::get('cetak', [AdminMobilController::class, 'cetak'])->name('.cetak');
        Route::get('{id}/rekomendasi', [AdminMobilController::class, 'rekomendasi'])->name('.rekomendasi');
        Route::get('tambah', [AdminMobilController::class, 'tambah'])->name('.tambah');
        Route::post('tambah', [AdminMobilController::class, 'simpan'])->name('.simpan');
        Route::get('{id}/ubah', [AdminMobilController::class, 'ubah'])->name('.ubah');
        Route::post('edit', [AdminMobilController::class, 'edit'])->name('.edit');
        Route::get('{id}/hapus', [AdminMobilController::class, 'hapus'])->name('.hapus');
    });
    Route::prefix('pesanan')->name('.pesanan')->group(function() {
        Route::get('baru', [AdminPesananController::class, 'baru'])->name('.baru');
        Route::get('cetak-baru', [AdminPesananController::class, 'cetak_baru'])->name('.cetak_baru');
        Route::get('{id}/detail', [AdminPesananController::class, 'detail'])->name('.detail');
        Route::get('{id}/terima', [AdminPesananController::class, 'terima'])->name('.terima');
        Route::get('{id}/tolak', [AdminPesananController::class, 'tolak'])->name('.tolak');
        Route::get('diterima', [AdminPesananController::class, 'diterima'])->name('.diterima');
        Route::get('cetak-terima', [AdminPesananController::class, 'cetak_terima'])->name('.cetak_terima');
        Route::get('ditolak', [AdminPesananController::class, 'ditolak'])->name('.ditolak');
        Route::get('cetak-tolak', [AdminPesananController::class, 'cetak_tolak'])->name('.cetak_tolak');
    });
    Route::prefix('sedang-dipinjam')->name('.pinjam')->group(function() {
        Route::get('/', [AdminSedangPinjamController::class, 'index']);
        Route::get('cetak', [AdminSedangPinjamController::class, 'cetak'])->name('.cetak');
        Route::get('tambah', [AdminSedangPinjamController::class, 'tambah'])->name('.tambah');
        Route::post('simpan', [AdminSedangPinjamController::class, 'simpan'])->name('.simpan');
    });
    Route::prefix('pengembalian')->name('.pengembalian')->group(function() {
        Route::get('/', [AdminPengembalianController::class, 'index']);
        Route::get('cetak', [AdminPengembalianController::class, 'cetak'])->name('.cetak');
        Route::get('tambah', [AdminPengembalianController::class, 'tambah'])->name('.tambah');
        Route::post('tambah', [AdminPengembalianController::class, 'simpan'])->name('.simpan');
        Route::get('{id}/ubah', [AdminPengembalianController::class, 'ubah'])->name('.ubah');
        Route::post('edit', [AdminPengembalianController::class, 'edit'])->name('.edit');
        Route::get('{id}/hapus', [AdminPengembalianController::class, 'hapus'])->name('.hapus');
    });
    Route::prefix('partner')->name('.mitra')->group(function() {
        Route::get('/', [AdminMitraController::class, 'index']);
        Route::get('cetak', [AdminMitraController::class, 'cetak'])->name('.cetak');
        Route::get('tambah', [AdminMitraController::class, 'tambah'])->name('.tambah');
        Route::post('simpan', [AdminMitraController::class, 'simpan'])->name('.simpan');
    });
    Route::prefix('laporan')->name('.laporan')->group(function() {
        Route::get('transaksi', [AdminLaporanController::class, 'transaksi'])->name('.transaksi');
        Route::get('cetak-transaksi', [AdminLaporanController::class, 'cetak_transaksi'])->name('.cetak_transaksi');
        Route::get('kembalikan', [AdminLaporanController::class, 'mobil'])->name('.mobil');
        Route::get('cetak-kembalikan', [AdminLaporanController::class, 'cetak_mobil'])->name('.cetak_mobil');
        Route::get('pinjam-mitra', [AdminLaporanController::class, 'mitra'])->name('.mitra');
        Route::get('cetak-pinjam-mitra', [AdminLaporanController::class, 'cetak_mitra'])->name('.cetak_mitra');
    });
});
