<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="loginbox">
        <img src="{{ asset('img/pic2.jpeg') }}" alt="avater" class="avater">
        <h1>Login here</h1>
        <form action="{{ route('login.user') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Email</label>
            <input type="email" placeholder="Enter Your Email" name="email" class="text">
            <label for="name" id="password">Password</label>
            <input type="password" placeholder="Enter Your Password" name="password" class="password">
            <input type="submit" value="login" class="submit">
            <a href="#">Lost Your Password ?</a> |
            <a href="{{ route('register') }}">Don't have an Account ?</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
