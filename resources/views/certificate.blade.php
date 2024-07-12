<!-- resources/views/certificate.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
        }
        .certificate-container {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
        }
        .name {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <img src="{{ public_path('sertif.pdf') }}" alt="Template Sertifikat" style="width: 100%; height: auto;">
        <div class="name">{{ $name }}</div>
    </div>
</body>
</html>
