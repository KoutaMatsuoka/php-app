# PHP App ① レビュー

## 全般

### 以下のaタグのリンクを押下した際にedit.phpの$_GETにどんな値が格納されるか説明してください。

```html
<a href="edit.php?todo_id=123&todo_content=焼肉">更新</a>
```
  `array(2) { ["todo_id"]=> string(3) "123" ["todo_content"]=> string(6) "焼肉" }`というキー「123」、バリュー「焼肉」の連想配列

### 以下のフォームの送信ボタンを押下した際にstore.phpの$_POSTにどんな値が格納されるか説明してください。

```html
<form action="store.php" method="post">
    <input type="text" name="id" value="123">
		<textarea　name="content">焼肉</textarea>
    <button type="submit">送信</button>
</form>
```

  `array(2) { ["id"]=> string(3) "123" ["content"]=> string(6) "焼肉" }`というキー「123」、バリュー「焼肉」の配列

### `require_once()` は何のために記述しているか説明してください。

  指定ファイルを読み込み、動作させるため。例えば`require_once('config.php');`であれば`config.php`を読み込み、動作させる

### `savePostedData($post)`は何をしているか説明してください。

  リクエスト元のURLを文字列で取得しそのパスを返す`getRefererPath`関数を定義し呼び出している

### `header('location: ./index.php')`は何をしているか説明してください。

  関数実行後にページを`index.php`に遷移させている

### `getRefererPath()`は何をしているか説明してください。

  新規作成ページから`POST`されたなら`createTodoData`関数を実行し、編集ページから`POST`されたなら`updateTodoData`関数を実行

### `connectPdo()` の返り値は何か、またこの記述は何をするための記述か説明してください。

  指定されたデータベースへの接続を表すPDOインスタンスが返り値となる、定義済みのPDOクラスをインスタンス化するための記述

### `try catch`とは何か説明してください。

  例外を発生させうる動作を`try`、発生しうる例外を`throw`で明示し、その例外が発生した場合の対応を`catch`でそれぞれ設定する一連の例外処理。

### Pdoクラスをインスタンス化する際に`try catch`が必要な理由を説明してください。

  DB接続を行う際、DBのサーバーが止まっていると例外が発生するため

## 新規作成

### `createTodoData($post)`は何をしているか説明してください。

  `connection.php`内の`function createTodoData($todoText)`にデータを渡している

## 一覧

### `getTodoList()`の返り値について説明してください。

  `connection.php`内に存在する、データベース内にある削除されていない全てのレコードを参照する関数`function getAllRecords()`を返り値としている

### `<?= ?>`は何の省略形か説明してください。

  `<php? echo ?>`の省略形

## 更新

### `getSelectedTodo($_GET['id'])`の返り値は何か、またなぜ`$_GET['id']` を引数に渡すのか説明してください。

  URLクエリパラメータを取得し、それをそのままfunctions.phpのgetSelectedTodo関数に渡してます。
getSelectedTodo関数では、connection.phpのgetTodoTextById関数を実行しています。
getTodoTextById関数では、現在保存されているTODOの内容を返してくれています。
返された内容を$todoに格納し、HTMLに埋め込むことで、DBに保存されているTODOの内容を表示することができます。

### `updateTodoData($post)`は何をしているか説明してください。

  `todos`テーブル内の`id`が`$post['id']`と一致するレコードの`content`を`$post['content']`に記載された内容で更新するクエリを実行している

## 削除

### `deleteTodoData($id)`は何をしているか説明してください。

  `todos`テーブル内の`id`が`$id`と一致するレコードの`deleted_at`をPHPの`date`関数から取得した現在時刻で更新するクエリを実行している

### `deleted_at`を現在時刻で更新すると一覧画面からToDoが非表示になる理由を説明してください。

  `connection.php`に記述された`getAllRecords`関数がテーブルのデータのうち`deleted_at`がNULLであるものを参照しており、それを`index.php`に反映させているため

### 今回のように実際のデータを削除せずに非表示にすることで削除されたように扱うことを〇〇削除というか。

  論理削除

### 実際にデータを削除することを〇〇削除というか。

  物理削除

### 前問のそれぞれの削除のメリット・デメリットについて説明してください。

  論理削除はあくまでもデータを非表示にしているだけなので復元が容易だが、残存しているデータの数が増え続ければいずれ容量を圧迫するようになる
  物理削除はデータの修復が不可能となる代わりに容量の削減としても働くほか、データの流出とも無縁である
