@extends('layouts.app')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/bg_1.png') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Detail Mobil <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Detail Mobil </h1>
        </div>
      </div>
    </div>
</section>


<section class="ftco-section ftco-car-details">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="car-details">
                    <div class="img rounded" style="background-image: url('{{ asset($mobil->gambar) }}');"></div>
                    <div class="text text-center">
                        <span class="subheading">{{ strtoupper($mobil->merk) }}</span>
                        <h2>{{ $mobil->nama_mobil }}</h2>
                        <h5 class="price text-primary">(Rp. {{ number_format($mobil->harga, 0, 0, '.') }} / Hari)</h5>
                        <span class="subheading">Stok Tersedia: {{ $mobil->stok }} Buah</span>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="mt-2">
            <p>Deskripsi:</p>
            <p style="font-size: 1.25rem;">{{ $mobil->deskripsi }}</p>
            <div class="d-flex">
                <div class="w-100">
                    <a href="{{ route('sewa', ['id' => $mobil->id]) }}" class="btn btn-primary w-100">Sewa</a>
                </div>
                <div class="mx-2"></div>
                <div class="w-100">
                    <a href="#" class="btn btn-warning text-white w-100">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>
      
@endsection