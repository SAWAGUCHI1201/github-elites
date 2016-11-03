<?php

//会員画面


//設定ファイルの読み込み データベース登録用
require_once('config.php');
require_once('functions.php');
// h = htmlspecialchars

session_start();

// $_SESSON['id']がemptyだった場合login.phpへ移動
if (empty($_SESSION['id']))
{
  //idに値がなかった場合 login.phpに飛ばす
  header('Location: login.php');
  exit;
}

  //データベース接続
  $dbh = connectDatabase();
  //sql分 入力された値のIDとパスワードをテーブルから一致するレコードを確認
  $sql = "select * from users where id = :id";
  $stmt = $dbh->prepare($sql);
  $stmt -> bindParam(":id",$_SESSION['id']);
  $stmt -> execute();
  //該当するレコードを取り出す(呼び出す) fetch()
  $row = $stmt -> fetch();

  //var_dump($row);


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<title>会員限定画面</title>
<meta charset="utf-8">
</head>
<body>

<h1>登録したユーザーのみ閲覧可能</h1>
<p><?php echo h($row['name']); ?>さんとしてログインしています。</p>
<a href="logout.php">ログアウト</a>



</body>
</html>