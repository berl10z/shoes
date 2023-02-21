@extends('layouts.app')
@section('title','Авторизация')

@section('content')
<h2 class="title">Авторизация</h2>
<div class="d-flex justify-content-center">
    <div class="col-lg-4">
        <form method="POST" action="{{ route('login_process') }}">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Емейл</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Пароль</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn me-3 btn-success">Войти</button>
            <a class="btn btn-primary text-white" href="#">Уже зарегистрированы?</a>
        </form>
    </div>
</div>
@endsection
