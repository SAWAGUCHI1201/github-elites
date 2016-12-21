<?php
//クラスの継承について http://www.objective-php.net/basic/extend
//継承とは、既に存在するあるクラスを元に、それを更に拡張したクラスを作る仕組みです。

//親クラス
class Car
{

  public $gasoline = 30;//クラスの中で宣言された値 = プロパティ(メンバ変数)

  public function go(){

    if ( $this -> gasoline > 0)//gasolineが0以下になった時の処理
    {
      echo '車が走りました。';
      $this -> gasoline-- ;//$this-> Carクラスの中のgasolineにアクセス 処理ごとに-1
      echo '残りのガソリンは' . $this -> gasoline . 'Lです。<br>';
    }else
    {
      echo '給油してください。<br>';
    }
  }

  public function supply($litter){
    $this->gasoline += $litter;
    echo $litter . 'L給油しました。残りのガソリンは' . $this->gasoline . 'Lです。<br>';
  }
}

//派生クラス サブクラス(親クラスを受け継いだクラス)
class Taxi extends Car
{//extenads Car -> Carの内容をそのまま受け継ぐ

}

$myTaxi = new Taxi;

//そのままCarを受け継げるので$myTaxiの中身が空でも
//以下の処理等が可能
echo $myTaxi -> gasoline . "<br>";
$myTaxi -> go();
$myTaxi -> supply(5);

  ?>