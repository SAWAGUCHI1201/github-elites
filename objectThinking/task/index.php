<?php
/*
create table members (
  id int primary key auto_increment,
  name varchar(32),
  age int,
  email varchar(100) UNIQUE,
  created_at datetime
);
*/

class Member
{


  public function set()
  {
    $array = array(
      'name'  => 'name',
      'age'   => 20,
      'email' => 'email'
    );

    foreach( $array as $key){
      echo $key;
    }
  }

  public function insert(){//データベース接続設定
    try{
      $dbh = new PDO('mysql:host=localhost; dbname=obj_task; charset=utf8',
        'userName','0000',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(PDOExeption $e)
    {
      echo $e->getMessage();
      exit;
    }

    //sql実行処理
    $sql = 'insert into members (name,age,email,created_at)
            values(:name, :age, :email, now() );';
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(":name", $key['name'];
    $stmt->bindParam(":age", $key['age'];
    $stmt->bindParam(":email", $key['email'];

    $stmt->execute();

  }

  // public function insert(){
  //     //データベース書き込み
  //     $dbh = connectedDB();
  //     $sql = 'insert into members(name,age,email)value(' .
  //             $this->contact_info['name'],
  //             $this->contact_info['age'],
  //             $this->contact_info['email']
  //             . ');';
  //     $stml = $this->dbh->prepare($sql);
  //     $stmt->execute();

  //     //テーブルから全てのレコードを$dataへ格納する
  //     public $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //     echo $data;
  // }
}





//--------------------------------------------------------------------------
// members テーブルのデータを表します。
$member = new Member();
$member->insert();//insert分実行
// // メンバーのデータをセットします。
$member->set();
$member->set(array(
  'name' => 'テスト名',
  'age' => 30,
  'email' => 'test@example.com',
));

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
// $data = $member->findByEmail('test@example.com');

// // 引数で指定された id を持つ members テーブルのレコードを削除します。
// // 削除が成功した場合は true 、失敗した場合は false を返します。
// $result = $member->delete($data['id']);

// // ここでは false が返ってくるはずです。
// $data = $member->findByEmail('test@example.com');


?>