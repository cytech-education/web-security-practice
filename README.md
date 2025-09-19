# 脆弱Webアプリ教材（Laravel製）

## 概要

このプロジェクトは、サイバーセキュリティ演習用の「脆弱Webアプリ」です。
いくつか意図的に脆弱性を仕込んでおり、実際に攻撃・再現・修正体験できます。


---

## セットアップ・起動方法

1. 依存パッケージインストール
    ```bash
    composer install
    ```

2. .env.exampleをコピー→.envにリネーム

3. mampのphpMyAdminにて、「web-security-practice」データベースを作成

4. .envファイルのmySql PORT番号を自身の環境に併せて書き換え

5. APP KEYを生成
    ```bash
    php artisan key:generate
    ```

6. DBマイグレーション
    ```bash
    php artisan migrate
    ```

7. 開発サーバ起動
    ```bash
    php artisan serve --host=127.0.0.1 --port=8000
    ```
    → [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login) にアクセス

---

## 初期ユーザー登録方法

- ログインには `users` テーブルのレコードが必要です。
- phpMyAdminから以下SQLを実行し、ユーザーを追加してください。

例：

```sql
INSERT INTO users (name, email, password, created_at, updated_at) VALUES ('testuser', 'test@example.com', 'testpass', NOW(), NOW());
```

---

## 注意事項

- 本アプリは**学習・演習用**です。実運用・本番環境での利用は禁止です。
- 攻撃コードは**模擬環境のみ**で使用してください。
- セキュリティ対策の重要性を体験的に学ぶことが目的です。

---

## 参考教材
docsディレクトリ内
- サンプル脆弱Webアプリ設計図.md
- 捜査ツール_攻撃コードリスト.md
- 防犯マニュアル_攻撃手法と対策.md
