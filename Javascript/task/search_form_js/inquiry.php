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
  /*.media {display:none;}
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
      <span>件数の表示はあとでやる</span>
    </p>

    <?php foreach($places as $in_place => $place): ?>
      <div class="media">
        <div class="media-left">
              <img src="<?php echo $place['image'] ?>">
        </div>
        <div class="media-body">
          <?php echo '<h4>' . $place["name"] . '</h4>'; ?>
          <?php echo '<p>' . $place["detail"] . '</p>'; ?>
        </div>
      </div>
    <?php endforeach ?>
    <?php var_dump($place); ?>

  </div>
  <hr>
  <footer>&copy; 観光スポット検索協会 </footer>
  <script>
  $(function(){

    //リセット
    $("button").click(function(){
      $("option[value=reset]").prop("selected",true);
    });
    //selectが変更された時のvalを取得
    //div classにvalを代入して表示するclassを特定する
    $("select").change(function(){
      var setOption = $("option:selected").val();//選択されたoptionのvalue取得
      var showPref = $(".media."+setOption).show();//取得したvalに該当するクラスを表示
      // $("div."+setOption:not("div")).hide();
      //$(".media."+setOption).not(".media").hide(".media");//選択されたoption以外を非表示
    });
  });
  </script>
</body>
</html>