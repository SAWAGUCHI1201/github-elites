<?php

// $_POST;
// var_dump($_POST);
// $_GET;はURLに表示されるためパスワードは入れない。

//投稿の受け取り echo $_POST['name'];
//htmlspecialcharsを入力してセキュリティー保護。
//echo htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8");
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>フォームの受け取り</title>
</head>
<body>

<!-- POST変数に代入して省略したほうが楽。

$name = $_POST['name']
$impression = $_POST['impression']

-->

  <p>投稿内容</p>
  <p>名前: <?php echo htmlspecialchars($_POST['name'], ENT_QUOTES, "UTF-8"); ?></p>
  <p>感想: <?php echo htmlspecialchars($_POST['impression'], EN_QUOTES, "UTF-8"); ?></p>




</body>
</html>