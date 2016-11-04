<?php

require_once('config.php');
require_once('functions.php');
session_start();
$id = $_GET['id'];

if(empty($id))
{
  header('Location: inquiry.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

  $password = $_POST['password'];
  $new_password = $_POST['new-password'];
  $errors = array();

  //バリデーション
  if (empty($password))
  {
    $errors['password'] = '現在のパスワードを入力してください';
  }
  if (empty($new_password))
  {
    $errors['new-password'] = '新しいパスワードを入力してください';
  }

  //バリデーション突破
  if (empty($errors))
  {
    //現在のパスワードの値を確認
    $dbh_p = connectDatabase();
    $sql_p = "select * from member where id = :id and password = :password";
    $stmt_p = $dbh_p -> prepare($sql_p);
    $stmt_p -> bindParam(':id',$id);
    $stmt_p -> bindParam(':password',$password);
    $stmt_p -> execute();

    $row = $stmt_p -> fetch();
    if($row)
    {
      //パスワードの変更SQL
      $dbh = connectDatabase();
      $sql = "update member set password = :password where id = :id;";
      $stmt = $dbh -> prepare($sql);
      $stmt -> bindParam(':password',$new_password);
      $stmt -> bindParam(':id', $id);
      $stmt -> execute();

      header('Location: logout.php');
      exit;
    }
    else//パスワードが間違っていた場合(fetchがnullだった場合)
    {
      $errors['password'] = 'パスワードが間違っています';
    }
  }
}




?>

<DOCTYPE html>
<html lang="ja">
<head>
<meta charset= 'utf-8'>
<title>パスワード変更</title>
<style>
h1{
  font-size: 20px;
}

.error_msg{
  font-size:0.5em;
  color:red;
  text-align:center;
  padding:0;
  margin:0;
}

input[type="submit"]{
  width:100px;
  height:20px;
  background:#555;
  color:white;
  font-size:12px;
  border-style:none;
}
</style>
</head>
<body>

<h1>パスワードの変更</h1>
<form action="" method="post">
  <p>現在のパスワード
    <input type="text" name="password"><br>
    <span class="error_msg"><?php echo h($errors['password']); ?></span>
  </p>
  <p>新しいパスワード
    <input type="text" name="new-password"><br>
    <span class="error_msg"><?php echo h($errors['new-password']); ?></span>
  </p>
<input type="submit" value="変更する">
</form>
<a style="font-size:12px;" href="inquiry.php">戻る</a>

</body>
</html>