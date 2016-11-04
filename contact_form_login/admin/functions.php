<?php

  //DB接続 config.php参照
  function connectDatabase()
  {
    try{
      return new PDO(DSN,USER,PASSWORD,
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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

?>