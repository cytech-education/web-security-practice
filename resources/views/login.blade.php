<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>KingdomSNS</title>
    <style>
        body { font-family: sans-serif; background: #f8f8f8; }
        .login-box { background: #fff; padding: 2em; margin: 3em auto; width: 350px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        .error { color: red; margin-bottom: 1em; }
        label { display: block; margin-top: 1em; }
        input[type="text"], input[type="password"] { width: 100%; padding: 0.5em; }
        button { margin-top: 1.5em; width: 100%; padding: 0.7em; background: #007bff; color: #fff; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h1>KingdomSNS</h1>
        <h2>ログイン</h2>
        @if ($errors->has('login'))
            <div class="error">{{ $errors->first('login') }}</div>
        @endif
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <label for="username">ユーザー名</label>
            <input type="text" id="username" name="username" required autofocus>
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">ログイン</button>
        </form>
    </div>
</body>
</html>
