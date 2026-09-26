<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿一覧</title>
</head>
<body>
    <h1>投稿一覧</h1>

    <p><a href="{{ route('posts.create') }}">新規投稿を作成する</a></p>
    <hr>

    @forelse ($posts as $post)
        <div>
            <!-- タイトルをクリックすると詳細画面へ遷移 -->
            <a href="{{ route('posts.show', $post) }}">
                <strong>{{ $post->title }}</strong>
            </a>
            （投稿者: {{ $post->author_name }}）<br>
            {{ $post->content }}
            <hr>
        </div>
    @empty
        <p>投稿はまだありません。</p>
    @endforelse
</body>
</html>