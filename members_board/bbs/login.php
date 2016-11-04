<?php

$_SESSION = array();
session_start();


if(!empty($_SESSION['id']))
{
  //$_SESSION['id']に値があった場合
  header('Location: index.php');
  exit;
}

require_once('functions.php');
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $errors = array();

  //バリデーション
  if($name == '')
  {
    $errors['name'] = 'ユーザーネームが未入力です。';
  }
  if($email == '')
  {
    $errors['email'] = 'メールアドレスが未入力です。';
  }


  //バリデーション突破
  if (empty($errors))
  { //データベースへ$_SESSION['id']に格納された値があるかどうかを確認
      $dbh = connectDatabase();
      $sql = "select * from users where name = :name and email = :email;";
      $stmt = $dbh -> prepare($sql);
      $stmt -> bindParam(":name",$name);
      $stmt -> bindParam(":email",$email);
      $stmt -> execute();

      $row = $stmt -> fetch();

      if ($row)
      {
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];//index.phpでユーザー情報を使う
        header('Location: index.php');
        exit;
      }
      else
      {
        echo 'ユーザーネームまたはメールアドレスが間違っています。';
      }
  }
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ログイン画面</title>
<style>
h1{
  font-size:20px;
}

p{
  font-size:10px;
}

</style>
</head>
<body>

<h1>ログイン</h1>
<form action="" method="post">
  <p>
    ユーザーネーム:<input type="text" name="name">
  <?php if($errors['name']): ?>
    <?php echo $errors['name']; ?>
  <?php endif ?>
  </p>
  <p>
    メールアドレス:<input type="text" name="email">
  <?php if($errors['name']): ?>
    <?php echo $errors['name']; ?>
  <?php endif ?>
  </p>
  <input type="submit" value="ログイン">
</form>
<a href="signup.php" style="font-size:12px;">新規登録画面へ</a>

</body>
</html>