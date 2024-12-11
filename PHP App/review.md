# PHP App ① レビュー

## 全般

### 以下のaタグのリンクを押下した際にedit.phpの$_GETにどんな値が格納されるか説明してください。

```html
<a href="edit.php?todo_id=123&todo_content=焼肉">更新</a>
```



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

  

### `header('location: ./index.php')`は何をしているか説明してください。

  関数実行後にページを`index.php`に遷移させている

### `getRefererPath()`は何をしているか説明してください。

  

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

### `updateTodoData($post)`は何をしているか説明してください。

## 削除

### `deleteTodoData($id)`は何をしているか説明してください。

### `deleted_at`を現在時刻で更新すると一覧画面からToDoが非表示になる理由を説明してください。

### 今回のように実際のデータを削除せずに非表示にすることで削除されたように扱うことを〇〇削除というか。

### 実際にデータを削除することを〇〇削除というか。

### 前問のそれぞれの削除のメリット・デメリットについて説明してください。
