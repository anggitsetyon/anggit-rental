<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <title>Nota Rental Mobil</title>
</head>
<body>
    
    <div class="card">
        <div class="card-body">
            <div class="container mb-5 mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8">
                            <h4> AGHNA TRANSPORT </h4>
                            <h6> Jl. Griya Taman ASri, Grojogan, pandowoharjo, Sleman </h6>
                        </div>
                        <div class="col-xl-4">
                            <ul class="list-unstyled">
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="fw-bold">ID:</span>{{ ' INV' . sprintf("%05s", $pesanan->id) }}</li>
                                <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                    class="fw-bold">Tanggal: </span>{{ Carbon\Carbon::parse($pesanan->created_at)->format('d M Y') }}</li>
                            </ul>
                        </div>
                    </div>
            
                    <div class="row my-2 mx-1 justify-content-center">
                        <table class="table table-striped table-borderless">
                            <thead style="background-color:#84B0CA ;" class="text-white">
                                <tr>
                                <th>#</th>
                                <th>Nama Mobil</th>
                                <th>Tanggal Sewa</th>
                                <th>Tanggal Kembali</th>
                                <th>Tambahan</th>
                                <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    function days_between($date1, $date2) {
                                        $datetime1 = new DateTime($date1);
                                        $datetime2 = new DateTime($date2);
                                        $interval = $datetime1->diff($datetime2);
                                        return $interval->format('%a');
                                    }
                                    $no = 1;
                                @endphp
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan->mobil->nama_mobil }}</td>
                                    <td>{{ Carbon\Carbon::parse($pesanan->tgl_sewa)->format('d M Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($pesanan->tgl_kembali)->format('d M Y') }}</td>
                                    <td>

                                        @if ($pesanan->tambahan == 'Ya')
                                        Tambah Supir
                                        @else
                                        -
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $hari = days_between($pesanan->tgl_sewa, $pesanan->tgl_kembali) + 1;
                                            $total = 0;
                                            $total = $hari * $pesanan->mobil->harga;
                                            if($pesanan->tambahan == 'Ya'){
                                                $total = $total + env('HARGA_SOPIR');
                                            }
                                            echo 'Rp. ' . number_format($total, 0, 0, '.');
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Total</td>
                                    <td>Rp. {{ number_format($total, 0, 0, '.'); }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        print()
    </script>

</body>
</html>