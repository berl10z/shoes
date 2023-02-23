@extends('layouts.app')
@section('title', 'Каталог')
@section('content')
    <section class="catalog pt-5">
        <h2 class="title">Каталог</h2>
        <div class="catalog-items pt-5">
            @foreach ($products as $p)
            <a href="{{ route('detail',$p->id) }}">
                <div class="catalog-item">
                    <p>{{ $p->name }}</p>
                    <img src="{{ asset('storage/'.$p->image) }}" alt="{{ $p->name }}" style="max-width: 250px; max-height:250px;">
                </div>
            </a>
        @endforeach
        </div>
    </section>
@endsection
