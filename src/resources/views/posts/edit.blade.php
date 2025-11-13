{{-- resources/views/posts/edit.blade.php --}}
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記事編集 | {{ $post->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>
<body class="page-body">
    <div class="form-container">
        <h1 class="form-header__title">記事編集: {{ Str::limit($post->title, 30) }}</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="form-block">

            @csrf
            {{-- ★★★ 編集操作には PUTメソッドを使用する ★★★ --}}
            @method('PUT')

            @if ($errors->any())
                <div class="error-list">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="error-list__item">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <label for="title" class="form-group__label">タイトル</label>
                {{-- ★既存の値 or バリデーションエラー時の古い入力値 --}}
                <input type="text" id="title" name="title"
                    value="{{ old('title', $post->title) }}"
                    class="form-group__input @error('title') form-group__input--error @enderror">
            </div>

            <div class="form-group">
                <label for="content" class="form-group__label">本文</label>
                {{-- ★既存の値 or バリデーションエラー時の古い入力値 --}}
                <textarea id="content" name="content" rows="10"
                        class="form-group__textarea @error('content') form-group__input--error @enderror">{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="button button--primary">更新を保存</button>
                <a href="{{ route('posts.show', $post->id) }}" class="button button--secondary">キャンセル</a>
            </div>
        </form>
    </div>
</body>
</html>