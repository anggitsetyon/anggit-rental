@extends('layouts.app')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset(App\Models\Mobil::find($id)->gambar) }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Sewa Mobil <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Mulai Sewa Mobil</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="col-md-12 heading-section text-center ftco-animate mb-5">
			<span class="subheading">Formulir Penyewaan</span>
			<h2 class="mb-2">{{ strtoupper(App\Models\Mobil::find($id)->nama_mobil); }}</h2>
    </div>
    <form action="" method="POST" class="bg-light p-5 contact-form">
      @csrf
      <div class="col-12 row">
        <div class="col-12">
          <p><span>Detail Informasi Anda: </span></p>
        </div>
        <div class="col-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend" style="width: 37px;">
              <span class="input-group-text" id="basic-addon1">
                <span class="icon icon-user"></span>
              </span>
            </div>
            <input type="text" value="{{ auth()->user()->name }}" class="form-control" readonly>
          </div>
        </div>
        <div class="col-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend" style="width: 37px;">
              <span class="input-group-text" id="basic-addon1">
                <span class="icon icon-envelope"></span>
              </span>
            </div>
            <input type="text" value="{{ auth()->user()->email }}" class="form-control" readonly>
          </div>
        </div>
        <div class="col-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend" style="width: 37px;">
              <span class="input-group-text" id="basic-addon1">
                <span class="icon icon-phone"></span>
              </span>
            </div>
            <input type="text" value="{{ auth()->user()->hp }}" class="form-control" readonly>
          </div>
        </div>
        <div class="col-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend" style="width: 37px;">
              <span class="input-group-text" id="basic-addon1">
                <span class="icon icon-home"></span>
              </span>
            </div>
            <input type="text" value="{{ auth()->user()->alamat }}" class="form-control" readonly>
          </div>
        </div>
        <div class="col-12">
          <p><span>Dokumen Anda: </span></p>
        </div>
        <div class="col-6">
          <div class="border w-100 p-4 rounded mb-2 d-flex align-items-center">
            <div class="d-flex mr-3">
              <div class="icon mr-3">
                  <span class="icon-camera-retro"></span>
              </div>
              <p><span>KTP:</span> 
              </p>
            </div>
              @if (isset(auth()->user()->ktp))
              <img src="{{ asset(auth()->user()->ktp) }}" class="w-75" alt="">
              @else
              -
              @endif
          </div>
        </div>
        <div class="col-6">
          <div class="border w-100 p-4 rounded mb-2 d-flex align-items-center">
            <div class="d-flex mr-3">
              <div class="icon mr-3">
                  <span class="icon-book"></span>
              </div>
              <p><span>KK:</span> 
              </p>
            </div>
              @if (isset(auth()->user()->kk))
              <img src="{{ asset(auth()->user()->kk) }}" class="w-75" alt="">
              @else
              -
              @endif
          </div>
        </div>
        <div class="col-12 my-2">
          <p><span>Detail Penyewaan: </span></p>
        </div>
        <div class="col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <span class="icon icon-car"></span>
              </span>
            </div>
            <input type="text" class="form-control" value="{{ strtoupper(App\Models\Mobil::find($id)->nama_mobil) }}" readonly>
          </div>
        </div>
        <div class="col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                Rp
              </span>
            </div>
            <input type="text" class="form-control" value="Rp. {{ number_format(App\Models\Mobil::find($id)->harga, 0, 0, '.') }}" readonly>
          </div>
        </div>
        <div class="col-12">
          <p><span>Tanggal Penyewaan: </span></p>
        </div>
        <div class="col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <span class="icon icon-calendar" style="padding: 0.1rem"></span>
              </span>
            </div>
            <input type="date" class="form-control" name="tgl_sewa" required>
          </div>
        </div>
        <div class="col-12">
          <p><span>Tanggal Pengembalian: </span></p>
        </div>
        <div class="col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <span class="icon icon-calendar" style="padding: 0.1rem"></span>
              </span>
            </div>
            <input type="date" class="form-control" name="tgl_kembali" required>
          </div>
        </div>
        <div class="col-12">
          <p><span>Tambahan Supir (+ Rp. {{number_format(env('HARGA_SOPIR'),0,0,'.')}}): </span></p>
        </div>
        <div class="col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                <span class="icon icon-user p-1"></span>
              </span>
            </div>
            <select name="supir" id="supir" class="form-control">
              <option>Ya</option>
              <option selected>Tidak</option>
            </select>
          </div>
        </div>
        <div class="col-12">
          <p><span>Total : </span></p>
        </div>
        <div class="col-12">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">
                Rp
              </span>
            </div>
            <input type="text" class="form-control" name="total" readonly>
          </div>
        </div>
        <div class="col-12 mt-2">
          <button type="submit" class="btn btn-primary w-100 p-2">Kirim</button>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection

@section('js')
<script>
  $(document).ready(function() {
    var total = 0;
    var diffInDays = 0;
    var sewa = '{{ App\Models\Mobil::find($id)->harga }}';
    $('input[type=date][name=tgl_sewa]').change(function() {
      var mulai = new Date($('input[type=date][name=tgl_sewa]').val());
      var akhir = new Date($('input[type=date][name=tgl_kembali]').val());
      // Calculate the difference in milliseconds
      var diffInMilliseconds = akhir.getTime() - mulai.getTime();

      // Convert the difference to days
      diffInDays = (diffInMilliseconds / (1000 * 60 * 60 * 24)) + 1;

      total = diffInDays * sewa;
      $('input[type=text][name=total]').val('Rp. '+formatRupiah(''+total));
      
    })
    $('input[type=date][name=tgl_kembali]').change(function() {
      var mulai = new Date($('input[type=date][name=tgl_sewa]').val());
      var akhir = new Date($('input[type=date][name=tgl_kembali]').val());
      // Calculate the difference in milliseconds
      var diffInMilliseconds = akhir.getTime() - mulai.getTime();

      // Convert the difference to days
      diffInDays = (diffInMilliseconds / (1000 * 60 * 60 * 24)) + 1;

      total = diffInDays * sewa;
      $('input[type=text][name=total]').val('Rp. '+formatRupiah(''+total));

    })
    $('select[name=supir]').change(function() {
      var supir = $('select[name=supir]').val();
      var harga = "{{env('HARGA_SOPIR')}}";
      if(supir == 'Ya') {
        total = diffInDays * sewa + parseInt(harga);
        $('input[type=text][name=total]').val('Rp. '+formatRupiah(''+total));
      } else {
        total = diffInDays * sewa;
        $('input[type=text][name=total]').val('Rp. '+formatRupiah(''+total));
      }
    })
  })

  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
</script>
@endsection