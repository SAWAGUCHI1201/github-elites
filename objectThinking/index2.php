<?php
//http://www.objective-php.net/basic/class
//クラスについて
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

$myCar = new Car;

for ($i = 0; $i < 50; $i++)
{//処理を50回行う
  $myCar -> go();
}

$myCar -> supply(10);


  ?>