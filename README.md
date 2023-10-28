# Laravel Todo

### Laravel Todoのプロジェクトをクローンする。

```
git clone git@github.com:JunNagashima/Laravel_todo.git
```

### MAMP のルートフォルダの設定を変更する

#### 手順
1. MAMP の設定(Preferences)を開く
2. Serverタブを開く
3. Document rootをクローンしたLaravelプロジェクトのpublicディレクトリを選択する
`例:Desctop\Laravel_todo\public`

### MAMP の起動

### phpMyAdminにログインしてDBを作成する

データベースは`laravel_todo`で作成する。

### Laravelの.envファイルを修正する
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=laravel_todo
DB_USERNAME=root
DB_PASSWORD=root
```

### migrateコマンドを入力する
```
php artisan migrate
```
正常に終了したらphpMyAdminでテーブルが作成されているか確認する。

### テストデータのインサート
```
php artisan db:seed
```
先程作成したテーブル(todoテーブル)にデータが入ってるか確認する。

### Laravelプロジェクトを開く

1. MAMPのWebStartからwebページを開く
2. ページの右上のMyWebsiteボタンを押す
