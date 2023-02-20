@extends('layouts.app')


@section('content')
<h2 class="title">Новинки</h2>
<div class="latest-products">
    @foreach ($products as $p)
        <div class="latest-product">
            <p>{{ $p->name }}</p>
            <img src="{{ $p->image }}" alt="">
        </div>
    @endforeach
</div>
@endsection

