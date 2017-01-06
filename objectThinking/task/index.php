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
class Member
{
  public $data;

  public function set($member_data) {
    $this->data = $member_data;//定義した空のメンバ変数に代入する
  }

  public function insert() {
    try
    {
      $dbh = new PDO('mysql:host=localhost;dbname=obj_task;charset=utf8', 'userName', '0000', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (PDOException $e)
    {
      echo $e->getMessage();
      exit;
    }

    $member_data = $this->data;//bindParam用で代入

    $sql = 'insert into members(name,age,email,created_at) values(:name,:age,:email,now())';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":name", $member_data['name']);
    $stmt->bindParam(":age", $member_data['age']);
    $stmt->bindParam(":email", $member_data['email']);
    $stmt->execute();

  }


  public function findByEmail($fetchEmail = null){

    try
    {
      $dbh = new PDO('mysql:host=localhost;dbname=obj_task;charset=utf8', 'userName', '0000', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (PDOException $e)
    {
      echo $e->getMessage();
      exit;
    }

    $sql = 'select * from members where email = :email';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':email',$fetchEmail);
    $stmt->execute();
    $row = $stmt->fetchAll();

    var_dump($row);
    return $row;

  }
}

//--------------------------------------------------------------------------
// members テーブルのデータを表します。
$member = new Member();
//$member->insert();//insert分実行
//メンバーのデータをセットします。
// $member->set(array(
//   'name' => 'テストネーム1',
//   'age' => 30,
//   'email' => 'test3@example.com',
// ));
//$member->insert();
// // $member->set() でセットしたデータを members テーブルに追加登録します。
// // この時 created_at カラムに現在日時を自動的にセットするようにしてください。
// // 登録が成功した場合は true 、失敗した場合は false を返します。
// $result = $member->insert();

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
// $result = $member->delete($data['id']);

// // ここでは false が返ってくるはずです。
// $data = $member->findByEmail('test@example.com');


?>