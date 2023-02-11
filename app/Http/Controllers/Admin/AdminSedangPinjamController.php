<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use App\Models\Transaksi;
use App\Models\Pengembalian;
use App\Models\SedangPinjam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSedangPinjamController extends Controller
{
    public function index()
    {
        $pesanan = SedangPinjam::where('status', true)->get();
        return view('admin.pinjam.index', compact('pesanan'));
    }

    public function cetak()
    {
        $pesanan = SedangPinjam::where('status', true)->get();
        return view('admin.pinjam.print', compact('pesanan'));
    }

    public function tambah()
    {
        $transaksi = Transaksi::where('status', 'settlement')
                    ->whereNotIn('id_pesanan', SedangPinjam::where('status', true)->get('id_pesanan'))
                    ->whereNotIn('id_pesanan', Pengembalian::where('status', true)->get('id_pesanan'))
                    ->get();
        return view('admin.pinjam.tambah', compact('transaksi'));
    }

    public function simpan(Request $request)
    {
        // cek data sudah ada
        $pinjam = SedangPinjam::where('id_pesanan', $request->data)->first();
        if($pinjam){
            $pinjam->id_pesanan = $request->data;
            if($request->ktp == 'on'){
                $pinjam->ktp = true;
            }
            if($request->kk == 'on'){
                $pinjam->kk = true;
            }
            if($request->hasFile('nota')){
                $file = $request->file('nota');
                $namafile = rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/pinjam/nota', $namafile);
                $pinjam->nota = $namafile;
            }
            if($request->hasFile('bukti')){
                $file = $request->file('bukti');
                $namafile = rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/pinjam/bukti', $namafile);
                $pinjam->bukti = $namafile;
            }
            $pinjam->status = true;
        } else {
            $pinjam = new SedangPinjam();
            $pinjam->id_pesanan = $request->data;
            if($request->ktp == 'on'){
                $pinjam->ktp = true;
            }
            if($request->kk == 'on'){
                $pinjam->kk = true;
            }
            if($request->hasFile('nota')){
                $file = $request->file('nota');
                $namafile = rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/pinjam/nota', $namafile);
                $pinjam->nota = $namafile;
            }
            if($request->hasFile('bukti')){
                $file = $request->file('bukti');
                $namafile = rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/pinjam/bukti', $namafile);
                $pinjam->bukti = $namafile;
            }
        }
        $pinjam->save();
        return redirect()->route('admin.pinjam');
    }
}
