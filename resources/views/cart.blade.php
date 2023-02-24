@extends('layouts.app')
@section('title', 'Корзина')
@section('content')
@if(!$products)
    <div class="alert alert-danger d-flex col-3">
        <p class="text-center">Your cart is empty.</p>
    </div>
@else
<table class="table">
    <thead>
        <tr>
            <th>Имя</th>
            <th>Изображение</th>
            <th>Цена</th>
            <th>Кол-во</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p_id => $p)
            <tr>
                <td>{{ $p['product']['name'] }}</td>
                <td><img src="{{ asset('storage/'.$p['product']['image']) }}" alt="{{ $p['product']['name'] }}" style="max-width: 250px; max-height:250px;"></td>
                <td>{{ $p['product']['price'] }}</td>
                <td>{{ $p['qty'] }}</td>
                <td><a href="{{ route('deleteFromCart',$p['product']['id']) }}" class="btn btn-danger">Удалить</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endif
@endsection
