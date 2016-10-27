<?php

//新規登録画面


//設定ファイルの読み込み データベース登録用
require_once('config.php');
require_once('functions.php');

session_start();

//バリデーション

if($name == '')
{
  $errors['name'] = 'ユーザーネームが未入力です。';
}

if($password == '')
{
  $errors['password'] = 'パスワードが未入力です。';
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<title>新規登録画面</title>
<meta charset="utf-8">
</head>
<body>

<h1>新規登録</h1>
<form method="post" action="">
  ユーザーネーム<input type="text" name="name"><br>
  パスワード<input type="text" name="password"><br>
  <input type="submit" value="新規登録">
</form>

<a href="login.php">ログイン</a>

</body>
</html>