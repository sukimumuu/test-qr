<!DOCTYPE html>
<html>
<head>
    <title>Your Registration QR Code</title>
</head>
<body>
    <h1>Hello, {{ $user->name }}</h1>
    <p>Thank you for registering. Please find your QR code attached to this email.</p>
    <img src="{{ asset('qrcodes/'.$user->id) }}" alt="">
</body>
</html>
