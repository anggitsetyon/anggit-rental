<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\MidtransController;
use App\Models\Transaksi;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('id_user', auth()->user()->id)->get();
        return view('user.pesanan', compact('pesanan'));
    }

    public function sewa($id)
    {
        if(isset(auth()->user()->alamat) && isset(auth()->user()->hp)){
            if(isset(auth()->user()->ktp) && isset(auth()->user()->kk)){
                return view('sewa', compact('id'));
            } else {
                return redirect()->route('profil')->withErrors(['empty' => 'Dokumen KK dan KTP Wajib Diisi!']);
            }
        } else {
            return redirect()->route('profil')->withErrors(['empty' => 'Lengkapi Data Anda Dahulu!']);
        }
    }

    public function simpan(Request $request, $id)
    {
        $pesanan = new Pesanan();
        $pesanan->id_mobil = $id;
        $pesanan->id_user = auth()->user()->id;
        $pesanan->tgl_sewa = $request->tgl_sewa;
        $pesanan->tgl_kembali = $request->tgl_kembali;
        $pesanan->tambahan = $request->supir;
        $pesanan->save();

        return redirect()->route('home');
    }

    public function bayar($id)
    {
        $pesanan = Pesanan::find($id);
        $total = 0;
        $hari = $this->days_between($pesanan->tgl_sewa, $pesanan->tgl_kembali) + 1;
        $total = $hari * $pesanan->mobil->harga;
        if($pesanan->tambahan == 'Ya'){
            $total = $total + env('HARGA_SOPIR');
        }
        $token = MidtransController::config($total);
        return redirect()->back()->with(['token' => $token, 'id' => $id]);
    }

    public function bayarSimpan(Request $request)
    {
        $json = json_decode($request->json);
        $transaksi = new Transaksi();
        $transaksi->id_pesanan = $request->id;
        $transaksi->order_id = $json->order_id;
        $transaksi->total = $json->gross_amount;
        $transaksi->status = $json->transaction_status;
        $transaksi->save();

        $pesanan = Pesanan::find($request->id);
        if($json->transaction_status == 'settlement') {
            $pesanan->status = 'dibayar';
            $pesanan->save();
        }

        return redirect()->route('pesanan');
    }

    public function nota($id)
    {
        $pesanan = Pesanan::find($id);
        return view('user.nota', compact('pesanan'));
    }

    public static function days_between($date1, $date2)
    {
        $datetime1 = new DateTime($date1);
        $datetime2 = new DateTime($date2);
        $interval = $datetime1->diff($datetime2);
        return $interval->format('%a');
    }
}
