<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ファイルダウンロード（脆弱）</title>
</head>
<body>
    <h1>ファイルダウンロード（脆弱）</h1>
    <form method="get" action="{{ route('download.file') }}">
        <label>ダウンロードするファイル名（例: ../../.env）: 
            <input type="text" name="file" required>
        </label>
        <button type="submit">ダウンロード</button>
    </form>
    <p style="color: red;">※ パス検証なし。任意のファイルをダウンロード可能。</p>
    <a href="{{ url('/') }}">トップへ戻る</a>
</body>
</html>
