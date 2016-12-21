<?php
//お会計機能
class Car
{

  public $gasoline = 30;

  public function go(){

    if ( $this->gasoline > 0)
    {
      echo '車が走りました。';
      $this->gasoline-- ;
      echo '残りのガソリンは' . $this->gasoline . 'Lです。<br>';
    }else
    {
      echo '給油してください。<br>';
    }
  }

  // public function supply($litter){
  //   $this->gasoline += $litter;
  //   echo $litter . 'L給油しました。残りのガソリンは' . $this->gasoline . 'Lです。<br>';
  // }
}

//ココ お会計機能追加
class Taxi extends Car
{

  const STARTING_FARE = 730;//定数
  public $fare = self::STARTING_FARE;//定数にアクセス 変数に格納

  public function go ()
  {
    parent::go();//Carのgo()にアクセス
    $this->fare += 90;
  }

  public function checkout()
  {
    echo 'お会計は' . $this->fare . '円です。<br>';//お会計処理
    $this->fare = self::STARTING_FARE;//運賃を初期化する
  }
}

$myTaxi = new Taxi;

//一人目は3回 go()を実行する
$myTaxi->go();
$myTaxi->go();
$myTaxi->go();

$myTaxi->checkout();

//二人目は5回 go()を実行する

$myTaxi->go();
$myTaxi->go();
$myTaxi->go();
$myTaxi->go();
$myTaxi->go();

$myTaxi->checkout();

?>