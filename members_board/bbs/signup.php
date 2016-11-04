<?php

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
  {
    $dbh = connectDatabase();
    $sql = "insert into users (name, email, created_at)
            values(:name, :email, now())";
    $stmt = $dbh -> prepare($sql);
    $stmt -> bindParam(":name",$name);
    $stmt -> bindParam(":email",$email);
    $stmt -> execute();
    //ログイン画面に飛ばす
    header('Location: login.php');
    exit;
  }



}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>新規登録画面</title>
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

<h1>新規登録</h1>
<form action="" method="post">
  <p>ユーザーネーム:<input type="text" name="name">
  <?php if($errors['name']): ?>
    <?php echo $errors['name']; ?>
  <?php endif ?>
  </p>
  <p>メールアドレス:<input type="text" name="email">
  <?php if($errors['email']): ?>
    <?php echo $errors['email']; ?>
  <?php endif ?>
  </p>
  <input type="submit" value="登録">
</form>

<a href="login.php" style="font-size:12px;">ログイン画面へ</a>

</body>
</html>