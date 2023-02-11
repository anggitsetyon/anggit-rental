@extends('layouts.app')

@section('content')
<div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('images/bg_1.png') }}');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Cepat &amp; Mudah Dalam Menyewa Mobil</h1>
	            <a href="https://vimeo.com/45830194" class="icon-wrap popup-vimeo d-flex align-items-center mt-4 justify-content-center">
	            	
	            </a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row justify-content-center">
          <form action="" method="POST" class="bg-light p-5 contact-form" style="  color: rgb(5, 5, 5) ;
				"> 
					<div class="text pt-4">
						<h5 class="mb-4" style="text-align: justify">
							&nbsp &nbsp Memakai jasa kendaraan umum memang kurang mengasikkan jika anda ingin berlibur keliling kota Yogyakarta dan sekitarnya. Tetapi saat ini anda tidak perlu khawatir jika membutuhkan jasa sewa mobil di Yogyakarta untuk berlibur, acara keluarga. AGHNA TRANSPORT menyediakan jasa rental mobil dengan berbagai type mobil mulai dari sedan sampai mini bus. Tidak hanya itu kami juga menyediakan supir bagi anda yang tidak ingin menyetir tentunya dengan harga yang terjangkau.
            </h5>
						<h4 class="h5"> Syarat Sewa Mobil di Aghna Transport:</h4>
						<p class="">1. Mempunyai KTP dan KK sesuai dengan penyewa</p>
						<p class="">2. Bukti Alamat Domisili</p>
						<p class="">3. Mempunyai SIM jika menyewa lepas kunci</p>
            <p class="">4. Penyewaan untuk digunakan di wilayah Yogyakarta, Solo, Semarang bisa sewa minimal 1 hari</p>
						<p class="">5. Penyewaan untuk digunakan di luar wilayah Yogyakarta, Solo, Semarang minimal harus 2 hari </p>
						<p class="">6. Untuk mobil Innova, Alphard, HIACE, dan mobil besar lainnya wajib dengan sopir atau Tidak Lepas Kunci</p>
						<p class="">7. Wajib membawa surat-surat seperti KTP, KK, Bukti alamat domisili ketika akan mengambil mobil</p>
					  <p class="">8. Jika ada mobil yang tidak dapat dipesan, itu karena kendaraan kosong. silahkan klik nomor kontak di halaman paling bawah untuk dicarikan kendaraan yang ingin disewa</p>
          </div>
				</form>
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">Kami Menawarkan</span>
				<h2 class="mb-2">Kendaraan Kami</h2>
			</div>
        </div>
		<div class="row">
            @foreach ($mobil as $item)
            <div class="col-md-4">
                <div class="car-wrap rounded ftco-animate">
                    <div class="img rounded d-flex align-items-end" style="background-image: url('{{ $item->gambar }}');">
                    </div>
                    <div class="text">
                        <h2 class="mb-0"><a href="car-single.html">{{ $item->nama_mobil }} ({{ $item->stok }} Unit)</a></h2>
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
    	</div>
    </section>    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@endsection