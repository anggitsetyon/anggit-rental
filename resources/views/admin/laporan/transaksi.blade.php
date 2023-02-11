@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <p class="card-title">Laporan Transaksi</p>
                    <div>
                        <button type="button" onclick="cetak()" class="btn btn-success btn-icon-text ml-2">
                            Cetak
                            <i class="mdi mdi-printer btn-icon-append"></i>                                                                              
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mobil</th>
                            <th>Durasi Sewa</th>
                            <th>Tambahan</th>
                            <th>Total Pembayaran</th>
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
                            $subtotal = 0;
                        @endphp
                        @foreach ($transaksi as $item)
                        <tr>
                            @php
                                $hari = days_between($item->pesanan->tgl_sewa, $item->pesanan->tgl_kembali) + 1;
                                $total = 0;
                                $total = $hari * $item->pesanan->mobil->harga;
                                if($item->pesanan->tambahan == 'Ya'){
                                    $total = $total + env('HARGA_SOPIR');
                                }
                                $subtotal += $total;
                            @endphp
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->pesanan->mobil->nama_mobil }}</td>
                            <td>{{ $hari }} Hari</td>
                            <td>
                                @if ($item->tambahan == 'Ya')
                                Tambah Supir
                                @else
                                -
                                @endif
                            </td>
                            <td>Rp. {{ number_format($total, 0, 0, '.') }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" class="text-right">Total</td>
                            <td>Rp. {{ number_format($subtotal, 0, 0, '.') }}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function cetak() {
        open("{{ route('admin.laporan.cetak_transaksi') }}");
    }
</script>
@endsection