<?php
var_dump($_SERVER['REQUEST_METHOD']);
exit;
$fileName = "data.csv";

$types = array(
          1 => '商品について',
          2 => '支払いについて',
          3 => '当サイトについて',
          4 =>'その他'
);

  $reads = fread( fopen( $fileName , 'r' ));
  $posts = file( $fileName ,FILE_IGNORE_NEW_LINES );
  $confirm = file($fileName);
  $posts = array_reverse($posts);
  // var_dump($posts);
  echo $confirm[0];


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
  <h1>お問い合わせ内容の確認</h1>
  <dl>
    <dt>お名前</dt>
    <dd></dd>
  </dl>
  <dl>
    <dt>メールアドレス</dt>
    <dd>
    </dd>
  </dl>
  <dl>
    <dt>種類</dt>
    <dd>
    </dd>
  </dl>
  <dl>
    <dt>お問い合わせ内容</dt>
    <dd></dd>
  </dl>
</div>

</body>
</html>