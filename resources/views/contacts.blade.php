@extends('layouts.app')
@section('title', 'Контакты')
@section('content')
    <section class="contacts">
        <h2 class="title pt-5">Контакты</h2>
        <ul class="fs-4">
            <li>Адрес: Российская Федерация <img class="nav_img" src="{{ asset('images/header/russia.svg') }}" alt="">, г. Москва, проспект Вернадского,1</li>
            <li>Е-мейл: shoes@mail.ru</li>
            <li>Телефон: +7 (999) 999 999</li>
        </ul>
        </p>
    </section>
@endsection
