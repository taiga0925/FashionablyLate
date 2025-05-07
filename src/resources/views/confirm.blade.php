@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
      <div class="confirm__heading">
        <h2>Confirm</h2>
      </div>
      <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">

            <!-- お名前 -->
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                <div class="confirm-table__text-name">
                  <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                  <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                </div>
              </td>
            </tr>

            <!-- 性別 -->
             <tr class="confirm-table__row">
              <th class="confirm-table__header">性別</th>
              <td class="confirm-table__text">
                <input type="text" name="gender_item" value="{{ $contact['gender'] }} " readonly />
                @if($contact['gender'] == "男性")
                <input type="hidden" name="gender" value="1" />
                @elseif($contact['gender'] == "女性")
                <input type="hidden" name="gender" value="2" />
                @elseif($contact['gender'] == "その他")
                <input type="hidden" name="gender" value="3" />
                @endif
              </td>
            </tr>

            <!-- メールアドレス -->
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
              </td>
            </tr>

            <!-- 電話番号 -->
            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>
              <td class="confirm-table__text">
                <input type="tel" name="tel" value="{{ $tel }}" readonly />
              </td>
            </tr>

            <!-- 住所 -->
            <tr class="confirm-table__row">
              <th class="confirm-table__header">住所</th>
              <td class="confirm-table__text">
                <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
              </td>
            </tr>

            <!-- 建物名 -->
            <tr class="confirm-table__row">
              <th class="confirm-table__header">建物名</th>
              <td class="confirm-table__text">
                <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
              </td>
            </tr>

          
            <!-- お問い合わせ内容の種類 -->
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせの種類</th>
              <td class="confirm-table__text">
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" />
                @if($contact['category_id'] == "1")
                <input type="text" name="category" value="商品のお届けについて" readonly />
                @elseif($contact['category_id'] == "2")
                <input type="text" name="category" value="商品の交換について" readonly />
                @elseif($contact['category_id'] == "3")
                <input type="text" name="category" value="商品トラブル" readonly />
                @elseif($contact['category_id'] == "4")
                <input type="text" name="category" value="ショップへのお問い合わせ" readonly />
                @elseif($contact['category_id'] == "5")
                <input type="text" name="category" value="その他" readonly />
                @endif
              </td>
            </tr>

             <!-- お問い合わせ内容 -->
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
                <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
              </td>
            </tr>
          </table>
        </div>

        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
          <div class="correction__link">
            <a class="correction__button-submit" href="/">修正</a>
          </div>
        </div>
      </form>
    </div>
@endsection