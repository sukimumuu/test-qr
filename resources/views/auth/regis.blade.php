<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form FunRun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset/css/registration/main.css') }}">
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
                    <div class="row col-12 col-md-8 mx-auto">
                        <form action="{{ route('storing-users') }}" method="post">
                            @csrf
                            <div class="card p-0 mb-3 gradient-background kaca">
                                <div class="card-header" style="background: transparent; border: none; z-index: 2">
                                    <h3 class="text-dark">Registration</h3>
                                    <span class="border-bottom border-dark border-3 rounded-2" style="width: 120px"></span>
                                </div>
                                <div class="card-body p-0" style="z-index: 2">
                                    <div class="row col-12 col-md-12 mx-auto">
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="masukan email anda">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3 position-relative">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="masukan password">
                                                <i class="eye-icon ri-eye-line" id="togglePassword" onclick="togglePassword()"></i>
                                            </div>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button type="submit" class="btn btn-submit rounded-5 text-dark fw-bold border-1 border">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('cek') }}" method="post">
                            @csrf
                            <div class="card p-0 mb-3 gradient-background kaca">
                                <div class="card-header" style="background: transparent; border: none; z-index: 2">
                                    <h3 class="text-dark">Login</h3>
                                    <span class="border-bottom border-dark border-3 rounded-2" style="width: 120px"></span>
                                </div>
                                <div class="card-body p-0" style="z-index: 2">
                                    <div class="row col-12 col-md-12 mx-auto">
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="masukan email anda">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3 position-relative">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="masukan password">
                                                <i class="eye-icon ri-eye-line" id="togglePassword" onclick="togglePassword()"></i>
                                            </div>
                                        </div>
                                        <div class="mb-3 text-center">
                                            <button type="submit" class="btn btn-submit rounded-5 text-dark fw-bold border-1 border">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
