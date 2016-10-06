<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>感想フォーム</title>
</head>
<body>

  <h1>お問い合わせフォーム</h1>
  <p>名前と感想を入力してください</p>

<!-- inquiry.phpに入力された値を送信 -->
  <form action="inquiry.php" method="POST">
  お名前<input type="text" name="name">
  感想<input type="text" name="impression">
  <input type="submit" value="送信">
  </form>



</body>
</html>