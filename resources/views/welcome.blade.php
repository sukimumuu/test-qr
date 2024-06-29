<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form{
            display: flex;
            flex-direction: column;
            gap: 10px
        }
        .form-box{
            display: block;
        }
    </style>
</head>
<body>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="form-box">
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="form-box">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>
        <div class="form-box">
            <label for="">Password</label>
            <input type="password" name="password" id="email">
        </div>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>