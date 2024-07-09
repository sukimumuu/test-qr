<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scan Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ secure_asset('asset/css/hasilScane/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
  <body>
    <div class="container-fluid funrun-registrsation">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12 ">
                    <div class="row col-12 col-md-12 mx-auto ">
                        <div class="card p-3 mb-3 mt-5 gradient-background kaca ">
                            <div class="card-body" style="z-index: 2">
                                <div class="row col-12 col-md-12">
                                    <img src="{{ asset('asset/img/success.png') }}" class="mx-auto" style="width: 200px" alt="">
                                    <h3 class="text-center mt-3 fw-bold fs-2">Sobat lari telah terverifikasi!!</h3>
                                    <span class="mt-3 fw-bold fs-3 text-center mb-2">Nomor Peserta : {{ $user->participant_numberssa }}</span>
                                    <div class="table-responsive d-flex justify-content-center mx-auto">
                                        <table class="table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th>Nama</th>
                                                    <td>: {{ $user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Jenis Kelamin</th>
                                                    <td>: {{ $user->gender }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>: {{ $user->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Domisili</th>
                                                    <td>: {{ $user->domisili }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Size Jersey</th>
                                                    <td>: {{ $user->size }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Waktu Pembayaran</th>
                                                    <td>: {{ $user->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Via Pembayaran</th>
                                                    <td>: Gopay</td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>: 150.000</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>: {{ $user->status }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
