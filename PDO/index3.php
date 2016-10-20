<?php

// プレースフォルダーの使い方

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
//プレースフォルダー insertで挿入する時は代入しない
//実行する$stmtの際に行う
$sql = "insert into members(name,email,password)values(:name,:email,:password)";
$stmt = $dbh->prepare($sql);

$stmt->execute(array(//それぞれの?に代入される
  ':name' => 'Takeda',
  ':email' => 'takeda@example.com',
  ':password' => '4444'
  ));


echo '成功しました！';
?>