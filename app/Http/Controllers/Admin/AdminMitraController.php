<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use Illuminate\Http\Request;

class AdminMitraController extends Controller
{
    public function index()
    {
        $mitra = Mitra::all();
        return view('admin.mitra.index', compact('mitra'));
    }

    public function cetak()
    {
        $mitra = Mitra::all();
        return view('admin.mitra.print', compact('mitra'));
    }

    public function tambah()
    {
        return view('admin.mitra.tambah');
    }

    public function simpan(Request $request)
    {
        $mitra = new Mitra();
        $mitra->id_mobil = $request->data;
        $mitra->nama_mitra = $request->nama;
        $mitra->tgl_sewa = $request->tgl_sewa;
        $mitra->tgl_kembali = $request->tgl_kembali;
        $mitra->biaya = $request->biaya;
        $mitra->save();

        return redirect()->route('admin.mitra');
    }
}
