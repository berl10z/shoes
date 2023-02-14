@extends('layouts.app')


@section('content')

<div class="video-wrapper">
    <video autoplay muted loop id="video">
        <source src="{{ asset('video.mp4') }}" type="video/mp4">
    </video>
</div>
<section class="about-company">
    <h2 class="title pt-5">О компании</h2>
    <p class="text-start fs-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore optio rem iusto doloremque, obcaecati amet, necessitatibus fuga voluptatum cupiditate quisquam reiciendis expedita quas, quaerat magni earum possimus ab autem. Cumque?
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore optio rem iusto doloremque, obcaecati amet, necessitatibus fuga voluptatum cupiditate quisquam reiciendis expedita quas, quaerat magni earum possimus ab autem. Cumque?
    </p>
</section>
<section class="types-of-shoes">
    <h2 class="title">Виды обуви</h2>
    <div class="d-flex justify-content-center">
        <div class="type-of-shoes-item">
            <img src="{{ asset('images/types-of-shoes.jpg') }}" alt="">
        </div>
    </div>
</section>
<section class="clients mb-5">
    <h2 class="title pt-5">Наши клиенты</h2>
    <div class="d-flex justify-content-evenly pt-5">
        <img style="width:150px" src="{{ asset('images/clients/Logo_NIKE.svg') }}" alt="">
        <img style="width:150px" src="{{ asset('images/clients/Adidas_Logo.svg') }}" alt="">
        <img style="width:150px" src="{{ asset('images/clients/Reebok_red_logo.svg.png') }}" alt="">
    </div>
</section>
@endsection

