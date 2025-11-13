<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 記事リソースのCRUDルートを一括定義
Route::resource('posts', PostController::class);

// ホームへのアクセスを記事一覧にリダイレクトする例
Route::get('/', function () {
    return redirect()->route('posts.index');
});