<?php
// 都道府県コード => 都道府県名
// 関東地方のみ
$prefectures = array(
  "ibaragi"  => "茨城県",
  "tochigi"  => "栃木県",
  "gunma" => "群馬県",
  "saitama" => "埼玉県",
  "chiba" => "千葉県",
  "tokyo" => "東京都",
  "kanagawa" => "神奈川県",
);

$articles = 0;
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
  .media {display:none;}
  </style>
</head>
<body>
  <h1>関東地方の観光スポット検索(js)</h1>
  <div class="container">

    <form class="form-inline" action="inquiry.php" method="post">
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
      <span>あとでやる</span>
    </p>


    <div class="media tochigi">
      <div class="media-left">
            <img src="place_4.jpg">
      </div>
      <div class="media-body">
        <h4>西洋の邸宅</h4>
        <p>西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
           西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
           西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
           西洋の邸宅はとても良い所です。西洋の邸宅はとても良い所です。
        </p>
      </div>
    </div>

      <div class="media gunma">
        <div class="media-left">
              <img src="place_5.jpg">
        </div>
        <div class="media-body">
          <h4>赤い門</h4>
          <p>赤い門はとても良い所です。赤い門はとても良い所です。
             赤い門はとても良い所です。赤い門はとても良い所です。
             赤い門はとても良い所です。赤い門はとても良い所です。
             赤い門はとても良い所です。赤い門はとても良い所です。
          </p>
        </div>
      </div>

      <div class="media tokyo">
        <div class="media-left">
              <img src="place_1.jpg">
        </div>
        <div class="media-body">
          <h4>緑の階段</h4>
          <p>緑の階段はとても良い所です。緑の階段はとても良い所です。
             緑の階段はとても良い所です。緑の階段はとても良い所です。
             緑の階段はとても良い所です。緑の階段はとても良い所です。
             緑の階段はとても良い所です。緑の階段はとても良い所です。
          </p>
        </div>
      </div>
      <div class="media tokyo">
        <div class="media-left">
              <img src="place_6.jpg">
        </div>
        <div class="media-body">
          <h4>雷門</h4>
          <p>雷門はとても良い所です。雷門はとても良い所です。雷門はとても良い所です。
             雷門はとても良い所です。雷門はとても良い所です。雷門はとても良い所です。
             雷門はとても良い所です。雷門はとても良い所です。
          </p>
        </div>
      </div>
      <div class="media tokyo">
        <div class="media-left">
              <img src="place_7.jpg">
        </div>
        <div class="media-body">
          <h4>東京タワー</h4>
          <p>東京タワーはとても良い所です。東京タワーはとても良い所です。
             東京タワーはとても良い所です。東京タワーはとても良い所です。
             東京タワーはとても良い所です。東京タワーはとても良い所です。
             東京タワーはとても良い所です。東京タワーはとても良い所です。
          </p>
        </div>
      </div>


      <div class="media kanagawa">
        <div class="media-left">
              <img src="place_2.jpg">
        </div>
        <div class="media-body">
          <h4>日本の城</h4>
          <p>日本の城はとても良い所です。日本の城はとても良い所です。
             日本の城はとても良い所です。日本の城はとても良い所です。
             日本の城はとても良い所です。日本の城はとても良い所です。
             日本の城はとても良い所です。日本の城はとても良い所です。
          </p>
        </div>
      </div>
      <div class="media kanagawa">
        <div class="media-left">
              <img src="place_3.jpg">
        </div>
        <div class="media-body">
          <h4>旅館の部屋</h4>
          <p>旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
             旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
             旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
             旅館の部屋はとても良い所です。旅館の部屋はとても良い所です。
          </p>
        </div>
      </div>


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
      $(".media."+setOption).not(".media").hide(".media");//選択されたoption以外を非表示
    });
  });
  </script>
</body>
</html>