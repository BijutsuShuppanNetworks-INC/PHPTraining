{debug}
<!doctype html>
<!--[if IE 7 ]><html lang="ja" class="ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="ja" class="ie ie8"><![endif]-->
<!--[if IE 9 ]><html lang="ja" class="ie9"><![endif]-->
<!--[if !(IE)]><!-->
<html lang="ja"><!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/pure/0.2.1/pure-min.css">
  <link rel="stylesheet" href="css/pure-skin-mine.css">
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/sortable.css">
  <title>スタンプ管理</title>
  <meta name='robots' content='noindex,nofollow'>
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <![endif]-->
</head>
<body class="pure-skin-mine">
<div id="wrap">
  <!-- ヘッダー(.header) -->
  <div class="header">
    <div id="horizontal-menu" class="pure-menu pure-menu-open pure-menu-horizontal">
      <a class="pure-menu-heading" href="index.html">
        <img src="img/16.png" alt="スタンプ管理" width="40" height="40">
      </a>
      <ul id="std-menu-items">
        <li><a href="">Home</a></li>
        <li><a href="?{$action}stamp1">スタンプ管理</a></li>
      </ul>
    </div>
  </div>
  <!-- //ヘッダー(.header) -->

<!-- ================================================================================ -->
  <!-- コンテンツエリア(#main) -->
  <div id="main">
    <p>{$sessionId}</p>
    <div class="content">
      <h1>スタンプ管理</h1>
      <!-- 削除ボタン・必須文言 -->
      <div class="pure-g mb2 clearfix">
        <div class="pure-u-12-25 fs-80 fl">
          <span class="text-primary">*</span>入力必須です
        </div>
      </div>
      <!-- //削除ボタン・必須文言 -->

      <form action="./" method="post" class="pure-form pure-form-aligned">
        <fieldset>
          <input type="hidden" value="stamp2" name="action">

          <!-- アセットID入力 -->
          <div class="pure-control-group">
            <h3>アセットID<span class="text-primary">*</span></h3>
            <input name="categoryId" id="name" type="text" placeholder="アセットIDを入力してください" class="pure-input-1-3" required>
            <p>
              <span class="fs-80">
                スタンプパッケージのIDです。<br>
              </span>
            </p>
          </div>
          <!-- //アセットID入力 -->



          <!-- パッケージ名称入力 -->
          <div class="pure-control-group">
            <h3>パッケージ名称<span class="text-primary">*</span></h3>
            <input name="categoryName" id="name" type="text" placeholder="パッケージ名称を入力してください" class="pure-input-1-3" required>
            <p>
              <span class="fs-80">
                スタンプパレット内のボタン内キャプションとして利用します。
              </span>
            </p>
          </div>
          <!-- //パッケージ名称入力 -->



          <!-- プリインフラグ -->
          <div class="pure-control-group">
            <h3>プリインフラグ<span class="text-primary">*</span></h3>
            <label for="preinFlag-0" class="pure-radio">
              <input name="preinFlag" value="0" id="preinFlag-0" type="radio" checked>No
            </label>
            <label for="preinFlag-1" class="pure-radio">
              <input name="preinFlag" value="1" id="preinFlag-1" type="radio">Yes
            </label>
          </div>
          <!-- //プリインフラグ -->



          <div class="pure-controls mt2">
            <button type="submit" class="pure-button pure-button-primary">確認</button>
          </div>


        </fieldset>
      </form>

    </div>
    <!-- //(.contents) -->
  </div>
  <!-- //コンテンツエリア(#main) -->

</div>
<!-- //#wrap -->
<!-- ================================================================================ -->
<!-- フッター(.footer) -->
<div class="footer">
  <div id="pagetop">
    <i class="icon-arrow-up"></i>ページTOPへ
  </div>

  &copy; BIJUTSU SHUPPAN NETWORKS CO., LTD.
</div>
<!-- //フッター(.footer) -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
<script src="js/common.js"></script>

</body>
</html>