<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mobil;
use App\Models\Pesanan;
use App\Models\Pengembalian;
use App\Models\SedangPinjam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::all();
        return view('admin.pengembalian.index', compact('pengembalian'));
    }

    public function cetak()
    {
        $pengembalian = Pengembalian::all();
        return view('admin.pengembalian.print', compact('pengembalian'));
    }

    public function tambah()
    {
        $pinjam = SedangPinjam::where('status', true)->get();
        return view('admin.pengembalian.tambah', compact('pinjam'));
    }

    public function simpan(Request $request)
    {
        // cek data sudah ada
        $pengembalian = Pengembalian::where('id_pesanan', $request->data)->first();
        if($pengembalian){
            $pengembalian->id_pesanan = $request->data;
            if($request->ktp == 'on'){
                $pengembalian->ktp = true;
            }
            if($request->kk == 'on'){
                $pengembalian->kk = true;
            }
            if($request->hasFile('bukti')){
                $file = $request->file('bukti');
                $namafile = rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/pengembalian/bukti', $namafile);
                $pengembalian->bukti = $namafile;
            }
            
            $pinjam = SedangPinjam::where('id_pesanan', $request->data)->first();
            $pinjam->status = false;
            $pinjam->save();
            $pengembalian->save();
        } else {
            $pengembalian = new Pengembalian();
            $pengembalian->id_pesanan = $request->data;
            if($request->ktp == 'on'){
                $pengembalian->ktp = true;
            }
            if($request->kk == 'on'){
                $pengembalian->kk = true;
            }
            if($request->hasFile('bukti')){
                $file = $request->file('bukti');
                $namafile = rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/pengembalian/bukti', $namafile);
                $pengembalian->bukti = $namafile;
            }
            
            $pinjam = SedangPinjam::where('id_pesanan', $request->data)->first();
            $pinjam->status = false;
            $pinjam->save();
            $pengembalian->save();
    
            $pesanan = Pesanan::find($request->data);
            $id_mobil = $pesanan->id_mobil;
            $mobil = Mobil::find($id_mobil);
            $mobil->stok = $mobil->stok + 1;
            $mobil->save();
        }

        return redirect()->route('admin.pengembalian');
    }
}
