<!DOCTYPE html>
<html>
<head>
    <title>Scan QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container border border-1 p-3 mt-5">
        <div class="row col-12 col-md-12 justify-content-center">
            <div class="row col-12 col-md-12 justify-content-between mx-auto mb-5">
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
            <h1 class="d-flex justify-content-center">Scan QR Code</h1>
            <div id="reader" style="width: 600px;"></div>
        </div>
    </div>
    <script>
        var qrScanned = false; // Variabel penanda untuk memastikan QR code hanya dipindai sekali
        function onScanSuccess(qrMessage) {
            if (!qrScanned) { // Pastikan QR code belum dipindai sebelumnya
                console.log('Scanned QR Code: ', qrMessage);
                qrScanned = true; // Set variabel penanda menjadi true setelah pemindaian pertama
                $.ajax({
                    url: '/verify-qr',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        qr_code: qrMessage
                    },
                    success: function(response) {
                        const newUrl = '/hasilScan/' + response.user.id;
                        window.location.href = newUrl;
                    },
                    error: function(response) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.responseJSON.message
                        });
                        qrScanned = false; // Set variabel penanda kembali ke false jika terjadi kesalahan
                    }
                });
            }
        }

        function onScanError(errorMessage) {
            console.log('QR Code Scan Error: ', errorMessage);
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 350 });
        html5QrcodeScanner.render(onScanSuccess, onScanError);

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
