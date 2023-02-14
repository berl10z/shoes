<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="favicon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title','Главная')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav>
            <ul class="nav_menu">
                <li class="nav_item"><a href="{{ route('home') }}" class="nav_link"><img style="width:150px; border-radius:25%" src="{{ asset('images/logo.png') }}" alt=""></a></li>
                <form class="d-flex" method="get" action="{{route('search')}}">
                    <button class="btn" type="submit"><img class="nav_img" src="{{ asset('images/header/search-svgrepo-com.svg') }}" alt=""></button>
                    <input class="form-control @error('search') is-invalid @enderror" type="search" name="search" id="">
                </form>
                @guest()
                    <li class="nav_item"><a class="nav_link" href="{{ route('registerShow') }}">Регистрация </a><a class="nav_link" href="{{ route('loginShow') }}">/ Авторизация</a></li>
                @endguest
                <li class="nav_item">
                    <div class="dropdown">
                    <a class="nav_link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Разделы сайта
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('cartPage') }}">Корзина</a></li>
                      <li><a class="dropdown-item" href="{{ route('catalog') }}">Продукция и услуги</a></li>
                      <li><a class="dropdown-item" href="{{ route('standarts')}}">Стандарты качества</a></li>
                      <li><a class="dropdown-item" href="#">Клиентам и партнерам</a></li>
                      <li><a class="dropdown-item" href="#">Работа в компании</a></li>
                      <li><a class="dropdown-item" href="{{ route('about') }}">О компании</a></li>
                      <li><a class="dropdown-item" href="{{ route('contacts') }}">Контакты</a></li>
                    </ul>
                  </div>
                </li>
                @if(auth()->check() && auth()->user()->is_admin)
                <li class="nav_item"><a class="nav_link" href="{{ route('admin') }}">Админ-панель</a></li>
                @endif
                @auth
                <li class="nav_item"><a class="nav_link" href="{{ route('logout') }}">Выйти</a></li>
                @endauth
                <li class="nav_item d-flex"><img class="nav_img" src="{{ asset('images/header/russia.svg') }}" alt=""><a href="">RU</a><br><img class="nav_img ms-3" src="{{ asset('images/header/uk.svg') }}" alt=""><a href="">EN</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
            @yield('content')
        </div>
    </main>
    <hr>
    <footer>
        <div class="container pt-3">
            <ul class="footer-ul">
                <li><a href="{{ route('about') }}">О нас</a></li>
                <li><a href="">Основные разделы сайта</a></li>
                <li><a href="">Юридическая информация</a></li>
                <li><a href="">Мы в социальных сетях</a></li>
                <li><a href="{{ route('contacts') }}">Связаться с нами (контакты)</a></li>
            </ul>
        </div>
    </footer>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
</body>
</html>
