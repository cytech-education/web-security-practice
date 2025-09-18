<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>プロフィール情報</title>
    <style>
        body { font-family: sans-serif; background: #f0f4f7; }
        .box { width: 480px; margin: 3em auto; background: #fff; padding: 2em; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
        dl { margin: 1.2em 0; }
        dt { font-weight: bold; color: #007bff; }
        dd { margin: 0.3em 0 1em 0; }
        .note { background: #ffe8a1; padding: 1em; border-radius: 4px; margin-top: 1em; }
        a { color: #007bff; }
    </style>
</head>
<body>
    <div class="box">
        <h1>ユーザープロフィール</h1>
        <p>ログイン中ユーザー: <strong>{{ $currentUserName }}</strong></p>
        <dl>
            <dt>ID</dt>
            <dd>{{ $profile->id }}</dd>
            <dt>ユーザー名</dt>
            <dd>{{ $profile->name }}</dd>
            <dt>メールアドレス</dt>
            <dd>{{ $profile->email }}</dd>
            <dt>パスワード(保存値)</dt>
            <dd>{{ $profile->password }}</dd>
            <dt>登録日時</dt>
            <dd>{{ $profile->created_at }}</dd>
        </dl>
        <p><a href="{{ route('comment') }}">タイムラインへ戻る</a></p>
    </div>
</body>
</html>
