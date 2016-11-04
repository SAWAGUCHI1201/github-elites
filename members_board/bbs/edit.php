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

//編集内容を反映させる
if($_SERVER['REQUEST_METHOD'] == 'POST' )
{
  //nameは必要ない
  $message = $_POST['message'];
  $errors = array();

  //バリデーション
  if ($message == '')
  {
    $errors['message'] = 'メッセージが未入力です';
  }

  //バリデーション突破
  if(empty($errors))
  {
    $dbh = connectDatabase();
    $sql = "update posts set message = :message, updated_at = now() where id = :id ";
    //$idに該当するidレコードのmessage updated_at を更新する
    $stmt = $dbh -> prepare($sql);
    $stmt -> bindParam(":id", $id);
    $stmt -> bindParam(":message", $message);
    $stmt -> execute();

    header('Location: index.php');
    exit;


  }





}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>編集画面</title>
<style>
h1{font-size:20px;}
p{font-size:10px;}
</style>
</head>
<body>

<h1>投稿内容を編集する</h1>
<p><a href="index.php" style="font-size:12px;">戻る</a></p>

<form action="" method="post">
  <textarea name="message" cols="30" rows="5">
    <?php echo h($row['message']); ?>
  </textarea><br>
  <?php if( $errors['message'] ):?>
    <?php echo h($errors['message']); ?>
  <?php endif ?>
  <br>
  <input type="submit" value="編集する">
</form>
</body>
</html>