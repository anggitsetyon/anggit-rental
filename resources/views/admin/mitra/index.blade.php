@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <p class="card-title">Daftar Pinjam Mobil Dari Mitra</p>
                    <div>
                        <a href="{{ route('admin.mitra.tambah') }}" class="btn btn-primary btn-icon-text">
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
                            <th>Nama Mitra</th>
                            <th>Nama Mobil</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Biaya Pinjam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mitra as $item)
                        <tr>
                            <td>{{ $item->nama_mitra }}</td>
                            <td>{{ $item->mobil->nama_mobil }}</td>
                            <td>{{ Carbon\Carbon::parse($item->tgl_sewa)->format('d M Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($item->tgl_kembali)->format('d M Y') }}</td>
                            <td>Rp. {{ number_format($item->biaya, 0, 0, '.') }}</td>
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
        open("{{ route('admin.mitra.cetak') }}");
    }
</script>
@endsection