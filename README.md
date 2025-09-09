# 脆弱Webアプリ教材（Laravel製）

## 概要

このプロジェクトは、サイバーセキュリティ演習用の「脆弱Webアプリ」です。
- **SQLインジェクション**（ログイン画面）
- **クロスサイトスクリプティング（XSS）**（コメント投稿画面）
の2大脆弱性を、実際に攻撃・再現・修正体験できます。

教材「250908_セキュリティ_台本」「サンプル脆弱Webアプリ設計図.md」に準拠。

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
INSERT INTO users (name, email, password, created_at, updated_at) VALUES ('testuser', 'test@example.com', 'testpass', datetime('now'), datetime('now'));
```

---

## 脆弱性再現例

### 1. SQLインジェクション（ログイン画面）

- ユーザー名欄に `' OR '1'='1` などを入力し、任意のパスワードでログイン可能
- 攻撃例：
    - ユーザー名：`' OR '1'='1`
    - パスワード：任意

### 2. XSS（コメント投稿画面）

- コメント欄に `<script>alert('XSS!')</script>` などを入力し、アラートが表示される
- 攻撃例：
    - コメント：`<script>alert('XSS!')</script>`

---

## 注意事項

- 本アプリは**学習・演習用**です。実運用・本番環境での利用は禁止です。
- 攻撃コードは**模擬環境のみ**で使用してください。
- セキュリティ対策の重要性を体験的に学ぶことが目的です。

---

## 参考教材

- 250908_セキュリティ_台本.md
- サンプル脆弱Webアプリ設計図.md
- 捜査ツール_攻撃コードリスト.md
- 防犯マニュアル_攻撃手法と対策.md
