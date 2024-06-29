<!DOCTYPE html>
<html>
<head>
    <title>Scan QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset/css/main.css') }}">
</head>
<body>
    <div class="container border border-1 p-3 mt-5">
        <div class="row col-12 col-md-12 justify-content-center">
            <h1 class="d-flex justify-content-center">Scan QR Code</h1>
            <div id="reader" style="width: 600px;"></div>
        </div>
    </div>
    <script>
        function onScanSuccess(qrMessage) {
            console.log('Scanned QR Code: ', qrMessage); // Tambahkan log untuk melihat hasil scan
            $.ajax({
                url: '/verify-qr',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    qr_code: qrMessage
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(response) {
                    alert('Error: ' + response.responseJSON.message);
                }
            });
        }

        function onScanError(errorMessage) {
            console.log('QR Code Scan Error: ', errorMessage);
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
