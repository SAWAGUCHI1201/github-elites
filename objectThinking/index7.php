<?php

// コンストラクタ
// インスタンス化した際に最初に呼び出される関数

class Car
{
    public $gasoline;

    //ココ コンストラクタ ガソリンを初期化して引数にすることで
    //インスタンス化した時に引数を渡すことにより引数の値が入った処理が行われる
    //引数なしでインスタンス化した場合エラーになる
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

}

class Taxi extends Car
{
    const STARTING_FARE = 730;
    public $fare = self::STARTING_FARE;

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

$myTaxi = new Taxi(50);//インスタンス化 コンストラクタを呼び出す
$myTaxi->go();

$myTaxi2 = new Taxi(20);//変数を変えてもう一件追加する
echo $myTaxi2->gasoline;