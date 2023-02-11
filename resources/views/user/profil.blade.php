@extends('layouts.app')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{ asset('images/bg_1.png') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Profil <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Informasi Anda</h1>
        </div>
        </div>
    </div>
</section>

@error('empty')
<div class="container mt-2">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <span class="ml-2">{{ $message }}</span>
            </div>
            <div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
@enderror

<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="row col-md-12 mb-4">
                <div class="col-md-12">
                    <div class="border w-100 p-4 rounded mb-2">
                        <div class="row col-12">
                            <div class="col-8">
                                <div class="d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-user"></span>
                                    </div>
                                    <p><span>Nama Anda:</span> {{ auth()->user()->name }}</p>
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#namaModal">
                                    Ubah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 my-3"></div>
                <div class="col-md-6">
                    <div class="border w-100 p-4 rounded mb-2">
                        <div class="row col-12">
                            <div class="col-8">
                                <div class="d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-envelope-o"></span>
                                    </div>
                                    <p><span>Email:</span> <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a></p>
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border w-100 p-4 rounded mb-2">
                        <div class="row col-12">
                            <div class="col-8">
                                <div class="d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-mobile-phone"></span>
                                    </div>
                                    <p><span>No HP:</span> <a href="tel://{{ auth()->user()->hp }}">{{ auth()->user()->hp ?? '-' }}</a></p>
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#hpModal">
                                    Ubah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 my-3"></div>
                <div class="col-md-12">
                    <div class="border w-100 p-4 rounded mb-2">
                        <div class="row col-12">
                            <div class="col-8">
                                <div class="d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-map-o"></span>
                                    </div>
                                    <p><span>Alamat Anda:</span> {{ auth()->user()->alamat ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#alamatModal">
                                    Ubah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 my-3">
                    <p><span>Dokumen Anda: </span></p>
                </div>
                <div class="col-md-6">
                    <div class="border w-100 p-4 rounded mb-2">
                        <div class="row col-12">
                            <div class="col-8">
                                <div class="d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-camera-retro"></span>
                                    </div>
                                    <p><span>KTP:</span> 
                                        @if (isset(auth()->user()->ktp))
                                        <img src="{{ asset(auth()->user()->ktp) }}" class="w-75" alt="">
                                        @else
                                        -
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#ktpModal">
                                    Ubah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="border w-100 p-4 rounded mb-2">
                        <div class="row col-12">
                            <div class="col-8">
                                <div class="d-flex">
                                    <div class="icon mr-3">
                                        <span class="icon-book"></span>
                                    </div>
                                    <p><span>KK:</span> 
                                        @if (isset(auth()->user()->kk))
                                        <img src="{{ asset(auth()->user()->kk) }}" class="w-75" alt="">
                                        @else
                                        -
                                        @endif    
                                    </p>
                                </div>
                            </div>
                            <div class="col-4 d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#kkModal">
                                    Ubah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Nama Modal -->
<div class="modal fade" id="namaModal" tabindex="-1" aria-labelledby="namaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profil.edit') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="namaModalLabel">Ganti Nama</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Anda" value="{{ auth()->user()->name }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Telp Modal -->
<div class="modal fade" id="hpModal" tabindex="-1" aria-labelledby="hpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profil.edit') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="hpModalLabel">Ganti No HP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" name="hp" class="form-control" placeholder="No HP Anda" value="{{ auth()->user()->hp }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Alamat Modal -->
<div class="modal fade" id="alamatModal" tabindex="-1" aria-labelledby="alamatModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profil.edit') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="alamatModalLabel">Ganti Alamat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea name="alamat" id="alamat" cols="30" rows="7" class="form-control" placeholder="Alamat Anda">{{ auth()->user()->alamat }}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- KTP Modal -->
<div class="modal fade" id="ktpModal" tabindex="-1" aria-labelledby="ktpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profil.edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="ktpModalLabel">Ganti Dokumen KTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="custom-file">
                        <input type="file" name="ktp" class="custom-file-input" id="ktp">
                        <label class="custom-file-label" for="ktp" id="ktp-label">Choose file</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- KK Modal -->
<div class="modal fade" id="kkModal" tabindex="-1" aria-labelledby="kkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('profil.edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="kkModalLabel">Ganti Dokumen KK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="custom-file">
                        <input type="file" name="kk" class="custom-file-input" id="kk">
                        <label class="custom-file-label" for="kk" id="kk-label">Choose file</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('input[type=file][name=ktp]').change(function(e) {
            var fileName = e.target.files[0].name;
            $('#ktp-label').html(fileName);
        })
        $('input[type=file][name=kk]').change(function(e) {
            var fileName = e.target.files[0].name;
            $('#kk-label').html(fileName);
        })
        $('.btn-close').click(function() {
            $('.alert').alert('close');
        })
    })
</script>
@endsection