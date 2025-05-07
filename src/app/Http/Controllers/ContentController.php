<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

/**
 * 入力データ管理クラス
 */
class ContentController extends Controller
{
    /**
     * お問い合わせ画面
     * @return view ビュー
     */
    public function confirm(ContactRequest $request)
    {

        $content = $request->only(['tel1', 'tel2', 'tel3']);
        $tel = implode($content);

        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        return view('confirm', compact('tel', 'contact'));
    }

    /**
     * お問い合わせ内容確認画面
     * @return view ビュー
     */
    public function store(Request $request)
    {
        
        $contact = $request->only(['first_name', 'last_name', 'gender', 'address', 'building', 'email', 'tel', 'category_id', 'detail']);

        Contact::create($contact );

        return view('thanks');
    }
}
