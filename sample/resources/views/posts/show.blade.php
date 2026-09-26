<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p><strong>投稿者:</strong> {{ $post->author_name }}</p>
    <p><strong>投稿日時:</strong> {{ $post->created_at->format('Y-m-d H:i') }}</p>
    <hr>
    <div>
        <p>{!! nl2br(e($post->content)) !!}</p>
    </div>
    <hr>

    <div style="display: flex; gap: 10px; align-items: center;">
        <a href="{{ route('posts.edit', $post) }}">この投稿を編集する</a>
        |
        <a href="{{ route('posts.index') }}">一覧に戻る</a>
        |
        <!-- 削除ボタン（誤クリック防止の確認ダイアログ付き） -->
        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
            @csrf
            @method('DELETE')
            <button type="submit" style="color: red; cursor: pointer;">この投稿を削除する</button>
        </form>
    </div>
</body>
</html>