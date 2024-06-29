<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form FunRun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>
  <body>

    <section>
        <div class="container">
            <div class="row">
                <div class="card gap-4">
                    <div class="p-3">
                        <div class="row col-12 col-md-12 justify-content-between mx-auto">
                            <div class="col-4 col-md-4">
                                <img src="{{ asset('asset/img/rotary wheel.webp') }}" width="50px" alt="">
                            </div>
                            {{-- <div class="col-4 col-md-4">
                                <span>Bank Indonesia</span>
                            </div> --}}
                            <div class="col-4 col-md-4 d-flex justify-content-end">
                                <img src="{{ asset('asset/img/Logo Nemolab.png') }}" width="50px" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <div class="row">
                            <i class="ri-close-circle-fill d-flex justify-content-center text-danger" style="font-size: 10rem"></i>
                            <h3 class="fw-bold d-flex justify-content-center mb-3">Hii Sobat Lari pembayaran anda belum berhasil, Coba ulangi atau hubungi panitia</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
