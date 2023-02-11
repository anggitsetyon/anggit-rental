<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;
use Illuminate\Http\Request;

class AdminMobilController extends Controller
{
    public function index()
    {
        $mobil = Mobil::all();
        return view('admin.mobil.index', compact('mobil'));
    }

    public function cetak()
    {
        $mobil = Mobil::all();
        return view('admin.mobil.print', compact('mobil'));
    }

    public function rekomendasi($id)
    {
        $mobil = Mobil::find($id);
        if($mobil->rekomendasi == true){
            $mobil->rekomendasi = false;
        } else {
            $mobil->rekomendasi = true;
        }
        $mobil->save();
        return redirect()->route('admin.mobil');
    }

    public function tambah()
    {
        return view('admin.mobil.tambah');
    }

    public function simpan(Request $request)
    {
        $mobil = new Mobil();
        $mobil->nama_mobil = $request->nama;
        $mobil->kategori = $request->kategori;
        $mobil->merk = $request->merk;
        $mobil->stok = $request->stok;
        $mobil->harga = $request->harga;
        $mobil->deskripsi = $request->deskripsi;
        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $namafile = rand() . '-' . $request->nama . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/images', $namafile);
            $mobil->gambar = 'images/' . $namafile;
        }
        $mobil->save();

        return redirect()->route('admin.mobil');
    }

    public function ubah($id)
    {
        $mobil = Mobil::find($id);
        return view('admin.mobil.edit', compact('mobil'));
    }

    public function edit(Request $request)
    {
        $mobil = Mobil::find($request->id);
        $mobil->nama_mobil = $request->nama;
        $mobil->kategori = $request->kategori;
        $mobil->merk = $request->merk;
        $mobil->stok = $request->stok;
        $mobil->harga = $request->harga;
        $mobil->deskripsi = $request->deskripsi;
        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $namafile = rand() . '-' . $request->nama . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/images', $namafile);
            $mobil->gambar = 'images/' . $namafile;
        }
        $mobil->save();

        return redirect()->route('admin.mobil');
    }

    public function hapus($id)
    {
        $mobil = Mobil::find($id);
        $mobil->delete();
        return redirect()->route('admin.mobil');
    }
}
