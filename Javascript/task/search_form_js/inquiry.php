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
//   $Pref = $_POST['pref'];
//   $articles = count($places[$Pref]);
// }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>関東地方の観光スポット検索</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <style>
  h1 {margin: 0 0 30px 0;padding: 20px 30px;border-bottom: 1px solid #ccc;background-color: #f8f8f8;}
  footer {text-align:center;}
  .search-result {margin: 10px 0;}
  .media {display:none;}*/
  </style>
</head>
<body>
  <h1>関東地方の観光スポット検索(js)</h1>
  <div class="container">

    <form class="form-inline">
      <div class="form-group">
        <select name="pref" class="form-control">
          <option value="reset">選択してください</option>
          <?php foreach( $prefectures as $number => $prefecture ): ?>
            <?php echo '<option value="'. $number. '">'.$prefecture. '</option>'; ?>
          <?php endforeach; ?>
        </select>
      </div>
    </form>

    <button id="remove">リセット</button>

    <p class="search-result">
      <span class="classCount"></span>
    </p>

    <?php foreach($places as $place => $key): ?>
      <?php foreach($key as $item): ?>
      <div class="media plef_<?php echo $place ?> ">
        <div class="media-left">
              <img src="<?php echo $item['image']; ?>">
        </div>
        <div class="media-body">
          <?php echo '<h4>' . $item["name"] . '</h4>'; ?>
          <?php echo '<p>' . $item["detail"] . '</p>'; ?>
        </div>
      </div>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </div>
  <hr>
  <footer>&copy; 観光スポット検索協会 </footer>
  <script>
  $(function(){

    //リセット
    $("button").click(function(){
      $("option[value=reset]").prop("selected",true);
    });

    $("select").change(function(){
      $(".media").hide();//とりあえず消す
      var setOption = $("option:selected").val();//選択されたoptionのvalue取得
      var setClass = "plef_"+setOption;//setOptionで取得した値と文字列plef_を連結する
      var showPref = $("div."+setClass).show();//連結したsetClassに該当するクラスを表示
      var classCount = $("div."+setClass).length;//連結したクラス名を持つクラスを数える
      var InLength = $(".classCount").text(classCount + "件見つかりました。");//件数があった場合の処理クラスにclassCountで取得した数を入れる
      if ( classCount = "0" ){
        $(".classCount").text("スポットは見つかりませんでした。");
      };
    });
  });
  </script>
</body>
</html>