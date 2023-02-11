@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <p class="card-title">Laporan Pengembalian Mobil</p>
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
                            <th>Tangal Sewa</th>
                            <th>Tangal Kembali</th>
                            <th>Nama Penyewa</th>
                            <th>No HP Penyewa</th>
                            <th>Alamat Penyewa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($pengembalian as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->pesanan->mobil->nama_mobil }}</td>
                            <td>{{ Carbon\Carbon::parse($item->pesanan->tgl_sewa)->format('d M Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($item->pesanan->tgl_kembali)->format('d M Y') }}</td>
                            <td>{{ $item->pesanan->user->name }}</td>
                            <td>{{ $item->pesanan->user->hp }}</td>
                            <td>{{ $item->pesanan->user->alamat }}</td>
                        </tr>
                        @endforeach
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
        open("{{ route('admin.laporan.cetak_mobil') }}");
    }
</script>
@endsection