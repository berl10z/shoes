@extends('layouts.app')
@section('title', 'Обновление продукта')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Обновить продукт</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin') }}"> Назад</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 my-3 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Имя:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Имя">
                </div>
            </div>
            <div class="col-xs-12 my-3 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Картинка: </strong>
                    <br>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
                    <input class="form-control" type="file" name="image" id="">
                </div>
            </div>
            <div class="col-xs-12 my-3 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="mb-3 ">Описание:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="описание">{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 my-3 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="mb-3 ">Количество</strong>
                    <input type="number" min="0" class="form-control" value="{{ $product->count }}" name="count" placeholder="кол-во">
                </div>
            </div>
            <div class="col-xs-12 my-3 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Цена:</strong>
                    <input type="number" min="0" name="price" value="{{ $product->price }}" class="form-control" id="price" required>
                </div>
            </div>
            <div class="col-xs-12 my-3 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong class="mb-3 ">Категория</strong>
                    <select class="form-select" name="category" id="">
                        <option value="0" disabled>Выберите категорию</option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}" @if ($product->category->id == $c->id) selected @endif>{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-5">Обновить продукт</button>
            </div>
        </div>

    </form>
@endsection
