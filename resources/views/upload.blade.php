<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ファイルアップロード（脆弱）</title>
</head>
<body>
    <h1>ファイルアップロード（脆弱）</h1>
    @if(session('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif
    <form method="post" action="{{ route('upload.post') }}" enctype="multipart/form-data">
        @csrf
        <label>アップロードするファイル: 
            <input type="file" name="file" required>
        </label>
        <button type="submit">アップロード</button>
    </form>
    <p style="color: red;">※ 拡張子・MIME検証なし。任意ファイルをアップロード可能。</p>
    <a href="{{ url('/') }}">トップへ戻る</a>
</body>
</html>
