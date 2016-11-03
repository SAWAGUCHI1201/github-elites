<?php

//DB接続に必要な情報 定数
define('DSN','mysql:host=localhost;dbname=nowal_login;charset=utf8');
define('USER','testuser');
define('PASSWORD','9999');

//エラーレベルの設定 エラー
//Noticeエラーの表示をしない
error_reporting(E_ALL & ~E_NOTICE);


?>