<?php

session_start();

//セッションの破棄
$SESSION = array();
//クッキーの破棄
if (isset($_COOKIE[session_name()]))
{
  setcookie(session_name(),'',time() - 86400);
}

session_destroy();

header('Location: login.php');