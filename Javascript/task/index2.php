<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>テスト</title>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  </style>
  <script>
    // ここに JavaScript を書く
 $(function(){

  $("img").click(function(){
    src = $(this).attr('src');
    image = $("#modal").html('<img src="" id="modalimage" width="300px">');
    $("#modalimage").attr("src",src);
    $("#modal").show();
  });

  $("img")

 });

  </script>
</head>
<body>

<div id="modal" style="display:none;">
あああ
</div>


<a href="#">
<img src="http://free-photos-ls04.gatag.net/thum01/gf01a201503312300.jpg" class="image" width="200px" height="auto"><br>
</a>

<a href="#">
<img src="https://pbs.twimg.com/profile_images/1577638212/prof44.png" class="image" width="200px" height="auto"><br>
</a>

<a href="#">
<img src="https://blog.fotolia.com/jp/files/2016/08/1467830836GOT_ep_7_The_hound_s_wishful_thinking.gif" class="image" width="200px" height="auto"><br>
</a>

</body>
</html>
