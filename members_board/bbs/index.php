<?php

require_once('functions.php');
require_once('config.php');

session_start();


if(empty($_SESSION['id']))
{
  //$_SESSION['id']に値がなかった場合(ログイン処理を行なっていない場合)
  //login.phpへ飛ばす
  header('Location: login.php');
  exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST')
{//投稿用
  $name = $_SESSION['name'];//login.phpからfetchした情報
  $message = $_POST['message'];
  $errors = array();

  //投稿記事のバリデーション
  if($message == '')
  {
    $errors['message'] = 'メッセージが未入力です。';
  }


  //バリデーション突破
  if (empty($errors))
  { //データベースへ$_SESSION['id']に格納された値があるかどうかを確認
      $dbh = connectDatabase();
      $sql = "insert into posts (name,message,created_at,updated_at)
              values(:name, :message, now(), now() );";
      $stmt = $dbh -> prepare($sql);
      $stmt -> bindParam(":name",$name);
      $stmt -> bindParam(":message",$message);
      $stmt -> execute();

      header('Location: index.php');
      exit;
  }
}

//データベースより投稿内容の呼び出し
$dbh = connectDatabase();
$sql = "select * from posts order by updated_at desc";
//投稿された時刻の新しい順で表示する
$stmt = $dbh -> prepare($sql);
$stmt -> execute();
//テーブルpostsからすべての情報を$postsに格納する
$posts = $stmt -> fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>会員掲示板</title>
<style>
h1{
  font-size:20px;
}

p{
  font-size:10px;
}

</style>
</head>
<body>

<h1><?php echo h($_SESSION['name']); ?>さん 会員掲示板へようこそ！</h1>
<p><a href="logout.php" style="font-size:12px;">ログアウト</a></p>
<p>投稿する</p>
<form action="" method="post">
  <textarea name="message" cols="30" rows="5"></textarea><br>
  <?php if( $errors['message'] ):?>
    <?php echo h($errors['message']); ?>
  <?php endif ?>
  <br>
  <input type="submit" value="投稿する">
</form>

<hr>
<h1>投稿されたメッセージ</h1>
<?php if(count($posts)): ?>
  <!-- 投稿数があった場合 -->
  <?php foreach($posts as $post): ?>
    <li style="list-style:none;">
      #<?php echo h($post['id']) ?>
      @<?php echo h($post['name']) ?><br>
      <?php echo h($post['message']) ?><br>
      <a href="edit.php?id=<?php echo h($post['id']) ?>">[編集する]</a>
      <a href="delete.php?id=<?php echo h($post['id']) ?>">[削除する]</a>
      <!-- edit.phpでGETで$post['id']の値を渡すことができる -->
      <?php echo h($post['update_at']) ?>
      <hr>
    </li>
  <?php endforeach ?>
<?php else: ?>
<!-- 投稿記事がなかった場合 -->
  <?php echo '投稿された記事はありません。'?>

<?php endif ?>





</body>
</html>