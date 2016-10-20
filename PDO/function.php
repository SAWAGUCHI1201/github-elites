<?php

//定数を使って一度定義したあとの変更ができないようにする
//定数は大文字で記述する $はいらない

function connectDb(){

// $dsn = 'mysql:host=localhost;dbname=nowall;charset=utf8';
// $user = 'testuser';
// $password = '9999';

define('DSN', 'mysql:host=localhost; dbname=nowall; charset=utf8');
define('USER', 'testuser');
define('PASSWORD', '9999');


//データベースの接続
try
{
  return new PDO( DSN, USER, PASSWORD );
}
catch (PDOException $e) //$eはなんでも良いがerrorのeとしている
{
  echo $e -> getMessage();//エラーが出た場合次で中断させる
  exit;
}

}




?>