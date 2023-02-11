<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mobil;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPesananController extends Controller
{
    public function baru()
    {
        $pesanan = Pesanan::where('status', 'menunggu')->get();
        return view('admin.pesanan.baru', compact('pesanan'));
    }

    public function cetak_baru()
    {
        $pesanan = Pesanan::where('status', 'menunggu')->get();
        return view('admin.pesanan.print-baru', compact('pesanan'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::find($id);
        return view('admin.pesanan.detail', compact('pesanan'));
    }

    public function diterima()
    {
        $pesanan = Pesanan::where('status', 'terima')->get();
        return view('admin.pesanan.diterima', compact('pesanan'));
    }

    public function cetak_terima()
    {
        $pesanan = Pesanan::where('status', 'terima')->get();
        return view('admin.pesanan.print-terima', compact('pesanan'));
    }

    public function ditolak()
    {
        $pesanan = Pesanan::where('status', 'tolak')->get();
        return view('admin.pesanan.ditolak', compact('pesanan'));
    }

    public function cetak_tolak()
    {
        $pesanan = Pesanan::where('status', 'tolak')->get();
        return view('admin.pesanan.print-tolak', compact('pesanan'));
    }

    public function terima($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 'terima';
        $pesanan->save();
        $mobil = Mobil::find($pesanan->id_mobil);
        $mobil->stok = $mobil->stok - 1;
        $mobil->save();
        return redirect()->route('admin.pesanan.diterima');
    }

    public function tolak($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = 'tolak';
        $pesanan->save();
        return redirect()->route('admin.pesanan.ditolak');
    }
}
