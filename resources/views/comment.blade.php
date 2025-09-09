<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>KingdomSNS タイムライン</title>
    <style>
        body { font-family: sans-serif; background: #f8f8f8; }
        .container { background: #fff; padding: 2em; margin: 3em auto; width: 500px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        .logout { float: right; }
        .comment-list { margin-top: 2em; }
        .comment-item { border-bottom: 1px solid #eee; padding: 0.7em 0; }
        .user { color: #007bff; font-weight: bold; }
        textarea { width: 100%; height: 60px; }
        button { margin-top: 1em; width: 100%; padding: 0.7em; background: #28a745; color: #fff; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="container">
        <form class="logout" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background:#dc3545;">ログアウト</button>
        </form>
        <h1>KingdomSNS</h1>
        <h2>コメントを投稿</h2>
        <div>ログイン中：<span class="user">{{ $user }}</span></div>
        <form method="POST" action="{{ route('comment.post') }}">
            @csrf
            <textarea name="comment" required placeholder="コメントを入力"></textarea>
            <button type="submit">投稿</button>
        </form>
        <div class="comment-list">
            <h3>投稿一覧（最新順）</h3>
            @foreach ($comments as $comment)
                <div class="comment-item">
                    <span class="user">{{ $comment->user }}</span>：
                    {!! $comment->comment !!}
                    <div style="font-size:0.8em;color:#888;">{{ $comment->created_at }}</div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
