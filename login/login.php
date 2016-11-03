<?php

//ログイン画面

//設定ファイルの読み込み データベース登録用
require_once('config.php');
require_once('functions.php');
// h = htmlspecialchars

session_start();

if (!empty($_SESSION['id']))
{
  //idに値があった場合 index.phpに飛ばす
  header('Location: index.php');
  exit;
}

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
    //データベース接続
    $dbh = connectDatabase();
    //sql分 入力された値のIDとパスワードをテーブルから一致するレコードを確認
    $sql = "select * from users where name = :name and password = :password";
    $stmt = $dbh->prepare($sql);
    $stmt -> bindParam(":name",$name);
    $stmt -> bindParam(":password",$password);
    $stmt -> execute();
    //該当するレコードを取り出す(呼び出す) fetch()
    $row = $stmt -> fetch();

    var_dump($row);
    //fetch()結果処理
    if ($row)
    {
      //入力した値がレコードから一致した場合(値が帰ってきた場合)
      $_SESSION['id'] = $row['id'];
      header('Location: index.php');
      exit;
    }
    else
    {
      //入力した値が一致せず値がない(false)場合
      echo 'ユーザーネームまたはパスワードが間違っています。';
    }

  }
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
  <input type="submit" value="ログイン">
</form>

<a href="signup.php">新規ユーザー登録はこちら</a>

</body>
</html>