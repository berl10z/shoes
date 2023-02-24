@extends('layouts.app')
@section('title', 'Каталог')
@section('content')
    <section class="catalog pt-5">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h2 class="title">Каталог</h2>
        <div class="catalog-items d-flex justify-content-evenly pt-5">
            @forelse ($products as $p)
                <a href="{{ route('detail', $p->id) }}">
                    <div class="catalog-item card">
                        <div class="card-body d-flex flex-column">
                            <p>Имя: {{ $p->name }}</p>
                            <p>Цена: {{ $p->price }}</p>
                            <img src="{{ asset('storage/' . $p->image) }}" alt="{{ $p->name }}"
                                style="max-width: 250px; max-height:250px;">
                            <a class="mt-2 btn btn-primary text-center" href="{{ route('addToCart', $p->id) }}">В корзину</a>
                        </div>
                    </div>
                </a>
            @empty
                <div class="alert alert-danger text-center">Нет товаров данной категории</div>
            @endforelse
        </div>
    </section>
@endsection
