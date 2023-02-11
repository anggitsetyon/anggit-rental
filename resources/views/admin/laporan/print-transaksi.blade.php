<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    </head>
    <body>
        <div class="text-center mb-4">
            <span><b>LAPORAN TRANSAKSI {{ strtoupper(env('APP_NAME')) }}</b></span></br>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mobil</th>
                    <th>Durasi Sewa</th>
                    <th>Tambahan</th>
                    <th>Total Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @php
                    function days_between($date1, $date2) {
                        $datetime1 = new DateTime($date1);
                        $datetime2 = new DateTime($date2);
                        $interval = $datetime1->diff($datetime2);
                        return $interval->format('%a');
                    }
                    $no = 1;
                    $subtotal = 0;
                @endphp
                @foreach ($transaksi as $item)
                <tr>
                    @php
                        $hari = days_between($item->pesanan->tgl_sewa, $item->pesanan->tgl_kembali) + 1;
                        $total = 0;
                        $total = $hari * $item->pesanan->mobil->harga;
                        if($item->pesanan->tambahan == 'Ya'){
                            $total = $total + env('HARGA_SOPIR');
                        }
                        $subtotal += $total;
                    @endphp
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->pesanan->mobil->nama_mobil }}</td>
                    <td>{{ $hari }} Hari</td>
                    <td>
                        @if ($item->tambahan == 'Ya')
                        Tambah Supir
                        @else
                        -
                        @endif
                    </td>
                    <td>Rp. {{ number_format($total, 0, 0, '.') }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="text-right">Total</td>
                    <td>Rp. {{ number_format($subtotal, 0, 0, '.') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="row mt-5">
            <div class="col-6 text-center">
                
            </div>
            <div class="col-6 text-center">
                <P>Sleman, <span>{{ Carbon\Carbon::today()->format('d F Y') }}</span></P>
                <br>
                <br>
                <span>Admin {{ env('APP_NAME') }}</span></br>
            </div>
        </div>

        <script>
            window.print()
        </script>

        <style type="text/css" media="print">
            @page { 
                size: landscape;
            }
        </style>
    </body>
</html>