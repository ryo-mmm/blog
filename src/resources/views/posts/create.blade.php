{{-- resources/views/posts/create.blade.php --}}
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規記事作成 | blog</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}"> {{-- フォーム用のCSSを新規追加 --}}
</head>
<body class="page-body">
    <div class="form-container">
        <h1 class="form-header__title">新規記事作成</h1>
        <form action="{{ route('posts.store') }}" method="POST" class="form-block">

            @csrf

            {{-- 📝 バリデーションエラー表示 --}}
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
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="form-group__input @error('title') form-group__input--error @enderror">
            </div>

            <div class="form-group">
                <label for="content" class="form-group__label">本文</label>
                <textarea id="content" name="content" rows="10"
                        class="form-group__textarea @error('content') form-group__input--error @enderror">{{ old('content') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="button button--primary">記事を保存</button>
                <a href="{{ route('posts.index') }}" class="button button--secondary">キャンセル</a>
            </div>
        </form>
    </div>
</body>
</html>