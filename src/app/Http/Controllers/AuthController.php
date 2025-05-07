<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

/**
 * ログイン管理クラス
 */
class AuthController extends Controller
{
    /**
     * トップページ画面
     * @return view ビュー
     */
    public function index()
    {
        $contact = Contact::with('category')->get();
        $categories = Category::all();

        return view('index', compact('contact','categories'));
    }
}
