<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form FunRun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <section>
        <div class="container">
            <div class="row">
                <div class="card gap-4">
                    <div class="p-3">
                        <div class="row col-12 col-md-12">
                            <div class="col-4 col-md-4">
                                <span>Rotary Purwokerto</span>
                            </div>
                            <div class="col-4 col-md-4">
                                <span>Bank Indonesia</span>
                            </div>
                            <div class="col-4 col-md-4">
                                <span>Nemolab</span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
        <div class="error-summary">
            <h4>There are errors in the form:</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            <ul>
        </div>
    @endif
                    <div class="card-content">
                        <div class="row">
                            <img src="{{ asset('asset/img/vindra.jpeg') }}" class="mx-auto" style="width: 150px" alt="">
                            <h3 class="fw-bold d-flex justify-content-center mb-3">Hello Sobat lari Selamat datang di FunRun Rotary</h3>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="row col-12 col-md-12">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" id="" placeholder="Masukan Nama Anda">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Gender</label>
                                        <select id="inputState" class="form-select" name="gender">
                                            <option selected>Pilih gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                          </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="" placeholder="Masukan Email Anda">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="" placeholder="Masukan Password Anda">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Provinsi</label>
                                        <select id="inputState" class="form-select" name="domisili">
                                            <option selected>Pilih Provinsi</option>
                                            <option value="jateng">Jawa Tengah</option>
                                            <option value="jatim">Jawa Timur</option>
                                          </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Kabupaten</label>
                                        <select id="inputState" class="form-select" name="distrik">
                                            <option selected>Pilih Kabupaten</option>
                                            <option value="banyumas">Banyumas</option>
                                            <option value="purbalingga">Purbalingga</option>
                                            <option value="surabaya">Surabaya</option>
                                            <option value="malang">Malang</option>
                                          </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Kecamatan</label>
                                        <select id="inputState" class="form-select" name="kecamatan">
                                            <option selected>Pilih Kecamatan</option>
                                            <option value="purwokerto">Purwokerto</option>
                                            <option value="kalicupak">Kalicupak</option>
                                          </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nomor HP</label>
                                        <input type="text" class="form-control" name="phone" id="" placeholder="Masukan Nomor HP Anda">
                                        <span class="text-secondary">*Optional</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Size Jersey</label>
                                        <select id="inputState" class="form-select" name="size">
                                            <option selected>Pilih Size</option>
                                            <option value="s">S</option>
                                            <option value="m">M</option>
                                            <option value="l">L</option>
                                            <option value="xl">XL</option>
                                            <option value="xxl">XXL</option>
                                            <option value="xxxl">XXXL</option>
                                          </select>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-center">
                                        <a href=""><button class="btn btn-primary" type="submit">Daftar</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
