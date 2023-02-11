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
            <span><b>LAPORAN PENGEMBALIAN MOBIL {{ strtoupper(env('APP_NAME')) }}</b></span></br>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mobil</th>
                    <th>Tangal Sewa</th>
                    <th>Tangal Kembali</th>
                    <th>Nama Penyewa</th>
                    <th>No HP Penyewa</th>
                    <th>Alamat Penyewa</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pengembalian as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->pesanan->mobil->nama_mobil }}</td>
                    <td>{{ Carbon\Carbon::parse($item->pesanan->tgl_sewa)->format('d M Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($item->pesanan->tgl_kembali)->format('d M Y') }}</td>
                    <td>{{ $item->pesanan->user->name }}</td>
                    <td>{{ $item->pesanan->user->hp }}</td>
                    <td>{{ $item->pesanan->user->alamat }}</td>
                </tr>
                @endforeach
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