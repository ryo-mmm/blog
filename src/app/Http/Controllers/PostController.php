<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->paginate(15);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //記事作成フォームのビューを返す
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        // バリデーション済みのデータを取得
        $validated = $request->validated();

        //データベースに保存(モデルの $fillable 設定により一括代入が可能)
        Post::create($validated);

        //記事一覧ページにリダイレクト
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // 取得した記事データを 'posts.show' という View に渡す
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //記事データを'posts.edit' View に渡す
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @param  string  $id
     */
    public function update(PostRequest $request, Post $post)
    {
        $validated = $request->validated();

        // データベースを更新
        $post->update($validated);

        //記事詳細ページにリダイレクト
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // 記事を削除
        $post->delete();

        // 記事一覧ページにリダイレクト
        return redirect()->route('posts.index');
    }
}
