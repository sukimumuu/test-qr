<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
</head>
<body>
    <h1>Complete your payment</h1>
    <button id="pay-button">Pay!</button>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="@php env('MIDTRANS_CLIENT_KEY') @endphp"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href = '/pembayaranBerhasil';
                },
                onPending: function(result) {
                    window.location.href = '/pembayaranGagal';
                },
                onError: function(result) {
                    window.location.href = '/pembayaranGagal';
                }
            });
        });
    </script>
</body>
</html>
