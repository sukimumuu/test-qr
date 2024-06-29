<!DOCTYPE html>
<html>
<head>
    <title>Scan QR Code</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.8/html5-qrcode.min.js" integrity="sha512-r6rDA7W6ZeQhvl8S7yRVQUKVHdexq+GAlNkNNqVC7YyIV+NwqCTJe2hDWCiffTyRNOeGEzRRJ9ifvRm/HCzGYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <h1>Scan QR Code</h1>
    <div id="reader" style="width: 600px;"></div>
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
</body>
</html>
