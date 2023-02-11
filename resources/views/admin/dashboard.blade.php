@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="w-100 mr-md-3 mr-xl-5">
            <h2>Selamat Datang Admin</h2>
          </div>
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;</p>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Total Jenis Mobil</p>
                <h1>{{ App\Models\Mobil::count(); }} Mobil</h1>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Total Pesanan Baru</p>
                <h1>{{ App\Models\Pesanan::where('status', 'menunggu')->count(); }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Total Pesanan Diterima</p>
                <h1>{{ App\Models\Pesanan::where('status', 'terima')->count(); }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Total Pesanan Ditolak</p>
                <h1>{{ App\Models\Pesanan::where('status', 'tolak')->count(); }}</h1>
            </div>
        </div>
    </div>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Total Pendapatan</p>
                <h1>Rp. {{ number_format(App\Models\Transaksi::sum('total'), 0, 0, '.'); }}</h1>
            </div>
        </div>
    </div>
</div>
@endsection