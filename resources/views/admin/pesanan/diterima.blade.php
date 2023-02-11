@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <p class="card-title">Daftar Pesanan Diterima</p>
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
                        @foreach ($pesanan as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->mobil->nama_mobil }}</td>
                            <td>{{ Carbon\Carbon::parse($item->tgl_sewa)->format('d M Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($item->tgl_kembali)->format('d M Y') }}</td>
                            <td>
                                @if ($item->tambahan == 'Ya')
                                Tambah Supir
                                @else
                                -
                                @endif
                            </td>
                            <td>{{ $item->user->alamat }}</td>
                            <td class="d-flex justify-content-center">
                                <div class="row">
                                    <a href="{{ route('admin.pesanan.detail', ['id' => $item->id]) }}" class="btn btn-info p-2">Detail</a>
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
        open("{{ route('admin.pesanan.cetak_terima') }}");
    }
</script>
@endsection