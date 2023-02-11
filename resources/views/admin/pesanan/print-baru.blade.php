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
            <span><b>DAFTAR PESANAN BARU MASUK MOBIL {{ strtoupper(env('APP_NAME')) }}</b></span></br>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penyewa</th>
                    <th>Nama Mobil</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Tambahan</th>
                    <th>Alamat Penyewa</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pesanan as $item)
                <tr>
                    <td>{{ $no++; }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->mobil->nama_mobil }}</td>
                    <td>{{ Carbon\Carbon::parse($item->tgl_sewa)->format('d M Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($item->tgl_kembali)->format('d M Y') }}</td>
                    <td>
                        @if ($item->tambahan == 'Ya')
                        Tambah Supir
                        @else
                        -
                        @endif
                    </td>
                    <td>{{ $item->user->alamat }}</td>
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