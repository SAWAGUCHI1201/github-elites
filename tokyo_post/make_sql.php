<?php



$fp = fopen('tokyo_post.csv', 'r');
while (($data = fgetcsv($fp)) !== FALSE) {//FALSEじゃない間
    $postcode = $data[2];
    $kana1 = $data[3];
    $kana2 = $data[4];
    $kana3 = $data[5];
    $address1 = $data[6];
    $address2 = $data[7];
    $address3 = $data[8];
    echo $Insert = 'insert into address(postcode,kana1,kana2,kana3,kanji1,kanji2,kanji3)values('.
              $postcode.','.$kana1.','.$kana2.','.$kana3.','.$address1.','.$address2.','.$address3.');<br>';
}
fclose($fp);



/*
  $lines = file("tokyo_post.csv");//csvの読み込み配列にする
  foreach ($lines as $line){//配列に変数を追加する
    $data = explode(',',$line);//,で配列を区切る

    $postcode = $data[2];
    $kana1 = $data[3];
    $kana2 = $data[4];
    $kana3 = $data[5];
    $address1 = $data[6];
    $address2 = $data[7];
    $address3 = $data[8];
    echo $Insert = 'insert into address(postcode,kana1,kana2,kana3,kanji1,kanji2,kanji3)value'.
              $postcode.','.$kana1.','.$kana2.','.$kana3.','.$address1.','.$address2.','.$address3.');<br>';
  }

*/



?>