<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * ログイン画面表示
 */
Route::middleware('auth')->group(function () {

    /**
     * トップページ画面
     */
    Route::get('/', [AuthController::class, 'index']);

    /**
    * お問い合わせ内容確認画面
    */
    Route::post('/confirm', [ContentController::class, 'confirm']);
    Route::post('/thanks', [ContentController::class, 'store']);
    Route::get('/admin', [AdminController::class, 'admin']);
    Route::get('/admin/search', [AdminController::class, 'search']);
    Route::post('/admin/export', [AdminController::class, 'export']);
    Route::delete('/delete', [AdminController::class, 'delete']);
});
