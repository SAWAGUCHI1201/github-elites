<?php
/*
create table members (
  id int primary key auto_increment,
  name varchar(32),
  age int,
  email varchar(100) UNIQUE,値が重複しないようにする
  created_at datetime
);
*/
class TableBase//----------------------------------------------------------
{
  public $data;
  public $tableName;//テーブル

  public function set($get_data) {
    $this->data = $get_data;//定義した空のメンバ変数に代入する
  }

  //理想はinsert()入れる

  public function connectDatabase()
  {
   try
      {
        $dbh = new PDO('mysql:host=localhost;dbname=obj_task;charset=utf8', 'userName', '0000', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $dbh;//戻り値設定
      }
      catch (PDOException $e)
      {
        echo $e->getMessage();
        exit;
      }
  }

  public function delete($result){
    $dbh = $this->connectDatabase();
    $sql = 'delete from ' . $this->tableName . ' where id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':id',$result);
    $stmt->execute();
  }
}

class ShopItem extends TableBase//---------------------------------------------
{
  public $tableName = 'shop_items';//オーバーライド

  public function insert() {
    $dbh = $this->connectDatabase();
    $get_data = $this->data;//bindParam用で代入
    $sql = 'insert into' . $this->tableName . '(code,name,price,created_at) values(:code,:name,:price,now())';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":code", $get_data['code']);
    $stmt->bindParam(":name", $get_data['name']);
    $stmt->bindParam(":price", $get_data['price']);
    $stmt->execute();
  }

  public function findByCode($fetchCode = null)
  {
    $dbh = $this->connectDatabase();
    $sql = 'select * from members where code = :code';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':code',$fetchCode);
    $stmt->execute();
    $row = $stmt->fetch();
    //fetchAll(全データを配列に変換 全ての結果行を含む配列を返す)
    ///全ての結果行なのでここでは全て(配列)の中の結果行(配列)となる。
    return $row;
  }

}

class Member extends TableBase//-----------------------------------------------
{
  public $tableName = 'members';//オーバーライド

  public function insert() {
    $dbh = $this->connectDatabase();
    $get_data = $this->data;//bindParam用で代入
    $sql = 'insert into ' . $this->tableName . '(name,age,email,created_at) values(:name,:age,:email,now())';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":name", $get_data['name']);
    $stmt->bindParam(":age", $get_data['age']);
    $stmt->bindParam(":email", $get_data['email']);
    $stmt->execute();
  }

  public function findByEmail($fetchEmail = null)
  {
    $dbh = $this->connectDatabase();
    $sql = 'select * from members where email = :email';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email',$fetchEmail);
    $stmt->execute();
    $row = $stmt->fetch();
    //fetchAll(全データを配列に変換 全ての結果行を含む配列を返す)
    ///全ての結果行なのでここでは全て(配列)の中の結果行(配列)となる。
    return $row;
  }
}



// ------------------------------------------------------------
$ShopItem = new ShopItem();
$ShopItem->set(array(
   'code' => '1201',
   'name' => 'MacbookAir',
   'price' => 148000 ,
   ));
$ShopItem->insert();
//$result = $ShopItem->delete(1);
exit;
// ------------------------------------------------------------
// $member = new Member();
// $member->set(array(
//    'name' => 'ぐっちー',
//    'age' => 30,
//    'email' => 'sawaguchi2@example.com',//次は違うやつで
//    ));
// $member->insert();
// //$result = $member->delete(1);
// var_dump($member);
// exit;






// ------------------------------------------------------------
//$member->insert();
// // $member->set() でセットしたデータを members テーブルに追加登録します。
// // この時 created_at カラムに現在日時を自動的にセットするようにしてください。
// // 登録が成功した場合は true 、失敗した場合は false を返します。
$result = $member->insert();

// // 引数で指定されたメールアドレスのユーザーを members テーブルから探し、
// // もし見つかった場合、そのデータを以下の形式で返します。
// // array(
// //   'id' => 'members テーブル の id カラムの値',
// //   'name' => 'members テーブル の name カラムの値',
// //   'age' => 'members テーブル の age カラムの値',
// //   'email' => 'members テーブル の email カラムの値',
// //   'created_at' => 'members テーブル の created_at カラムの値',
// // );
// // ユーザーが見つからなかった場合、false を返します。
$fecthEmail = $member->findByEmail('test@example.com');

// // 引数で指定された id を持つ members テーブルのレコードを削除します。
// // 削除が成功した場合は true 、失敗した場合は false を返します。
$result = $member->delete($fecthEmail['id']);

// // ここでは false が返ってくるはずです。
$fecthEmail = $member->findByEmail('test@example.com');


?>
