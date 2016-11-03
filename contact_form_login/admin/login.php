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


//セッションの破棄 入力した値データのリセット
$SESSION = array();
session_start();

//ログイン成功時
if(!empty($_SESSION['id']))
{
  header('Location:inquiry.php');
  exit;
}

//POST受けとった際の実行
if($_SERVER['REQUEST_METHOD'] == 'POST')
{

  $mail = $_POST['mail'];
  $password = $_POST['password'];

  $errors = array();
  $error_msg = '';

  //バリデーション
  if($mail == '')
  {
      $errors['mail'] = 'メールアドレスが未入力です。';
  }
  if($password == '')
  {
      $errors['password'] = 'パスワードが未入力です。';
  }

  if(empty($errors))
  {
      //データベース接続
      $dbh = connectDatabase();
      //メールアドレスとパスワードを確認
      $sql = "select * from member where mail = :mail and password = :password";
      $stmt = $dbh->prepare($sql);
      //変数による値の挿入
      $stmt -> bindParam(':mail',$mail);
      $stmt -> bindParam(':password',$password);
      //sqlの実行
      $stmt -> execute();
      //該当するレコードを呼び出す
      $row = $stmt -> fetch();

      if($row)
      { //入力した値が一致した際に呼び出された情報を格納する
        $_SESSION['id'] = $row['id'];
        header('Location: inquiry.php');
        exit;
      }else{
        $error_msg = 'メールアドレスまたはパスワードが間違っています。';
      }
  }

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
<title>ログイン画面</title>
<meta charset="utf-8">
<style>

body{
  margin:0;
  padding:0;
}

header{
  width:100%;
  height:30px;
  background:#23487f;
  position:absolute;
  top:0;
}

header h1{
  font-size:16px;
  text-align:center;
  margin:3px 0;
  color:white;
}

h3{
  margin-top:30px;
  font-size:13px;
  text-align:center;
}

.contact{
  width:300px;
  height:300px;
  background:white;
  border:10px solid #23487f;
  margin:70px auto;
}

.contact form{
  text-align:center;
  font-size:12px;
}

.contact form .textarea{
  width:180px;
  height:16px;
  font-size:13px;
}

.contact form .textarea:focus{
  color:#666;
}

.contact form p{
  font-size:7px;
  color:red;
  text-align:center;
  margin:0;
  padding:0;
}

.submit{
  width:100px;
  height:20px;
  background:#23487f;
  border-style:none;
  color:white;
  font-size:12px;
  font-weight:bold;
  cursor:pointer;
  margin-top:20px;
}

.error_msg{
  font-size:0.5em;
  color:red;
  text-align:center;
  padding:0;
  margin:0;
}
</style>
</head>
<body>
<header>
  <h1>管理者ログイン</h1>
  <p style="font-size:10px; text-align:center;">このプログラムはcontact_form_detabaseディレクトリのフォームと連携しています。</p>
</header>
<div class="contact">
  <h3>管理者専用ログイン画面</h3>
  <p class="error_msg"><?php echo $error_msg ?></p>
  <form action="" method="post">
    メールアドレス<br><input type="text" name="mail" class="textarea"><p><?php echo $errors['mail']; ?></p><br>
    パスワード<br><input type="text" name="password" class="textarea"><p><?php echo $errors['password']; ?></p><br>
  <input type="submit" value="ログイン" class="submit">
  </form>
</div>
</body>
</html>