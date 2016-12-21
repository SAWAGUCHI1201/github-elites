<?php

// static(静的)なプロパティとメソッドについて
// インスタンス化しなくても呼び出せる
// タクシーの生産台数(インスタンス数)を調べる
// Taxiがインスタンス化される度にタクシー台数を増やす

class Car
{
    protected $gasoline;
    public function __construct($gasoline)
    {
        $this->gasoline = $gasoline;
    }

    public function go()
    {
        if ($this->gasoline > 0)
        {
            echo '車が走りました！ ';
            $this->gasoline--;
            echo '残りのガソリンは' . $this->gasoline . 'Lです<br>';
        }
        else
        {
            echo '給油してください！<br>';
        }
    }

    public function supply($litter)
    {
        $this->gasoline += $litter;
        echo $litter . 'L給油しました。残りのガソリンは' . $this->gasoline . 'Lです！<br>';
    }

  public function checkout()
  {
    echo 'お会計は' . $this->fare . '円です。<br>';
    $this->fare = self::STARTING_FARE;
  }

}

class Taxi extends Car
{
    const STARTING_FARE = 730;
    private $fare = self::STARTING_FARE;

    public static $numberOfTaxis = 0;// ココ staticなプロパティ

    public function __construct($gasoline)
    {
        $this->gasoline = $gasoline;//ガソリンの初期化
        self::$numberOfTaxis++;
    }

    public static function countTaxis()
    {
        echo 'タクシーの生産台数は' . self::$numberOfTaxis . '台です。<br>';
    }

    public function go()
    {
        parent::go();
        $this->fare += 90;
    }

    public function checkout()
    {
        echo 'お会計は' . $this->fare . '円です<br>';
        $this->fare = self::STARTING_FARE;
    }

}

//staticなプロパティの呼び出し
//echo Taxi::$numberOfTaxis;

//インスタンス化をすることで1台ずつ追加されていく
$myTaxi = new Taxi(50);
$myTaxi = new Taxi(50);
$myTaxi = new Taxi(50);

Taxi::countTaxis();








?>