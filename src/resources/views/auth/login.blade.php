@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

@section('header')
  <li class="header-nav__item">
    <a class="header-nav__item-register" href="/register">
      register
    </a>
  </li>
@endsection

  <div class="login-form__content">
  <div class="login-form__heading">
    <h3>Login</h3>
  </div>

    <form class="login-form" action="/login" method="post">
    @csrf

      <!-- メールアドレス -->
      <div class="form__group">
        <div class="form__group-title">
          <span class="form__label--item">メールアドレス</span>
        </div>
        <div class="form__group-content">
          <div class="form__input--text">
            <input type="email" name="email" value="{{ old('email') }}" />
          </div>
          <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
          </div>
        </div>
      </div>

        <!-- パスワード -->
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">パスワード</span>
          </div>
          <div class="form__group-content">
              <div class="form__input--text">
                <input type="password" name="password" />
              </div>
              <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
              </div>
          </div>
        </div>

        <!-- ログインボタン -->
          <div class="form__button">
            <button class="form__button-submit" type="submit">ログイン</button>
          </div>
    </form>
  </div>
@endsection
