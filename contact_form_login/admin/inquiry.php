<?php

require_once('config.php');
require_once('functions.php');
session_start();
$id = $_SESSION['id'];

if(empty($_SESSION['id']))
{
  //ログインされずにアクセスされた場合
  header('Location: login.php');
  exit;
}

//データベース接続 お問合せ内容の取得
$dbh = connectDatabase();
$sql = "select * from get_inquiry";
$stmt = $dbh->prepare($sql);

$stmt -> execute();

//fetchAllでSQL結果の全レコードを取得する foreachで出力
$rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);


//引き継がれた$_SESSION['id']をGETで受け渡す(delete.php)
if(isset($_SESSION['id']))
{
  //データベース接続 会員情報の表示
  $dbh_m = connectDatabase();
  $sql_m = "select * from member where id = :id ";
  $stmt_m = $dbh_m -> prepare($sql_m);
  $stmt_m -> bindParam(":id",$id );
  $stmt_m -> execute();

  $member = $stmt_m -> fetch();
  // var_dump($member);
}

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

.logout,.change_pass{
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
<a class="change_pass" href="change_pass.php?id=<?php echo h($member['id']) ?>">
パスワードの変更をする</a>
<table>
  <tr class="column">
    <th class="col_id">ID</th>
    <th class="col_name">NAME</th>
    <th class="col_mail">MAIL</th>
    <th class="col_type">TYPE</th>
    <th class="col_inquiry">INQUIRY</th>
  </tr>
  <?php foreach($rows as $record => $col): ?>
  <tr class="record">
    <td class="col_id"><?php echo $col['id']; ?></td>
    <td class="col_name"><?php echo $col['name']; ?></td>
    <td class="col_mail"><?php echo $col['mail']; ?></td>
    <td class="col_type"><?php echo $col['type']; ?></td>
    <td class="col_inquiry"><?php echo $col['inquiry']; ?>
        <a href="delete.php?id=<?php echo h($col['id']) ?>">[削除する]</a>
    </td>
  </tr>
  <?php endforeach ?>
</table>
</div>


</body>
</html>