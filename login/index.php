<?php

//会員画面


session_start();
//セッションの破棄
$_SESSION = array();
// $_SESSON['id']で画面操作をする
if (empty($_SESSION['id']))
{
  //idに値がなかった場合 login.phpに飛ばす
  header('Location: login.php');
  exit;
}



?>

<!DOCTYPE html>
<html lang="ja">
<head>
<title>会員限定画面</title>
<meta charset="utf-8">
</head>
<body>

<h1>登録したユーザーのみ閲覧可能</h1>



</body>
</html>