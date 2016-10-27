<?php
//クッキーについて
//クライアント側(ブラウザ)に保存できる小さなデータ
//一度読み込んだデータがブラウザに保存される

//setcookie('','', time() + 60*60); クッキーの保存期間の設定
//60秒x60なので1時間の設定 ブラウザを終了しても保存されている
setcookie('name','kashiwagi', time() + 60*60);
setcookie('mail','kashiwagi@example.com');



//クッキーの終了処理 クッキーの設定のマイナスの数値を入れる
//setcookie('name','kashiwagi',time() -3600);

var_dump($_COOKIE);


?>