@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <p class="card-title">Daftar Pengembalian Mobil</p>
                    <div>
                        <a href="{{ route('admin.pengembalian.tambah') }}" class="btn btn-primary btn-icon-text">
                            <i class="mdi mdi-plus btn-icon-prepend"></i>
                            Tambah
                        </a>
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
                            <th>Nama Penyewa</th>
                            <th>Nama Mobil</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Tambahan</th>
                            <th>Alamat Penyewa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengembalian as $item)
                        <tr>
                            <td>{{ $item->pesanan->user->name }}</td>
                            <td>{{ $item->pesanan->mobil->nama_mobil }}</td>
                            <td>{{ Carbon\Carbon::parse($item->pesanan->tgl_sewa)->format('d M Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($item->pesanan->tgl_kembali)->format('d M Y') }}</td>
                            <td>
                                @if ($item->pesanan->tambahan == 'Ya')
                                Tambah Supir
                                @else
                                -
                                @endif
                            </td>
                            <td>{{ $item->pesanan->user->alamat }}</td>
                            <td class="d-flex justify-content-center">
                                <div class="row">
                                    <a href="{{ route('admin.pesanan.detail', ['id' => $item->pesanan->id]) }}" class="btn btn-info p-2">Detail</a>
                                </div>
                            </td>
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
        open("{{ route('admin.pengembalian.cetak') }}");
    }
</script>
@endsection