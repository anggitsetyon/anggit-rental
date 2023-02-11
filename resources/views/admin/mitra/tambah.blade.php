@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Pinjam Mobil Mitra</h4>
            <form action="{{ route('admin.mitra.simpan') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Mitra</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Mobil" required>
                </div>
                <div class="form-group">
                    <label for="data">Mobil</label>
                    <div>
                        <select name="data" class="form-control" id="data" required>
                            <option selected disabled>-Pilih Data Mobil-</option>
                            @foreach (App\Models\Mobil::all() as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_mobil }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_sewa">Tanggal Sewa</label>
                            <div>
                                <input type="date" name="tgl_sewa" class="form-control" id="tgl_sewa" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_kembali">Tanggal Kembali</label>
                            <div>
                                <input type="date" name="tgl_kembali" class="form-control" id="tgl_kembali" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya</label>
                    <input type="text" name="biaya" class="form-control" id="biaya" placeholder="Biaya Sewa Mobil" required>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="{{ route('admin.mitra') }}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection