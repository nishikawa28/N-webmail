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
    <a href="{{ route('posts.index') }}">一覧に戻る</a>
</body>
</html>