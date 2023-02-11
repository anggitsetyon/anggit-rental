@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Mobil</h4>
            <form action="{{ route('admin.mobil.edit') }}" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $mobil->id }}">
                <div class="form-group">
                    <label for="nama">Nama Mobil</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Mobil" value="{{ $mobil->nama_mobil }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Kategori Mobil</label>
                            <div>
                                <select name="kategori" class="form-control" id="kategori" required>
                                    <option selected disabled>-Kategori Mobil-</option>
                                    <option {{ ($mobil->kategori == 'Mini') ? 'selected' : '' }}>Mini</option>
                                    <option {{ ($mobil->kategori == 'Standar') ? 'selected' : '' }}>Standar</option>
                                    <option {{ ($mobil->kategori == 'SUV') ? 'selected' : '' }}>SUV</option>
                                    <option {{ ($mobil->kategori == 'Mobil Keluarga') ? 'selected' : '' }}>Mobil Keluarga</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="merk">Merk Mobil</label>
                            <div>
                                <select name="merk" class="form-control" id="merk" required>
                                    <option selected disabled>-Merk Mobil-</option>
                                    <option {{ ($mobil->merk == 'Toyota') ? 'selected' : '' }}>Toyota</option>
                                    <option {{ ($mobil->merk == 'Honda') ? 'selected' : '' }}>Honda</option>
                                    <option {{ ($mobil->merk == 'Hyundai') ? 'selected' : '' }}>Hyundai</option>
                                    <option {{ ($mobil->merk == 'Nissan') ? 'selected' : '' }}>Nissan</option>
                                    <option {{ ($mobil->merk == 'Mitsubishi') ? 'selected' : '' }}>Mitsubishi</option>
                                    <option {{ ($mobil->merk == 'Suzuki') ? 'selected' : '' }}>Suzuki</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <div>
                                <input type="number" name="stok" class="form-control" id="stok" placeholder="Stok Mobil" value="{{ $mobil->stok }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga">Harga Sewa</label>
                            <div>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga Sewa" value="{{ $mobil->harga }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="file-upload-default" accept="image/*">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Gambar" value="{{ $mobil->gambar }}">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Deskripsi">{{ $mobil->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="{{ route('admin.mobil') }}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection