-- ログインシステム
-- データベースの作成(ターミナル) nowal_login
create database nowal_login;

use nowal_login;

grant all on nowal_login. * to testuser@localhost identified by '9999';

create table users (
  id int primary key auto_increment,
  name varchar(32),
  password varchar(32),
  created_at datetime
  );

-- 設定ファイルの準備(config.php)
-- 接続に必要な情報(DSN,ユーザー名,パスワード)を定義
-- エラーレベルの設定

-- 関数ファイルの設定(functions.php)
-- DB接続用の関数 connectDatabase()
-- スケープ用の関数 h()

--会員限定画面の作成(index.php)
--セッションを使ってログインの仕組みを作る

-- ログイン画面の作成(login.php)
-- 会員登録画面の作成(signup.php)
-- 前回設定したセッションの破棄

-- 新規登録画面の作成(signup.php)
-- reuire_once()で設定ファイルの読み込み
-- バリデーション
-- バリデーションの突破後の処理

-- ログインシステムを作る
-- バリデーション
-- ログイン機能の実装(login.php)
-- バリデーションの突破後の処理
-- 入力された値を持つレコードがあるか調べる
-- 該当レコードがあった場合は $_SESSION['ID']に値を持たせてindex.phpへ
-- 該当レコードがなかった場合は、エラーメッセージを出す

-- どのユーザーとしてログインしているかを表示する
-- 会員限定画面の作成

--ログアウト機能(logout.php)