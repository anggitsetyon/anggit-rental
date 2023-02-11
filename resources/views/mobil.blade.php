@extends('layouts.app')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/bg_1.png') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Mobil <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Pilih Mobil Untuk Kebutuhan Anda</h1>
        </div>
      </div>
    </div>
</section>
      

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            @foreach ($mobil as $item)
            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url({{ $item->gambar }});">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="car-single.html">{{ $item->nama_mobil }}</a></h2>
                        <div class="d-flex mb-3">
                            <span class="cat">{{ $item->merk }}</span>
                            <p class="price ml-auto">Rp. {{ number_format($item->harga, 0, 0, '.') }}</p>
                        </div>
                        <p class="d-flex mb-0 d-block"><a href="{{ route('sewa', ['id' => $item->id]) }}" class="btn btn-primary py-2 mr-1">Sewa</a> <a href="{{ route('detail', ['id' => $item->id]) }}" class="btn btn-secondary py-2 ml-1">Detail</a></p>
                    </div>
                </div>
            </div>
            @endforeach              
        </div>
        <div class="d-flex justify-content-center">
            {!! $mobil->links() !!}
        </div>
    </div>
</section>
@endsection