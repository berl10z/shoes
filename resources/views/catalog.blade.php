@extends('layouts.app')

@section('content')
    <section class="catalog">
        <h2 class="title">Каталог</h2>
        <div class="catalog-items">
            @foreach ($products as $p)
            <div class="catalog-item">
                <p>{{ $p->name }}</p>
                <img src="{{ $p->image }}" alt="">
            </div>
        @endforeach
        </div>
    </section>
@endsection
