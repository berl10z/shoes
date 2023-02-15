@extends('layouts.app')
@section('title', 'Каталог')
@section('content')
    @if ($categories->count())
        <div class="row justify-content-evenly">
            @foreach ($categories as $c)
                <div class="col-4 text-center">
                    <a href="{{ route('products', $c->slug) }}">
                        <div class="card">
                            <div class="card-body">
                                {{ $c->name }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    @endif
@endsection
