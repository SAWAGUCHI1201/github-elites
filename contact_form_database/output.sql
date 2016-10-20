-- テーブルの作成---------------------------------------------------
create table get_content (
id int primary key auto_increment,
name varchar(32),
mail varchar(32),
type int(1),
inquiry text
);

mysql> desc get_content;
+---------+-------------+------+-----+---------+----------------+
| Field   | Type        | Null | Key | Default | Extra          |
+---------+-------------+------+-----+---------+----------------+
| id      | int(11)     | NO   | PRI | NULL    | auto_increment |
| name    | varchar(32) | YES  |     | NULL    |                |
| mail    | varchar(32) | YES  |     | NULL    |                |
| type    | int(1)      | YES  |     | NULL    |                |
| inquiry | text        | YES  |     | NULL    |                |
+---------+-------------+------+-----+---------+----------------+

-- テーブル2の作成---------------------------------------------------
create table types (
  id int primary key auto_increment,
  type varchar(32)
);

mysql> desc types;
+-------+-------------+------+-----+---------+----------------+
| Field | Type        | Null | Key | Default | Extra          |
+-------+-------------+------+-----+---------+----------------+
| id    | int(11)     | NO   | PRI | NULL    | auto_increment |
| type  | varchar(32) | YES  |     | NULL    |                |
+-------+-------------+------+-----+---------+----------------+

-- テスト確認用---------------------------------------------------
insert into types(type)values('商品について'),('支払いについて'),('当サイトについて'),('その他');

mysql> select * from types;
+----+--------------------------+
| id | type                     |
+----+--------------------------+
|  1 | 商品について             |
|  2 | 支払いについて           |
|  3 | 当サイトについて         |
|  4 | その他                   |
+----+--------------------------+

-- 内部結合してみる---------------------------------------------------
insert into get_content(name,mail,type,inquiry)values
  ('User1','user@example.com','1','テスト1'),
  ('User2','user@example.com','2','テスト2'),
  ('User3','user@example.com','3','テスト3'),
  ('User4','user@example.com','4','テスト4');

SELECT --結合するカラム
  g.id, -- get_content
  g.name,
  g.mail,
  t.type, -- types
  g.type,
  g.inquiry

FROM
  get_content as g          -- get_content = g
JOIN
  types as t               -- types = t
ON
  g.type = t.id
;

-- テーブルの作成---------------------------------------------------