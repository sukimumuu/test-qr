<!DOCTYPE html>
<html>
<head>
    <title>Your Registration QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>
<body>
    <div class="container-fluid m-4">
        <h1 class="fw-bold">Hello, {{ $user->name }}</h1>
        <div class="row">
            <span class="text-secondary">Anda telah berhasil mendaftar pada FunRun Rotary 2024 dengan pembayaran menggunakan Gopay</span>
            <span class="text-secondary mb-3">Terima kasih atas pembayaran Anda. Ini adalah konfirmasi Anda untuk Maybank Marathon 2024.</span>
            <h2 class="fw-bold mb-3">Tunjukkan email ini pada saat registrasi ulang di event FunRun dan siapkan kartu Identitas (KTP/SIM/Paspor/KITAS) untuk pengambilan Goodiebag Anda</h2>

            <ul class="ms-5">
                <li>Pengambilan GoodieBag: 1 hari sebelum acara</li>
                <li>Hari Acara: 25 Agustus 2024</li>
                <li>Tempat: Alun-alun Purwokerto</li>
            </ul>

            <span class="fs-4">Registrasi Ulang acara</span>
            <ol class="ms-5">
                <li>Peserta FunRun melakukan registrasi ulang pada 1 hari sebelum acara</li>
                <li>Peserta FunRun melakukan verifikasi kepada panitia dengan menujukan barcode yang di berikan setelah pendaftaran</li>
                <li>Peserta FunRun dapat mengambil GoodieBag setelah berhasil melakukan verifikasi</li>
            </ol>

            <span class="fw-bold fs-3 d-flex justify-content-center">Nomor Peserta : {{ $user->participant_number }}</span>

            <ul class="ms-5">
                <li>Tunjukan Barcode ini Saat registrasi ulang dan pengambilan GoodieBag</li>
                <img src="{{ $message->embed('qrcodes/'.$user->id.'.png') }}" style="width: 200px;" alt="">
            </ul>

            <div class="row col-12 col-md-12">
                <div class="col-10 col-md-10 d-flex justify-content-end">
                    <span class="fw-bold">Total Pendaftaran</span>
                </div>
                <div class="col-2 col-md-2 d-flex justify-content-start">
                    <span class="fw-bold">Rp.150.000,00</span>
                </div>
                <div class="border-2 border-bottom mb-2"></div>
                <div class="col-10 col-md-10 d-flex justify-content-end">
                    <span class="fw-bold">Total Pendaftaran</span>
                </div>
                <div class="col-2 col-md-2 d-flex justify-content-start">
                    <span class="fw-bold">Rp.150.000,00</span>
                </div>
                <div class="border-2 border-bottom mb-2"></div>
                <div class="col-10 col-md-10 d-flex justify-content-end">
                    <span class="fw-bold">Total</span>
                </div>
                <div class="col-2 col-md-2 d-flex justify-content-start">
                    <span class="fw-bold">Rp.150.000,00</span>
                </div>
                <div class="border-2 border-bottom"></div>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
