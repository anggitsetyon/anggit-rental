@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Mobil Pesanan Dikembalikan</h4>
            <form action="{{ route('admin.pengembalian.simpan') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="data">Nama Mobil (Nama Penyewa)</label>
                    <div>
                        <select name="data" class="form-control" id="data" required>
                            <option selected disabled>-Pilih Data Pesanan-</option>
                            @foreach ($pinjam as $item)
                            <option value="{{ $item->id_pesanan }}">{{ $item->pesanan->mobil->nama_mobil . " (" . $item->pesanan->user->name . ")" }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>Syarat Dokumen (Dikembalikan)</div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="ktp" class="form-check-input" required>
                            KTP
                            <i class="input-helper"></i>
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="kk" class="form-check-input" required>
                            KK
                            <i class="input-helper"></i>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Bukti Pengembalian</label>
                    <input type="file" name="bukti" class="file-upload-default" accept="image/*">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Bukti Pengambilan Mobil">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="{{ route('admin.pinjam') }}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection