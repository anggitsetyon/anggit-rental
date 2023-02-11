@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <p class="card-title">Daftar Mobil Sedang Dipinjam</p>
                    <div>
                        <a href="{{ route('admin.pinjam.tambah') }}" class="btn btn-primary btn-icon-text">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanan as $item)
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
        open("{{ route('admin.pinjam.cetak') }}");
    }
</script>
@endsection