<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $mobil = Mobil::all();
        return view('home', compact('mobil'));
    }
}
