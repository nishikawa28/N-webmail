<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規投稿</title>
</head>
<body>
    <h1>新規投稿</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">タイトル:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
        </div>
        <br>
        <div>
            <label for="author_name">投稿者名:</label><br>
            <input type="text" id="author_name" name="author_name" value="{{ old('author_name') }}">
        </div>
        <br>
        <div>
            <label for="content">本文:</label><br>
            <textarea id="content" name="content" rows="5">{{ old('content') }}</textarea>
        </div>
        <br>
        <button type="submit">投稿する</button>
    </form>

    <br>
    <a href="{{ route('posts.index') }}">一覧に戻る</a>
</body>
</html>