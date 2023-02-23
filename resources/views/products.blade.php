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
        <div class="catalog-items pt-5">
            @forelse ($products as $p)
            <a href="{{ route('detail',$p->id) }}">
                <div class="catalog-item">
                    <p>{{ $p->name }}</p>
                    <img src="{{ asset('storage/'.$p->image) }}" alt="{{ $p->name }}" style="max-width: 250px; max-height:250px;">
                    <a href="{{ route('addToCart',$p->id) }}">В корзину</a>
                </div>
            </a>
            @empty
                <div class="alert alert-danger text-center">Нет товаров данной категории</div>
            @endforelse
        </div>
    </section>
@endsection
