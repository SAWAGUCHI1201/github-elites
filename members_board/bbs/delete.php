<?php

require_once('config.php');
require_once('functions.php');

$id = $_GET['id'];//index.phpから受け取った情報
echo $id;

//データベースに接続して$idに該当する
//idレコードをすべて取得して格納
$dbh = connectDatabase();
$sql = "select * from posts where id = :id";
$stmt = $dbh -> prepare($sql);
$stmt -> bindParam(":id", $id);
$stmt -> execute();

$row = $stmt -> fetch();
var_dump($row);

if(!$row)
{ //$idに該当しないレコードがあった場合
  header('Location: index.php');
  exit;
}

$dbh = connectDatabase();
//delete文で該当したレコードを削除する
$sql_delete = "delete from posts where id = :id";
$stmt_delete = $dbh -> prepare($sql_delete);
$stmt_delete -> bindParam(":id", $id);
$stmt_delete -> execute();

header('Location: index.php');
exit;

?>