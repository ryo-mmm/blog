{{-- resources/views/posts/index.blade.php --}}
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記事一覧 | blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
</head>
<body class="page-body">
    <div class="list-container">
        <header class="list-header">
            <h1 class="list-header__title">記事一覧</h1>

            {{-- 新規作成ボタン --}}
            <a href="{{ route('posts.create') }}" class="button button--primary">
                新規記事作成
            </a>
        </header>

        {{-- 記事が一件でもある場合 --}}
        @if ($posts->isNotEmpty())
            <div class="post-list">
                @foreach ($posts as $post)
                    <article class="post-item">
                        {{-- 記事タイトル: 詳細ページへのリンク --}}
                        <h2 class="post-item__title">
                            <a href="{{ route('posts.show', $post->id) }}" class="post-item__link">
                                {{ $post->title }}
                            </a>
                        </h2>
                        {{-- 記事本文の抜粋 --}}
                        <p class="post-item__excerpt">
                            {{ Str::limit($post->content, 200) }}
                        </p>

                        {{-- メタ情報 --}}
                        <div class="post-item__meta">
                            最終更新日: {{ $post->updated_at->format('Y年m月d日 H:i') }}
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="pagination-links" style="margin-top: 24px;">
                {!! $posts->links() !!}
            </div>

        @else
            {{-- 記事がない場合 --}}
            <p class="empty-message">まだ記事がありません。</p>
        @endif
    </div>
</body>
</html>