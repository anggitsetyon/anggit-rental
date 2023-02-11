@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 stretch-card mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Pesanan&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor">Detail</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row col-12">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Status Pesanan</h4>
                            <div class="media">
                                @if ($pesanan->status == 'menunggu')
                                <i class="mdi mdi-brightness-1 icon-sm text-warning d-flex align-self-center mr-3"></i>
                                <div class="media-body">
                                  <p class="card-text">Menunggu Konfirmasi</p>
                                </div>
                                @elseif ($pesanan->status == 'terima')
                                <i class="mdi mdi-brightness-1 icon-sm text-success d-flex align-self-center mr-3"></i>
                                <div class="media-body">
                                  <p class="card-text">Telah Diterima</p>
                                </div>
                                @elseif ($pesanan->status == 'tolak')
                                <i class="mdi mdi-brightness-1 icon-sm text-danger d-flex align-self-center mr-3"></i>
                                <div class="media-body">
                                  <p class="card-text">Ditolak</p>
                                </div>
                                @endif
                            </div>
                          </div>
                        </div>
                    </div>  
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Nama Mobil</h4>
                            <div class="media">
                              <i class="mdi mdi-car icon-md text-info d-flex align-self-start mr-3"></i>
                              <div class="media-body">
                                <p class="card-text">{{ $pesanan->mobil->nama_mobil }}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Stok Mobil</h4>
                            <div class="media">
                              <i class="mdi mdi-bank icon-md text-info d-flex align-self-start mr-3"></i>
                              <div class="media-body">
                                <p class="card-text">{{ $pesanan->mobil->stok }} Buah</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Harga Mobil</h4>
                            <div class="media">
                              <i class="mdi mdi-currency-usd icon-md text-info d-flex align-self-start mr-3"></i>
                              <div class="media-body">
                                <p class="card-text">Rp. {{ number_format($pesanan->mobil->harga,0,0,'.') }}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Nama Penyewa</h4>
                            <div class="media">
                              <i class="mdi mdi-account icon-md text-info d-flex align-self-start mr-3"></i>
                              <div class="media-body">
                                <p class="card-text">{{ $pesanan->user->name }}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Email Penyewa</h4>
                            <div class="media">
                              <i class="mdi mdi-email icon-md text-info d-flex align-self-start mr-3"></i>
                              <div class="media-body">
                                <p class="card-text">{{ $pesanan->user->email }}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Telepon Penyewa</h4>
                            <div class="media">
                              <i class="mdi mdi-phone icon-md text-info d-flex align-self-start mr-3"></i>
                              <div class="media-body">
                                <p class="card-text">{{ $pesanan->user->hp }}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Alamat Penyewa</h4>
                            <div class="media">
                              <i class="mdi mdi-map icon-md text-info d-flex align-self-start mr-3"></i>
                              <div class="media-body">
                                <p class="card-text">{{ $pesanan->user->alamat }}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">KTP Penyewa</h4>
                            <div class="media">
                              <i class="mdi mdi-account-card-details icon-md text-info d-flex align-self-center mr-3"></i>
                              <div class="media-body">
                                <p class="card-text">
                                    <img src="{{ asset($pesanan->user->ktp) }}" alt="" class="w-75">
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">KK Penyewa</h4>
                            <div class="media">
                              <i class="mdi mdi-account-card-details icon-md text-info d-flex align-self-center mr-3"></i>
                              <div class="media-body">
                                <p class="card-text">
                                    <img src="{{ asset($pesanan->user->kk) }}" alt="" class="w-75">
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Waktu Penyewaan</h4>
                            <div class="media">
                              <i class="mdi mdi-calendar icon-md text-info d-flex align-self-center mr-3"></i>
                              <div class="media-body">
                                <p class="card-text" style="font-weight: 500">
                                    @php
                                        function days_between($date1, $date2) {
                                            $datetime1 = new DateTime($date1);
                                            $datetime2 = new DateTime($date2);
                                            $interval = $datetime1->diff($datetime2);
                                            return $interval->format('%a');
                                        }
                                        echo days_between($pesanan->tgl_sewa, $pesanan->tgl_kembali) + 1 . ' Hari';
                                    @endphp    
                                </p>
                                <p class="card-text">
                                    {{ Carbon\Carbon::parse($pesanan->tgl_sewa)->format('d M Y') }} - {{ Carbon\Carbon::parse($pesanan->tgl_kembali)->format('d M Y') }}
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>    
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Tambahan Sopir</h4>
                            <div class="media">
                              <i class="mdi mdi-seat-recline-normal icon-md text-info d-flex align-self-center mr-3"></i>
                              <div class="media-body">
                                <p class="card-text">
                                    @if ($pesanan->tambahan == 'Ya')
                                    Tambah Sopir
                                    @else
                                    Tidak Tambah Sopir
                                    @endif
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>      
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Total Pembayaran</h4>
                            <div class="media">
                              <i class="mdi mdi-calculator icon-md text-info d-flex align-self-start mr-3"></i>
                              <div class="media-body">
                                <div class="card-text" style="font-weight: 500; font-size: 20px;">
                                    @php
                                        $total = 0;
                                        $total = (days_between($pesanan->tgl_sewa, $pesanan->tgl_kembali) + 1) * $pesanan->mobil->harga;
                                        if($pesanan->tambahan == 'Ya'){
                                            $total = $total + env('HARGA_SOPIR');
                                        }
                                        echo 'Rp. ' . number_format($total, 0, 0, '.');
                                    @endphp
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>      
                    <div class="col-md-12 d-flex">
                        <div class="w-100">
                          @if ($pesanan->status == 'terima')
                          <a href="#" class="w-100 btn btn-success">Terima</a>
                          @else
                          <a href="{{ route('admin.pesanan.terima', ['id' => $pesanan->id]) }}" class="w-100 btn btn-success">Terima</a>
                          @endif
                        </div>
                        <div class="mx-2"></div>
                        <div class="w-100">
                          @if ($pesanan->status == 'tolak')
                          <a href="#" class="w-100 btn btn-danger">Tolak</a>
                          @else
                          <a href="{{ route('admin.pesanan.tolak', ['id' => $pesanan->id]) }}" class="w-100 btn btn-danger">Tolak</a>
                          @endif
                        </div>
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function cetak() {
        open("{{ route('admin.mobil.cetak') }}");
    }
</script>
@endsection