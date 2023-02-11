<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Daftar | {{ env('APP_NAME') }}</title>
</head>
<body>
    <div class="vh-100 vw-100" style="overflow: hidden">
        <div class="row">
            <div class="col-4 d-flex align-items-center justify-content-center">
                <form action="" method="post" class="w-100 px-4">
                    @csrf
                    <h1 class="mb-3 text-center">DAFTAR</h1>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nama">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                    </div>
                    <button type="submit" class="w-100 btn btn-primary">Daftar</button>
                    <div class="d-flex justify-content-center mt-3">
                        <span>Sudah ada akun?</span>
                        <div class="px-1"></div>
                        <a href="{{ route('login') }}">Masuk</a>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <img src="{{ asset('images/car-1.png') }}" alt="" class="w-100 vh-100">
            </div>
        </div>
    </div>
</body>
</html>