<?php
//手続き型プログラム = 関数を使って処理をひとまとまりにする データと処理がバラバラ

//オブジェクト思考 = オブジェクトを主体とする データと処理が結合している

//クラスを宣言 => インスタンス化
//メソッド = クラス内で宣言された関数
//http://www.objective-php.net/basic/instance
class Car
{
  //public = アクセス権 / -> = インスタンスのプロパティを参照する演算子
  public $gasoline = 30;//クラスの中で宣言された値 = プロパティ(メンバ変数)
  public function go(){
    echo '車が走りました。';
    $this -> gasoline-- ;//$this-> Carクラスの中のgasolineにアクセス 処理ごとに-1
    echo '残りのガソリンは' . $this -> gasoline . 'Lです。<br>';
  }
}

$myCar = new Car;
//Car というクラス(設計図)をもとにして
//myCar というインスタンス(実態)を作った
//echo $myCar -> gasoline; $myCarのgasolineにアクセス
//$myCar -> go(); $myCarの関数go()の処理

for ($i = 0; $i < 50; $i++)
{//処理を50回行う
  $myCar -> go();
}

  ?>