@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Tambah Mobil</h4>
            <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Mobil</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Mobil" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kategori">Kategori Mobil</label>
                            <div>
                                <select name="kategori" class="form-control" id="kategori" required>
                                    <option selected disabled>-Kategori Mobil-</option>
                                    <option>Mini</option>
                                    <option>Standar</option>
                                    <option>SUV</option>
                                    <option>Mobil Keluarga</option>
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
                                    <option>Toyota</option>
                                    <option>Honda</option>
                                    <option>Hyundai</option>
                                    <option>Nissan</option>
                                    <option>Mitsubishi</option>
                                    <option>Suzuki</option>
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
                                <input type="number" name="stok" class="form-control" id="stok" placeholder="Stok Mobil" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga">Harga Sewa</label>
                            <div>
                                <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga Sewa" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="file-upload-default" accept="image/*">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Gambar">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4" placeholder="Deskripsi"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="{{ route('admin.mobil') }}" class="btn btn-light">Cancel</a>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection