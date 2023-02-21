@extends('layouts.app')

@section('content')
  <div class="container pt">
    <div class="row">
      <div class="col-md-4">
        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="img-fluid">
      </div>
      <div class="col-md-8">
        <h1 class="mb-3">{{ $product->name }}</h1>
        <p>{{ $product->desc }}</p>
        <button type="submit"><a href="{{ route('destroy',$product->id) }}">Удалить</a></button>
      </div>
    </div>
  </div>
@endsection
