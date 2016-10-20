<?php

// レコードを挿入する

$dsn = 'mysql:host=localhost;dbname=nowall;charset=utf8';
$user = 'testuser';
$password = '9999';


//データベースの接続
try
{
  $dbh = new PDO( $dsn, $user, $password ); //データベースハンドル
  //echo '成功しました！';
}
catch (PDOException $e) //$eはなんでも良いがerrorのeとしている
{
  echo $e -> getMessage();//エラーが出た場合次で中断させる
  exit;
}

//レコードの挿入

$sql = "insert into members(name,email,password)values
        ('Suzuki','suzuki@example.com','3333')";

$stmt = $dbh->prepare($sql);
$stmt->execute();

?>