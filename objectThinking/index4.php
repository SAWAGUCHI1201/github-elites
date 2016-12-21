<?php
//オーバーライド http://www.objective-php.net/basic/override
//「オーバーライド」とは、継承クラスにおいて、親クラスのメソッドを上書きする仕組みの事をいいます。親クラスのメソッドに追加機能を持たせたい場合、または親クラスのメソッドの機能を殺したい場合などに使用します。
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


class Taxi extends Car
{
  public $fare;

  public function go()
  {
    parent::go();//親要素のgo()をそのまま受け継げる
    $this -> fare += 90;
  }
}

$myTaxi = new Taxi;

$myTaxi -> go();
$myTaxi -> go();
$myTaxi -> go();
echo '現在の運賃は' . $myTaxi -> fare . '円です。';


?>