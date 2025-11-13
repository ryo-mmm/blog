{{-- resources/views/posts/show.blade.php --}}
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} | 記事詳細</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
</head>
<body class="page-body">
    <div class="list-container">
        <header class="show-header">
            <h1 class="show-header__title">{{ $post->title }}</h1>

            {{-- 記事操作アクション --}}
            <div class="show-actions">
                {{-- 編集ボタン (次のステップで実装) --}}
                <a href="{{ route('posts.edit', $post->id) }}" class="button button--secondary button--small">
                    編集
                </a>

                {{-- 削除フォーム (次のステップで実装) --}}
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE') {{-- DELETEメソッドを指定 --}}
                    <button type="submit" class="button button--danger button--small"
                            onclick="return confirm('この記事を本当に削除しますか？');">
                        削除
                    </button>
                </form>
            </div>
        </header>

        {{-- メタ情報 --}}
        <div class="post-detail__meta">
            <span class="post-detail__date">作成日: {{ $post->created_at->format('Y年m月d日 H:i') }}</span>
            <span class="post-detail__date">最終更新日: {{ $post->updated_at->format('Y年m月d日 H:i') }}</span>
        </div>

        {{-- 記事本文 --}}
        <div class="post-detail__content">
            {{-- 改行タグを適用するため nl2br を使用。セキュリティのためエスケープ（e()）を適用。 --}}
            {!! nl2br(e($post->content)) !!}
        </div>

        <div class="post-detail__footer">
            <a href="{{ route('posts.index') }}" class="button button--secondary">
                一覧に戻る
            </a>
        </div>
    </div>
</body>
</html>