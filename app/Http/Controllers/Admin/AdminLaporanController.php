<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\Pengembalian;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function transaksi()
    {
        $transaksi = Transaksi::where('status', 'settlement')->get();
        return view('admin.laporan.transaksi', compact('transaksi'));
    }

    public function cetak_transaksi()
    {
        $transaksi = Transaksi::where('status', 'settlement')->get();
        return view('admin.laporan.print-transaksi', compact('transaksi'));
    }

    public function mobil()
    {
        $pengembalian = Pengembalian::all();
        return view('admin.laporan.mobil-sewa', compact('pengembalian'));
    }

    public function cetak_mobil()
    {
        $pengembalian = Pengembalian::all();
        return view('admin.laporan.print-mobil', compact('pengembalian'));
    }

    public function mitra()
    {
        $mitra = Mitra::all();
        return view('admin.laporan.mitra', compact('mitra'));
    }

    public function cetak_mitra()
    {
        $mitra = Mitra::all();
        return view('admin.laporan.print-mitra', compact('mitra'));
    }
}
