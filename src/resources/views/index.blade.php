@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>Contact</h2>
      </div>

      <form class="form" action="/confirm" method="post">
      @csrf
       <!-- 名前 -->
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="from__input">
                <div class="form__input--text-name">
                    <input class="form__input--text-first" type="text" name="first_name" placeholder="例　山田" value="{{ old('first_name') }}"/>
                </div>
                <div class="form__input--text-name">
                    <input class="form__input--text-last" type="text" name="last_name" placeholder="例　太郎" value="{{ old('last_name') }}" />
                </div>
            </div>
            <div class="form__error">
              @error('first_name')
               {{ $message }}
              @enderror
              @error('last_name')
               {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <!-- 性別 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="from__input">
                    <div class="form__input--check">
                        <input class="form__input--checkbox" type="checkbox" name="gender" id="gender1" value="男性" checked="checked" />
                        <label for="gender1">男性</label>
                    </div>
                    <div class="form__input--check">
                        <input class="form__input--checkbox" type="checkbox" name="gender" id="gender2"
                        value="女性" />
                        <label for="gender2">女性</label>
                    </div>
                    <div class="form__input--check">
                        <input class="form__input--checkbox" type="checkbox" name="gender" id="gender3"
                        value="その他" />
                        <label for="gender3">その他</label>
                    </div>
                </div>
            </div>
            <div class="form__error">
              <div class="form__error">
              @error('gender')
               {{ $message }}
              @enderror
            </div>
            </div>
          </div>

        <!-- メールアドレス -->
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
                <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}"/>
            </div>
            <div class="form__error">
              @error('email')
               {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <!-- 電話番号 -->
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text-tel">
                  <input class="form__input--text-input" type="tel" name="tel1" placeholder=080 value="{{ old('tel1') }}"/>&nbsp; - &nbsp;
                  <input class="form__input--text-input" type="tel" name="tel2" placeholder=1234 value="{{ old('tel2') }}" />&nbsp; - &nbsp;
                  <input class="form__input--text-input" type="tel" name="tel3" placeholder=5678 value="{{ old('tel3') }}"/>
            </div>
            <div class="form__error">
              @error('tel1')
               {{ $message }}
              @enderror
              @error('tel2')
               {{ $message }}
              @enderror
              @error('tel3')
               {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <!-- 住所 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例　東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
                </div>
            </div>
            <div class="form__error">
              @error('address')
               {{ $message }}
              @enderror
            </div>
        </div>

        <!-- 建物名 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例　千駄ヶ谷マンション101" value="{{ old('building') }}"/>
                </div>
            </div>
        </div>

        <!-- お問い合わせ種類 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
              <div class="form-select">
                <select class="search-form__item-select" name="category_id">
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="form__error">
              @error('category_id')
               {{ $message }}
              @enderror
            </div>
        </div>

        <!-- お問合わせ内容 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
              <div class="form__input--textarea">
                  <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" >
                    {{ old('detail') }}
                  </textarea>
              </div>
              <div class="form__error">
              @error('detail')
               {{ $message }}
              @enderror
              </div>
            </div>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
@endsection
