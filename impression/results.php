<?php

require_once('functions.php');

$dbh = connectDb();
$sql = "select * from posts";
$stmt = $dbh->prepare($sql);

$stmt -> execute();

//$stmtのsql結果を連想配列呼び出す $rowに結果を代入する
$row = $stmt -> fetchAll(PDO::FETCH_ASSOC);
// var_dump($row);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>投稿内容</title>

</head>
<body>

<h1>投稿内容</h1>
<?php if(count($row)): ?>
  <?php foreach( $row as $post ): ?>
    <li>
    「<?php echo $post['impression']; ?>」 @<?php echo $post['name']; ?>
    </li>
  <?php endforeach ?>
<?php else: ?>
  現在投稿された感想はありません。
<?php endif; ?>


<p><a href="index.php">戻る</a></p>


</body>
</html>