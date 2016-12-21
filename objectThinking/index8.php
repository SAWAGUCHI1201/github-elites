<?php

// アクセス権について
//public どこからでもメソッドにアクセスできる
//private そのクラス自身からのみアクセスできる
//protected そのクラス自身と継承したクラス、親クラスからのみアクセスできる

class Car
{
    protected $gasoline;
    //protectedにすることで継承したTaxiクラスでもアクセスすることが可能
    public function __construct($gasoline)//コンストラクタ
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
    echo 'お会計は' . $this->fare . '円です。<br>';//お会計処理
    $this->fare = self::STARTING_FARE;//次の運転用に運賃を初期化する
  }

}

class Taxi extends Car
{
    const STARTING_FARE = 730;
    private $fare = self::STARTING_FARE;
    //privateを記述することでクラスないでしか呼び出すことができない

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

//アクセス権について publicで関数や変数を定義した場合
$myTaxi = new Taxi(50);//インスタンス化 コンストラクタを呼び出す
$myTaxi->go();
//$myTaxi->gasoline = 0;//publicの場合途中からメソッドの中身を変更できてしまう
$myTaxi->go();//上記の操作により「給油してください！」が表示されてしまう
$myTaxi->go();
//$myTaxi->fare = 0;//publicの場合途中からメソッドの中身を変更できてしまう
$myTaxi->checkout();