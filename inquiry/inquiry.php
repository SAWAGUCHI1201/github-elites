<?php

$name = $_POST['name'];
$impression = $_POST['impression'];


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>確認画面</title>
</head>
<body>
  <h1>内容の確認</h1>
  <p>以下の内容でよろしいですか？</p>
  名前:<?php echo htmlspecialchars($name , ENT_QUOTES, "UTF-8"); ?><br>
  感想:<?php echo htmlspecialchars($impression , ENT_QUOTES, "UTF-8"); ?>

<!-- htmlspecialcharsはechoにつけてすべて文字列にする htmlspecialchars(値 , ENT_QUOTES, "UTF-8"); -->
<!-- thankyou.phpに入力された値を送信 type="hidden"で非表示にする-->
  <form action="thankyou.php" method="post">
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="impression" value="<?php echo $impression; ?>">
    <input type="submit" value="この内容で投稿">
  </form>


  <a href="index.php">戻る</a>

<!--   <form action="thankyou.php" method="post">
    <input type="submit" value="この内容で送信">
  </form>
-->
</body>
</html>