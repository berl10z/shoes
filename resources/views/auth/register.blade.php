@extends('layouts.app')
@section('title','Регистрация')

@section('content')
<h2 class="title">Регистрация</h2>
<section class="registerForm">
    <div class="d-flex justify-content-center">
        <div class="col-lg-4">
            <form method="POST" action="{{ route('register_process') }}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Емейл</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Пароль</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Подтвердите пароль</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                  </div>
                <div class="mb-3 form-check">
                  <input required type="checkbox" name="rules" class="form-check-input">
                  <label class="form-check-label" for="exampleCheck1"><a href="#">Согласие на обработку персональных данных</a></label>
                </div>
                <button type="submit" class="btn me-3 btn-success">Зарегистрироваться</button>
                <a class="btn btn-primary text-white" href="#">Уже зарегистрированы?</a>
            </form>
        </div>
    </div>
</section>

@endsection
