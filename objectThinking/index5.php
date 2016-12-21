<?php
//定数とself::
//初乗り料金を追加
class Car
{

  public $gasoline = 30;

  public function go(){

    if ( $this -> gasoline > 0)
    {
      echo '車が走りました。';
      $this -> gasoline-- ;
      echo '残りのガソリンは' . $this -> gasoline . 'Lです。<br>';
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

//ココ　走るたび運賃が90円ずつ加算する仕組み
class Taxi extends Car
{

  const STARTING_FARE = 730;//定数
  public $fare = self::STARTING_FARE;//定数にアクセス

  public function go ()
  {
    parent::go();//Carのgo()にアクセス
    $this -> fare += 90;
  }
}

$myTaxi = new Taxi;

//3回go()を実行する
$myTaxi->go();
$myTaxi->go();
$myTaxi->go();
echo '現在の運賃は' . $myTaxi -> fare . '円です。';

?>