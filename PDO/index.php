<?php

// データベースへの接続
// PDOクラスを利用する
// try ~ catch命令

$dsn = 'mysql:host=localhost;dbname=nowall;charset=utf8';
$user = 'testuser';
$password = '9999';

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

//query()を使った書き方

//$sql = 'select * from members';
//Mysqlのコマンドを変数に格納
//$stmt = $dbh -> query($sql);
//上記のコマンドを実行するためのコマンド ｽﾃｰﾄﾒﾝﾄ
//↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//プリペードステートメントを使った書き方
//エスケープ処理 プレースフォルダ

$sql = 'select * from members';
$stmt = $dbh->prepare($sql);

$stmt -> execute();//実行命令



//上記の検索結果をすべて取ってくる FETCH_ASSOC 連想配列で引っ張る
$row = $stmt -> fetchAll(PDO::FETCH_ASSOC);
//var_dump($row);

foreach($row as $member)
{
  echo $member['name'] . 'さん<br>';
}

/*

try ~ catch 命令

try
{
  //例外発生する可能性がある処理
}
catch (発生するかもしれない例外の種類 例外を受け取る変数名)
{
  //例外発生時の処理
}

/* PDOクラス
new PDO($dsn(ﾃﾞｰﾀｿｰｽﾈｰﾑ) , $user , $password);
$dsn      :データベース接続用の文字列 mysql:host=localhost;dbname=nowall;charset=utf8;
$user     :接続するときのユーザー名
$password :接続する際のパスワード
*/
?>