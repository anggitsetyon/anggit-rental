@extends('layouts.app')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/bg_1.png') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Pesanan <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Pesanan Anda</h1>
        </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="row col-md-12 mb-4">
                <table class="table table-bordered">
                    <h6>Harap membawa Nota Pesanan, KTP dan KK Asli sesuai yang diupload sebelumnya ketika pengambilan mobil</h6>
                    <h6>Untuk nota tidak perlu dicetak kertas, dalam bentuk file pdf saja</h6>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Mobil</th>
                        <th>Kategori</th>
                        <th>Tanggal Sewa</th>
                        <th>Tanggal Kembali</th>
                        <th>Tambahan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            function days_between($date1, $date2) {
                                $datetime1 = new DateTime($date1);
                                $datetime2 = new DateTime($date2);
                                $interval = $datetime1->diff($datetime2);
                                return $interval->format('%a');
                            }
                            $no = 1;
                        @endphp
                        @foreach ($pesanan as $item)
                        <tr>
                            <td class="pl-2">{{ $no++ }}</td>
                            <td class="pl-2">{{ $item->mobil->nama_mobil }}</td>
                            <td class="pl-2">{{ $item->mobil->kategori }}</td>
                            <td class="pl-2">{{ Carbon\Carbon::parse($item->tgl_sewa)->format('d M Y') }}</td>
                            <td class="pl-2">{{ Carbon\Carbon::parse($item->tgl_kembali)->format('d M Y') }}</td>
                            <td class="pl-2">
                                @if ($item->tambahan == 'Ya')
                                Tambah Supir
                                @else
                                -
                                @endif
                            </td>
                            <td class="pl-2">
                                @php
                                    $hari = days_between($item->tgl_sewa, $item->tgl_kembali) + 1;
                                    $total = 0;
                                    $total = $hari * $item->mobil->harga;
                                    if($item->tambahan == 'Ya'){
                                        $total = $total + env('HARGA_SOPIR');
                                    }
                                    echo 'Rp. ' . number_format($total, 0, 0, '.');
                                @endphp
                            </td>
                            <td class="pl-2">
                                @if (App\Models\Pengembalian::where('id_pesanan', $item->id)->first())
                                Sudah Dikembalikan
                                @else
                                @if ($item->status == 'dibayar')
                                Mobil Siap Diambil                              
                                @else
                                {{ $item->status }}
                                @endif
                                @endif
                            </td>
                            <td class="pl-2">
                                @if ($item->status == 'terima')
                                <a href="{{ route('pesanan.bayar', ['id' => $item->id]) }}" class="btn btn-primary">Bayar</a>
                                @endif
                                @if ($item->status == 'dibayar')
                                <button type="button" onclick="nota({{ $item->id }})" class="btn btn-success">Bukti Nota</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection

@if (Session::has('token'))
@section('js')
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<form action="{{ route('pesanan.simpan') }}" method="post" id="form">
    @csrf
    <input type="hidden" name="id" value="{{ Session::get('id') }}">
    <input type="hidden" name="json" id="json">
</form>
<script type="text/javascript">
    window.snap.pay("{{ Session::get('token') }}", {
        onSuccess: function(result){
          /* You may add your own implementation here */
        //   alert("payment success!"); console.log(result);
        send_respons(result);
        },
        onPending: function(result){
          /* You may add your own implementation here */
        //   alert("wating your payment!"); console.log(result);
        send_respons(result);
        },
        onError: function(result){
          /* You may add your own implementation here */
        //   alert("payment failed!"); console.log(result);
        send_respons(result);
        },
        onClose: function(){
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
        }
    })

    function send_respons(result) {
        document.querySelector('#json').value = JSON.stringify(result);
        document.querySelector('#form').submit();
    }
</script>
@endsection
@endif

@section('js')
<script>
    function nota(id) {
        open("pesanan/"+id+"/nota")
    }
</script>
@endsection