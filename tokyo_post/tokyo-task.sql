select * from address where postcode like '1600023';
-- 1.　郵便番号「1600023」に該当するレコードを取得する SQL
select * from address where kanji2 like '新宿区' order by postcode asc limit 10 ;
-- 2. 「新宿区」の住所のうち、郵便番号の数字の昇順(数字の小さいものが先)で並べた上位10件のレコードを取得するSQL
select * from address where kanji2 like '新宿区' order by postcode asc  limit 10 offset 11 ;
-- 3.　2 と同じ条件で、上位11件目から20件目までを取得する SQL
select * from address where kana2 like 'ｼ%' and kana3 like 'ｼ';
-- 4.　市区町村の読みが「シ」から始まる全てのレコードを取得する SQL
select * from address where kanji2 like '新宿%' or kanji3 like '新宿%';
-- 5.　市区町村かそれ以下の町域名に「新宿」という文字列が含まれる全てのレコードを取得する SQL
select * from address where kanji2 = '新宿区' or kanji2 = '渋谷区' or kanji2 = '世田谷区';
-- 6. 「新宿区」「渋谷区」「世田谷区」の３区全てのレコードを取得するSQL
select * from address where kanji1 = '東京都' and kanji2 = '新宿区' and kanji3 like '北町%';
-- 7. 「東京都新宿区北町」のレコードを取得するSQL
select postcode from address where kanji2 = '新宿区';
-- 8. 「新宿区」に割当てられているの郵便番号の件数を取得する SQL
 update address set kanji3 = '' where kanji3 = '以下に掲載がない場合' ;
-- 9.　町域名が「以下に掲載がない場合」となっているレコードの町域名を空文字に変更する SQL
delete from address where kanji2 <> '新宿区';
-- 10. 「新宿区」以外のレコードを全て削除する SQL