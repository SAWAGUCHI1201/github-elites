create database nowall_bbs;

use nowall_bbs;

grant all on nowall_bbs . * to testuser@localhost identified by '9999';

--会員情報デーブル
create table users (
id int primary key auto_increment,
name varchar(255),
email varchar(255),
created_at datetime
);

--掲示板内容テーブル
create table posts (
id int primary key auto_increment,
name varchar(255),
message text,
created_at datetime,
update_at datetime
);