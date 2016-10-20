<?php

// require_once()
//接続処理の外部化(外部ファイルとして読み込む)
//データベース接続の情報と処理を関数にして別のファイルにまとめる
//接続する時はそのファイルを読み込む


//外部ファイルに書かれているデータベースの接続処理を読み込む
//パスワードの変更等があった場合それぞれのファイルを修正する手間を省く
require_once('function.php');

$dbh = connectDb();
// 実質的にこちらの処理 $dbh = new PDO($dsn , $user , $password);

$sql = "select * from members";

$stmt = $dbh -> prepare($sql);
$stmt -> execute();

$row = $stmt -> fetchAll(PDO::FETCH_ASSOC);

foreach($row as $member ){
  echo $member['name'] . 'さん<br>';
}



?>