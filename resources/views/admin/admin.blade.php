@extends('layouts.app')
@section('title', 'Админ-панель')
@section('content')
<section class="admin-panel">
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Продукт</th>
                <th>Имя</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @foreach($products as $product)
            <tr>
                <td>
                    <div class="media">
                        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                    </div>
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name}}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->count }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('detail',$product->id) }}" class="btn btn-primary">Подробнее</a>
                    <a href="{{ route('edit',$product->id) }}" class="btn btn-secondary">Изменить</a>
                    <a href="{{ route('destroy',$product->id) }}" type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Удалить</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-success" href="{{ route('create') }}">Добавить продукт</a>
</section>
@endsection
