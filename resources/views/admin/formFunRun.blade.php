<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form FunRun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset/css/form/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
</head>
  <body>
    <div class="container-fluid funrun-registration">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <a href="" class="btn"><i class="ri-arrow-left-circle-fill" style="font-size: 3.5rem"></i></a>
                        </div>
                        <div class="mt-2">
                            {{-- <img src="{{ asset('asset/img/Logo Nemolab.png') }}" width="80px" alt=""> --}}
                            <span class="fw-bold">Logo FunRun</span>
                        </div>
                    </div>
                    <h3 class="text-center fw-bold mt-3 mb-3">Pendaftaran Event FunRun Rotary <br> Purwokerto 2024</h3>
                    <div class="row col-12 col-md-12 mx-auto">
                        <form action="" method="post">
                            <div class="card p-0 mb-3 gradient-background kaca">
                                <div class="card-header" style="background: transparent; border: none; z-index: 2">
                                    <h3 class="text-dark">Registration</h3>
                                    <span class="border-bottom border-dark border-3 rounded-2" style="width: 120px"></span>
                                </div>
                                <div class="card-body p-0" style="z-index: 2">
                                    <div class="row col-12 col-md-12 mx-auto">
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" name="" placeholder="Nama lengkap" aria-label="">
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Gender</label>
                                                <select id="inputState" class="form-select">
                                                    <option selected>Pilih gender</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Usia</label>
                                                <input type="text" class="form-control" name="" placeholder="Usia">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="" placeholder="masukan email anda">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3 position-relative">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" placeholder="masukan password">
                                                <i class="eye-icon ri-eye-line" id="togglePassword" onclick="togglePassword()"></i>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Provinsi</label>
                                                <select id="inputState" class="form-select">
                                                    <option selected>Pilih provinsi</option>
                                                    <option value="Jawa Tengah">Jawa Tengah</option>
                                                    <option value="Jawa Timur">Jawa Timur</option>
                                                    <option value="Jawa Barat">Jawa Barat</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Kabupaten</label>
                                                <select id="inputState" class="form-select">
                                                    <option selected>Pilih kabupaten</option>
                                                    <option value="Banyumas">Banyumas</option>
                                                    <option value="Purbalingga">Purbalingga</option>
                                                    <option value="Malang">Malang</option>
                                                    <option value="Madura">Madura</option>
                                                    <option value="Bandung">Bandung</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Kecamatan</label>
                                                <select id="inputState" class="form-select">
                                                    <option selected>Pilih kecamatan</option>
                                                    <option value="Purwokerto Utara">Purwokerto Utara</option>
                                                    <option value="Baturaden">Baturaden</option>
                                                    <option value="KaliCupak">KaliCupak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nomor Handphone</label>
                                                <input type="text" class="form-control" name="" placeholder="masukan nomor handphone">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Size Jersey</label>
                                                <select id="inputState" class="form-select">
                                                    <option selected>Pilih size jersey</option>
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                    <option value="XXL">XXL</option>
                                                    <option value="XXXL">XXXL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nomor Kontak Darurat</label>
                                                <input type="text" class="form-control" name="" placeholder="nomor kontak darurat">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Nama Kontak darurat</label>
                                                <input type="text" class="form-control" name="" placeholder="nama kontak darurat">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Hubungan Dengan Kontak Darurat</label>
                                                <input type="text" class="form-control" name="" placeholder="hubungan dengan kontak darurat">
                                            </div>
                                        </div>
                                        <div class="col-12" id="komunitasDiv">
                                            <div class="mb-3">
                                                <label for="komunitas" class="form-label">Komunitas</label>
                                                <select id="komunitas" name="komunitas" class="form-control" onchange="toggleNamaKomunitas()">
                                                    <option value="">Komunitas</option>
                                                    <option value="komunitas">Komunitas</option>
                                                    <option value="individu">Individu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6" id="namaKomunitasContainer" style="display: none;">
                                            <div class="mb-3">
                                                <label for="namaKomunitas">Nama Komunitas</label>
                                                <input type="text" id="namaKomunitas" name="namaKomunitas" class="form-control mt-2" placeholder="nama komunitas">
                                            </div>
                                        </div>
                                        <div class="mb-3 text-end">
                                            <a href="" class="btn btn-submit rounded-5 text-dark fw-bold border-1 border"  data-bs-toggle="modal" data-bs-target="#daftar">Daftar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="daftar" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Anda akan melalukan pembayaran</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <span>Apakah anda setuju untuk melakukan pembayaran ?</span>
                                            <span>click tombol bayar untuk melanjutkan pendaftaran</span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-dark rounded-5 text-dark fw-bold border-1 border" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                            <button type="submit" class="btn btn-submit rounded-5 text-dark fw-bold border-1 border">Bayar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Modal -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleNamaKomunitas() {
            const komunitasSelect = document.getElementById('komunitas');
            const namaKomunitasContainer = document.getElementById('namaKomunitasContainer');
            const komunitasDiv = document.getElementById('komunitasDiv');

            if (komunitasSelect.value === 'komunitas') {
                namaKomunitasContainer.style.display = 'block';
                komunitasDiv.className = 'col-12 col-md-6';
            } else {
                namaKomunitasContainer.style.display = 'none';
                komunitasDiv.className = 'col-12';
            }
        }

        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('togglePassword');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('ri-eye-line');
                eyeIcon.classList.add('ri-eye-off-line');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('ri-eye-off-line');
                eyeIcon.classList.add('ri-eye-line');
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
