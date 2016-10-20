<?php

// bindParam バインドパラム

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

// プレースフォルダーを生成
$sql = "insert into members(name,email,password)values(:name,:email,:password)";
$stmt = $dbh->prepare($sql);

//値をバインド(代入する)
$stmt->bindParam(':name',$name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':password',$password);

$name = 'Ito';
$email = 'ito@example.com';
$password = '7777';

$stmt -> execute();

echo '成功しました！';
?>