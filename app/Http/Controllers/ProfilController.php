<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('user.profil');
    }

    public function edit(Request $request)
    {
        $user = User::find(auth()->user()->id);
        if($request->has('nama')){
            $user->name = $request->nama;
        }
        if($request->has('hp')){
            $user->hp = $request->hp;
        }
        if($request->has('alamat')){
            $user->alamat = $request->alamat;
        }
        if($request->hasFile('ktp')){
            $file = $request->file('ktp');
            $namafile = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/ktp', $namafile);
            $user->ktp = 'ktp/' . $namafile;
        }
        if($request->hasFile('kk')){
            $file = $request->file('kk');
            $namafile = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path() . '/kk', $namafile);
            $user->kk = 'kk/' . $namafile;
        }
        $user->save();
        return redirect()->route('profil');
    }
}
