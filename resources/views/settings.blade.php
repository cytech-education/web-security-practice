<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メール通知設定</title>
    <style>
        body { font-family: sans-serif; background: #f7f7f7; }
        .panel { width: 460px; margin: 3em auto; padding: 2em; background: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
        h1 { margin-bottom: 0.5em; }
        .alert { padding: 0.8em; border-radius: 4px; margin-bottom: 1em; }
        .alert-info { background: #e9f7ff; color: #055160; }
        .btn { display: inline-block; padding: 0.6em 1.2em; border-radius: 4px; text-decoration: none; color: #fff; margin-right: 0.5em; }
        .btn-on { background: #28a745; }
        .btn-off { background: #dc3545; }
        .help { margin-top: 1.5em; background: #fff3cd; padding: 1em; border-radius: 4px; }
        a { color: #007bff; }
    </style>
</head>
<body>
    <div class="panel">
        <h1>メール通知設定</h1>
        @if($flash)
            <div class="alert alert-info">{{ $flash }}</div>
        @endif
        <p>現在の設定: <strong>{{ $emailNotify }}</strong></p>
        <div>
            <a class="btn btn-on" href="{{ route('settings.update', ['email_notify' => 'on']) }}">ON にする</a>
            <a class="btn btn-off" href="{{ route('settings.update', ['email_notify' => 'off']) }}">OFF にする</a>
        </div>
        <p><a href="{{ route('comment') }}">タイムラインへ戻る</a></p>
    </div>
</body>
</html>
