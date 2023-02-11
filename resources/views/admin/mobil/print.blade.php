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
            <span><b>DAFTAR MOBIL {{ strtoupper(env('APP_NAME')) }}</b></span></br>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mobil</th>
                    <th>Kategori</th>
                    <th>Merk Mobil</th>
                    <th>Stok</th>
                    <th>Harga Sewa</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($mobil as $item)
                    <tr>
                        <td>{{ $no++; }}</td>
                        <td>{{ $item->nama_mobil }}</td>
                        <td>{{ $item->kategori }}</td>
                        <td>{{ $item->merk }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>Rp. {{ number_format($item->harga, 0, 0, '.') }}</td>
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