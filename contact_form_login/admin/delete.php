<?php
require_once('config.php');
require_once('functions.php');

$id = $_GET['id'];

// echo $id;

//$_GET['id']がなかった場合
if(empty($id))
{
  header('Location:inquiry.php');
  exit;
}

//データベースから記事の削除
$dbh = connectDatabase();
$sql = "delete from get_inquiry where id = :id;";
$stmt = $dbh->prepare($sql);
$stmt -> bindParam(':id',$id);
$stmt -> execute();


header('Location:inquiry.php');
exit;



?>