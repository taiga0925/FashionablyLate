@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection

@section('content')

@section('header')

@if (Auth::check())
    <form action="/logout" method="post">
      @csrf
      <button class="header-nav__button">logout</button>
    </form>
@endif
@endsection

<div class="content">

    <div class="content-title">
        <h2 class="content-title__heading">Admin</h2>
    </div>

    <div class="content-search">
        <form class="search-form" action="/admin/search" method="get">
            @csrf
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}">

                <div class="search-select">
                <select class="search-form__item-select" name="gender">
                   <option value="0">性別</option>
                   <option value="1">男性</option>
                   <option value="2">女性</option>
                   <option value="3">その他</option>
                </select>
                </div>

                <div class="search-select">
                <select class="search-form__item-select" name="category_id">
                   <option value="">お問い合わせの種類</option>
                   @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                    @endforeach
                </select>
                </div>

                <div class="search-form__item-calendar">
                    <input class="calendar-input"type="date" name="from" placeholder="from_date" value="">
                </div>

                <div class="search-form__button">
                     <button class="search-form__button-submit" type="submit">検索</button>
                </div> 

            </div>
        </form>
        <form action="/admin" method="get">
                <button class="form__button-submit" type="submit">リセット</button>
        </form>
    </div>
    
            @livewire('modal')

@endsection
