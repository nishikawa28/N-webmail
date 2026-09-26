<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
</head>
<body>
    <h1>投稿一覧</h1>

    @forelse ($posts as $post)
        <div>
            <strong>{{ $post->title }}</strong> （投稿者: {{ $post->author_name }}）<br>
            {{ $post->content }}
            <hr>
        </div>
    @empty
        <p>投稿はまだありません。</p>
    @endforelse
</body>
</html>