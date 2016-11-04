<?php





?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>感想フォーム</title>

</head>
<body>

<h1>感想投稿フォーム</h1>
<p>名前と感想を入力してね!</p>

<form action="inquiry.php" method="post">
  名前<input type="text" name="name"><br>
  感想<input type="text" name="impression"><br>
  <input type="submit" value="感想を投稿">
</form>

<p><a href="results.php">投稿内容を見る</a></p>

</body>
</html>