<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>デバッグツール</title>
    <style>
        body { font-family: sans-serif; background: #f2f2f2; }
        .wrapper { width: 800px; margin: 2em auto; background: #fff; padding: 2em; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { margin-bottom: 1em; }
        section { margin-bottom: 2em; }
        form { margin-bottom: 1em; }
        input[type="text"] { width: 100%; padding: 0.5em; margin-top: 0.5em; }
        button { margin-top: 0.5em; padding: 0.6em 1em; background: #dc3545; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        textarea { width: 100%; min-height: 160px; }
        pre { background: #272822; color: #f8f8f2; padding: 1em; overflow-x: auto; border-radius: 4px; }
        a { color: #007bff; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>デバッグツール</h1>

        <section>
            <h2>任意URLの内容取得 (SSRF)</h2>
            <form method="get" action="{{ route('debug') }}">
                <label>取得したいURLを入力
                    <input type="text" name="fetch_url" value="{{ request('fetch_url') }}" placeholder="http://169.254.169.254/latest/meta-data/">
                </label>
                <button type="submit">URLから取得</button>
            </form>
            @if(!is_null($urlResult))
                <h3>取得結果</h3>
                <textarea readonly>{{ $urlResult }}</textarea>
            @endif
        </section>

        <section>
            <h2>サーバーでコマンド実行</h2>
            <form method="get" action="{{ route('debug') }}">
                <label>実行するコマンド
                    <input type="text" name="command" value="{{ request('command') }}" placeholder="ls -la">
                </label>
                <button type="submit">コマンド実行</button>
            </form>
            @if(!is_null($commandResult))
                <h3>実行結果</h3>
                <pre>{{ $commandResult }}</pre>
            @endif
        </section>

        <section>
            <h2>ユーザーデータ閲覧</h2>
            <form method="get" action="{{ route('debug') }}">
                <label>閲覧したいユーザーID（allで全件）
                    <input type="text" name="user_dump" value="{{ request('user_dump') }}" placeholder="all">
                </label>
                <button type="submit">ユーザー情報表示</button>
            </form>
            @if(!is_null($userDump))
                <h3>ユーザー情報</h3>
                <pre>{{ $userDump }}</pre>
            @endif
        </section>

        <p><a href="{{ route('comment') }}">コメント画面に戻る</a></p>
    </div>
</body>
</html>
