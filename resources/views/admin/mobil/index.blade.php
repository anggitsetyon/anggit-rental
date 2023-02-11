@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
                <p class="card-title">Daftar Mobil</p>
                <div>
                    <a href="{{ route('admin.mobil.tambah') }}" class="btn btn-primary btn-icon-text">
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
                        <th>Nama Mobil</th>
                        <th>Kategori</th>
                        <th>Merk Mobil</th>
                        <th>Stok</th>
                        <th>Harga Sewa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobil as $item)
                    <tr>
                        <td>{{ $item->nama_mobil }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->merk }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>Rp. {{ number_format($item->harga, 0, 0, '.') }}</td>
                        <td class="d-flex justify-content-center">
                            <div class="row">
                                @if ($item->rekomendasi == true)
                                <a href="{{ route('admin.mobil.rekomendasi', ['id' => $item->id]) }}" class="d-flex align-items-center justify-content-center btn btn-warning btn-icon">
                                    <i class="mdi mdi-crown"></i>
                                </a>
                                @else
                                <a href="{{ route('admin.mobil.rekomendasi', ['id' => $item->id]) }}" class="d-flex align-items-center justify-content-center btn btn-inverse-warning btn-icon">
                                    <i class="mdi mdi-crown"></i>
                                </a>
                                @endif
                                <a href="{{ route('detail', ['id' => $item->id]) }}" class="ml-2 d-flex align-items-center justify-content-center btn btn-inverse-success btn-icon">
                                    <i class="mdi mdi-eye"></i>
                                </a>
                                <a href="{{ route('admin.mobil.ubah', ['id' => $item->id]) }}" class="ml-2 d-flex align-items-center justify-content-center btn btn-inverse-info btn-icon">
                                    <i class="mdi mdi-pencil"></i>
                                </a>
                                <button type="button" data-toggle="modal" data-target="#modal-delete" onclick="hapus({{ $item->id }})" class="ml-2 d-flex align-items-center justify-content-center btn btn-inverse-danger btn-icon">
                                    <i class="mdi mdi-delete"></i>
                                </button>
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

<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Apakah Anda yakin untuk menghapus data tersebut ???</p>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Batal</button>
            <a id="delete" class="btn btn-outline-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function hapus(id){
        var hps = document.querySelector('#delete');
        hps.href = 'mobil/'+id+'/hapus';
    }
    function cetak() {
        open("{{ route('admin.mobil.cetak') }}");
    }
</script>
@endsection