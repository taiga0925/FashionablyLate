

<div>
    <div class="buttons">
        <div class="export-btn">
            <button class="export">エクスポート</button>
        </div>
        <div class="paginate">
            {{ $contacts->links('vendor.pagination.topics') }}
        </div>
    </div>

    <div class="contacts">
        <table class="contacts__table">
            <tr class="table-heading">
                <th class="column">お名前</th>
                <th class="column">性別</th>
                <th class="column">メールアドレス</th>
                <th class="column">お問い合わせ種類</th>
                <th class="column"></th>
            </tr>
            @if($showModal)
                    <div class="modal-wrapper">
                        <div class="modal-window">
                            <table class="modal__content">
                                <tr class="modal-inner__button">
                                    <th></th>
                                    <td class="modal-button">
                                        <button wire:click="closeModal()" type="button" class="modal-close">
                                            ✕
                                        </button>
                                    </td>
                                </tr>
                                <tr class="modal-inner">
                                    <th class="modal-ttl">お名前</th>
                                    <td class="modal-data">
                                        
                                        {{ $contact['first_name'] }}
                                        <span class="space"></span>
                                        <span class="lastName">{{ $contact['last_name'] }}</span>
                                    </td>
                                </tr>
                                <tr class="modal-inner">
                                    <th class="modal-ttl">性別</th>
                                    <td class="modal-data">
                                        <input type="hidden" value="{{ $contact['gender'] }}" />
                                        <?php
                                        if ($contact['gender'] == '1') {
                                            echo '男性';
                                        } elseif ($contact['gender'] == '2') {
                                            echo '女性';
                                        } else {
                                            echo 'その他';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr class="modal-inner">
                                    <th class="modal-ttl">メールアドレス</th>
                                    <td class="modal-data">{{ $contact['email'] }}</td>
                                </tr>
                                <tr class="modal-inner">
                                    <th class="modal-ttl">電話番号</th>
                                    <td class="modal-data">{{ $contact['tel'] }}</td>
                                </tr>
                                <tr class="modal-inner">
                                    <th class="modal-ttl">住所</th>
                                    <td class="modal-data">{{ $contact['address'] }}</td>
                                </tr>
                                <tr class="modal-inner">
                                    <th class="modal-ttl">建物名</th>
                                    <td class="modal-data">{{ $contact['building'] }}</td>
                                </tr>
                                <tr class="modal-inner">
                                    <th class="modal-ttl">お問い合わせの種類</th>
                                    <td class="modal-data">{{ $contact['category']['content'] }}</td>
                                </tr>
                                <tr class="modal-inner">
                                    <th class="modal-ttl">お問い合わせ内容</th>
                                    <td class="modal-data">
                                        {{ $contact['detail']}}
                                    </td>
                                </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <form class="delete-form" action="/delete" method="post">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                                        <button class="delete-btn">削除</button>
                                    </form>
                                </td>
                            </tr>
                            </table>
                        </div>
                    </div>
                    @endif
            @foreach($contacts as $contact)
            <tr class="table-inner">
                <td class="name">
                    {{ $contact['first_name'] }}
                    <span class="space"></span>
                    <span class="first">{{ $contact['last_name'] }}</span>
                </td>
                <td class="gender">
                    <input type="hidden" value="{{ $contact['gender'] }}" />
                    <?php
                    if ($contact['gender'] == '1') {
                        echo '男性';
                    } elseif ($contact['gender'] == '2') {
                        echo '女性';
                    } else {
                        echo 'その他';
                    }
                    ?>
                </td>
                <td class="address">
                    {{ $contact['email']}}
                </td>
                <td class="category">
                    {{ $contact['category']['content']}}
                </td>

                <td class="detail-button">
                    <button wire:click="openModal({{ $contact['id'] }})" type="button" class="detail">詳細</button>
                </td>
                @endforeach
                
            </tr>
        </table>
    </div>
</div>