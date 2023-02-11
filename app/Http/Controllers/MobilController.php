<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $mobil = Mobil::paginate(9);
        return view('mobil', compact('mobil'));
    }

    public function detail($id)
    {
        $mobil = Mobil::find($id);
        return view('detail-mobil', compact('mobil'));
    }
}
