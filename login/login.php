<?php

//ログイン画面


session_start();

if (!empty($_SESSION['id']))
{
  //idに値があった場合 index.phpに飛ばす
  header('Location: index.php');
  exit;
}



?>

<!DOCTYPE html>
<html lang="ja">
<head>
<title>ログイン画面</title>
<meta charset="utf-8">
</head>
<body>

<h1>ログイン画面</h1>
<form method="post" action="">
  ユーザーネーム<input type="text" name="name"><br>
  パスワード<input type="text" name="password"><br>
  <input type="submit" value="ログイン">
</form>

<a href="signup.php">新規ユーザー登録はこちら</a>

</body>
</html>