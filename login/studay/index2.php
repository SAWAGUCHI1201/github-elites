<?php
//セッションについてhttp://www.phppro.jp/school/phpschool/vol8/1
//サーバー側にデータを保存する
session_start();
//値の指定
$_SESSION['name'] = 'kashiwagi';

var_dump($_SESSION);

//セッションの破棄
$_SESSION = array();


?>