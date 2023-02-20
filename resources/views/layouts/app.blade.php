<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="favicon" href="{{ asset('favicon.ico') }}">
    <title>Shoes</title>
</head>
<body>
    <header>
        <nav>
            <ul class="nav-menu">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link"><img style="width:150px; border-radius:25%" src="{{ asset('images/logo.png') }}" alt=""></a></li>
                <li class="nav-item"><a class="nav-link" href="">О нас</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('catalog') }}">Каталог</a></li>
                <li class="nav-item"><a class="nav-link" href="">Регистрация</a></li>
                <li class="nav-item"><a class="nav-link" href="">Авторизация</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
</body>
</html>
