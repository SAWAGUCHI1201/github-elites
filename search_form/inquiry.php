<?php
// 都道府県コード => 都道府県名
// 関東地方のみ
$prefectures = array(
  8  => "茨城県",
  9  => "栃木県",
  10 => "群馬県",
  11 => "埼玉県",
  12 => "千葉県",
  13 => "東京都",
  14 => "神奈川県",
);
// 観光スポットデータ
//   name   : スポットの名前
//   detail : スポットの説明
//   image  : スポットの画像ファイル名
//
// ここにデータが無い都道府県は、観光スポット無し、として処理してください。
$places = array(

  // 栃木県の観光スポット-------------------------------------------------------------------------------
  9 => array(
    array(
      'name'   => '西洋の邸宅',
      'detail' => '西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
                   西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
                   西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
                   西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。',
      'image'  => 'place_4.jpg',
    ),
  ),

  // 群馬県の観光スポット-------------------------------------------------------------------------------
  10 => array(
    array(
      'name'   => '赤い門',
      'detail' => '赤い門はとても良い所です。赤い門はとても良い所です。
                   赤い門はとても良い所です。赤い門はとても良い所です。
                   赤い門はとても良い所です。赤い門はとても良い所です。
                   赤い門はとても良い所です。赤い門はとても良い所です。',
      'image'  => 'place_5.jpg',
    ),
  ),

  // 東京都の観光スポット-------------------------------------------------------------------------------
  13 => array(
    array(
      'name'   => '緑の階段',
      'detail' => '緑の階段はとても良い所です。緑の階段はとても良い所です。
                   緑の階段はとても良い所です。緑の階段はとても良い所です。
                   緑の階段はとても良い所です。緑の階段はとても良い所です。
                   緑の階段はとても良い所です。緑の階段はとても良い所です。',
      'image'  => 'place_1.jpg',
    ),
    array(
      'name'   => '雷門',
      'detail' => '雷門はとても良い所です。雷門はとても良い所です。雷門はとても良い所です。
                   雷門はとても良い所です。雷門はとても良い所です。雷門はとても良い所です。
                   雷門はとても良い所です。雷門はとても良い所です。',
      'image'  => 'place_6.jpg',
    ),
    array(
      'name'   => '東京タワー',
      'detail' => '東京タワーはとても良い所です。東京タワーはとても良い所です。
                   東京タワーはとても良い所です。東京タワーはとても良い所です。
                   東京タワーはとても良い所です。東京タワーはとても良い所です。
                   東京タワーはとても良い所です。東京タワーはとても良い所です。',
      'image'  => 'place_7.jpg',
    ),
  ),

  // 神奈川県の観光スポット-------------------------------------------------------------------------------
  14 => array(
    array(
      'name'   => '日本の城',
      'detail' => '日本の城はとても良い所です。日本の城はとても良い所です。
                   日本の城はとても良い所です。日本の城はとても良い所です。
                   日本の城はとても良い所です。日本の城はとても良い所です。
                   日本の城はとても良い所です。日本の城はとても良い所です。',
      'image'  => 'place_2.jpg',
    ),
    array(
      'name'   => '旅館の部屋',
      'detail' => '旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
                   旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
                   旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
                   旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。',
      'image'  => 'place_3.jpg',
    ),
  ),
);

// $articles = 0;
// if (isset($_POST['pref'])) {
//   // $_POST['pref'] が存在する場合の処理
//   $Pref = $_POST['pref'];
//   $articles = count($places[$Pref]);
// }
//$Prefに配列があった場合の処理
// $Pref = $_POST['pref'];//番号の取得
// $place = $places[$Pref];
// $articles = count($place[$Pref]);//件数
$articles = 0;
if (isset($_POST['pref'])) {
  // $_POST['pref'] が存在する場合の処理
  $Pref = $_POST['pref'];
  $articles = count($places[$Pref]);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>関東地方の観光スポット検索</title>
  <!--
    ここでは CSS フレームワークである Twitter Bootstrap を読み込んでいます。
    この CSS を使用することで見た目が整ったページを簡単に作る事が出来ます。
    「twitter bootstrap」などで検索すると様々な情報が出てくるので調べてみてください。
    (実務でも非常によく使用されてます)
    公式サイト: http://getbootstrap.com/

    注意: 以下のような "https://" から始まる URL で CSS を読み込む場合、インターネットに接続出来る環境でないと CSS を読み込めないので注意してください。
  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <style>
    /*
      この課題では CSS を変更する必要はありません。
      デザインは支給されたものとして考えてください。
    */
    h1 {
      margin: 0 0 30px 0;
      padding: 20px 30px;
      border-bottom: 1px solid #ccc;
      background-color: #f8f8f8;
    }
    footer {
      text-align:center;
    }
    .search-result {
      margin: 10px 0;
    }
  </style>
</head>
<body>
  <h1>関東地方の観光スポット検索</h1>
  <div class="container">
    <form class="form-inline" action="inquiry.php" method="post">
      <div class="form-group">
        <select name="pref" class="form-control">
          <?php foreach( $prefectures as $number => $prefecture ): ?>
            <?php $Selected = ($number == $Pref) ? $Selected = 'selected' : $Selected = ''; ?>
            <?php echo '<option value="'. $number. '"'. $Selected . '>'.$prefecture. '</option>'; ?>
          <?php endforeach; ?>
        </select>
      </div>
      <button class="btn btn-primary btn-sm" type="submit"> 検 索 </button>
    </form>
    <p class="search-result"><?php
    if($articles === 0)
    {
      echo $prefectures[$Pref] . 'の観光スポットは見つかりませんでした。';
    }else{
      echo $prefectures[$Pref] . 'の観光スポットは' . $articles . '件見つかりました。';
    }
    ?>
    </p>
       <?php if( isset($places[$Pref]) ): ?>
       <?php foreach($places[$Pref] as $in_place): ?>
          <div class="media">
            <div class="media-left">
                  <img src="<?php echo $in_place["image"]; ?>">
            </div>
          <div class="media-body">
          <?php echo '<h4>' . $in_place["name"] . '</h4>'; ?>
          <?php echo '<p>' . $in_place["detail"] . '</p>'; ?>
          </div>
        <?php endforeach ?>
      <?php else: ?>
        <?php echo '観光スポットなし' ?>
    <?php endif ?>
    </div>
  </div>
  <hr>
  <footer>&copy; 観光スポット検索協会 </footer>
</body>
</html>