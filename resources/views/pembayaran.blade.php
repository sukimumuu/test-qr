  <h1>Complete your payment</h1>
    @if(isset($snapToken))
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="@php env('MIDTRANS_CLIENT_KEY') @endphp"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                snap.pay('{{ $snapToken }}', {
                    onSuccess: function(result) {
                        window.location.href = '/registration-success';
                    },
                    onPending: function(result) {
                        window.location.href = '/registration-failed';
                    },
                    onError: function(result) {
                        window.location.href = '/registration-failed';
                    }
                });
            });
        </script>
    @else
        <p>Payment cannot be processed at this moment. Please try again later.</p>
    @endif