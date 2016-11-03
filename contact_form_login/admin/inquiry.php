<?php
//DB接続に必要な情報 定数
define('DSN','mysql:host=localhost;dbname=contact_form;charset=utf8');
define('USER','customer');
define('PASSWORD','0000');

//エラーレベルの設定 エラー
//Noticeエラーの表示をしない
error_reporting(E_ALL & ~E_NOTICE);


//DB接続 config.php参照
function connectDatabase()
{
  try{
    return new PDO(DSN,USER,PASSWORD);
  }
  catch (PDOException $e)
  {
    echo $e -> getMessage();
    exit;
  }
}

//エスケープ処理
function h($s)
{
  return htmlspecialchars($s,ENT_QUOTES,"UTF-8");
}


session_start();

if(empty($_SESSION['id']))
{
  //ログインされずにアクセスされた場合
  header('Location: login.php');
  exit;
}

//データベース接続
$dbh = connectDatabase();
$sql = "select * from get_inquiry";
$stmt = $dbh->prepare($sql);

$stmt -> execute();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<title>お問い合わせ内容一覧ページ</title>
<meta charset="utf-8">
<style>

body {
  margin:0;
  padding:0;
}

#container {
  width:1106px;
  height:auto;
  background:#fff;
  margin:0 auto;
}

#container h1 {
  text-align:center;
  font-size:20px;
}

tr {
  height:18px;
  width:auto;
  padding:0;
  margin:0;
}

tr th{
  padding:0;
  margin:0;
  background:#333;
  font-size:10px;
  color:#fff;
}

tr td{
  padding:3px;
  margin:0;
  background:#fff;
  color:#555;
  font-size:10px;
  border-bottom:1px #888 inset;
}

.col_name,.col_mail,.col_type{
  height:18px;
  width:250px;
}

.col_inquiry{
  height:18px;
  width:300px;
}

.col_id {
  height:18px;
  width:10px;
}

.logout{
  text-decoration:none;
  text-align:right;
  padding:2px 5px;
  background:#f00;
  color:white;
  font-size:0.3em;
}

</style>
</head>
<body>

<div id="container">
<h1>お問い合わせ内容一覧</h1>
<a class="logout" href="logout.php">ログアウト</a>
<table>
  <tr class="column">
    <th class="col_id">ID</th>
    <th class="col_name">NAME</th>
    <th class="col_mail">MAIL</th>
    <th class="col_type">TYPE</th>
    <th class="col_inquiry">INQUIRY</th>
  </tr>
  <?php foreach($stmt as $record => $col): ?>
  <tr class="record">
    <td class="col_id"><?php echo $col['id']; ?></td>
    <td class="col_name"><?php echo $col['name']; ?></td>
    <td class="col_mail"><?php echo $col['mail']; ?></td>
    <td class="col_type"><?php echo $col['type']; ?></td>
    <td class="col_inquiry"><?php echo $col['inquiry']; ?></td>
  </tr>
  <?php endforeach ?>
</table>
</div>


</body>
</html>