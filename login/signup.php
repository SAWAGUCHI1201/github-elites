<?php

//新規登録画面


//設定ファイルの読み込み データベース登録用
require_once('config.php');
require_once('functions.php');
// h = htmlspecialchars

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $name = $_POST['name'];
  $password = $_POST['password'];

  $errors = array();

  //バリデーション
  if($name == '')
  {
    $errors['name'] = 'ユーザーネームが未入力です。';
  }

  if($password == '')
  {
    $errors['password'] = 'パスワードが未入力です。';
  }

  //バリデーション突破後 $emptyが空の状態
  if(empty($errors))
  {
    $dbh = connectDatabase();//functions.php
    $sql = "insert into users (name, password, created_at)values
            (:name, :password, now())";

    $stmt = $dbh -> prepare($sql);
    $stmt -> bindParam(":name",$name);
    $stmt -> bindParam(":password",$password);

    $stmt -> execute();//実行処理

    header('Location: login.php');//ログイン画面に移動
    exit;
  }
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
  ユーザーネーム<input type="text" name="name">
  <?php if( $errors['name'] ): ?>
    <?php echo h( $errors['name'] ); ?>
  <?php endif; ?>
  <br>
  パスワード<input type="text" name="password">
  <?php if( $errors['password'] ): ?>
    <?php echo h( $errors['password'] ); ?>
  <?php endif; ?>
  <br>
  <input type="submit" value="新規登録">
</form>

<a href="login.php">ログイン</a>

</body>
</html>