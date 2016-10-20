<?php

$dsn = 'mysql:host=localhost;dbname=contact_form;charset=utf8';
$user = 'customer';
$password = '0000';

$notName ="";
$notMail ="";
$notMessage ="";

$types = array(
          1 => '商品について',
          2 => '支払いについて',
          3=> '当サイトについて',
          4 =>'その他'
);

//最初にページを開いた時はGETでページを返すため以下の処理は行われない
if($_SERVER['REQUEST_METHOD'] === 'POST' )
{
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $message = $_POST["message"];
  $type = $_POST["type"];

  if(empty($name) && empty($mail) && empty($message)){

    $notName = "名前が未入力です。";
    $notMail = "メールアドレスが未入力です。";
    $notMessage = "内容が未入力です。";

  }else{
    //データベースへ接続する
    try
    {
      $dbh = new PDO( $dsn, $user, $password );
    }
    catch (PDOException $e)
    {
      echo $e -> getMessage();
      exit;
    }
    //データベースに書き込みをする
    $sql = "insert into get_content(name,mail,type,inquiry)values(:name,:email,:type,:message)";
    $stmt = $dbh->prepare($sql);

    //値をバインド(代入する)
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':type',$type);
    $stmt->bindParam(':message',$message);

    $stmt -> execute();

    //リダイレクトでthanks.phpに移動して処理が終わる。
    // header('Location:thanks.php');
    // exit;

  }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<title>お問い合わせフォーム課題</title>
<meta charset="utf-8">
<style>
.contact{
  display:table;
}

h1{
  font-size:25px;
  padding:0;
  margin:0;
}

.contact {
  margin:0 auto;
  display:table;
  border-collapse:collapse;
}

dl {
  display:table-row;
}

dt,dd{
  display:table-cell;
  color:#000;
  font-size:12px;
  text-align:center;
  vertical-align:middle;
  border-spacing:0px;
  border:1px solid #555;
  margin-bottom:-1px;

}

dt {
  width:150px;
  height:35px;
  background:#d8d8d8;
  text-align:left;
  text-indent:1em;
}

dd {
  width:300px;
  height:auto;
  background:#fff;
}

span {
  font-size:8px;
  color:red;
  margin-left:5px;
}

.req {
  display:block;
  font-size:6px;
  color:red;
}

select {
  margin-left:-150px;
}

dl input {
  width:270px;
  height:25px;
  margin:10px;
}

textarea {
  width:270px;
  height:150px;
  margin:10px;
  resize: none;
}

.submit{
  display:block;
  width:180px;
  height:30px;
  font-size:13px;
  font-weight:bold;
  color:#fff;
  text-align:center;
  background:#115daa;
  border-style:none;
  margin:10px auto 0 auto;
}

</style>
</head>
<body>


<div class="contact">
  <form action="" method="POST">
  <h1>お問い合わせ</h1>
  <dl>
    <dt>お名前<span>(必須)</span></dt>
    <dd><input type="text" name="name">
        <span class="req"><?php echo $notName; ?></span>
    </dd>
  </dl>
  <dl>
    <dt>メールアドレス<span>(必須)</span></dt>
    <dd><input type="text" name="mail">
        <span class="req"><?php echo $notMail; ?></span>
    </dd>
  </dl>
  <dl>
    <dt>種類<span>(必須)</span></dt>
    <dd><select name="type">
          <?php foreach($types as $number => $type): ?>
            <?php echo '<option value="' . $number .'">' . $type . '</option>'; ?>
          <?php endforeach; ?>
        </select>
    </dd>
  </dl>
  <dl>
    <dt>お問い合わせ内容<span>(必須)</span></dt>
    <dd><textarea type="text" name="message"></textarea>
        <span class="req"><?php echo $notMessage; ?></span>
    </dd>
  </dl>
  <input class="submit" type="submit" name="submit" value="送信">
  </form>
</div>

</body>
</html>