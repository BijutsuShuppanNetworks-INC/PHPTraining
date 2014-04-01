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
    <div class="content">
    <h1>画像登録</h1>
    <p>登録したい画像をドラッグ＆ドロップしてください。</p>





      <!-- ドラッグ＆ドロップ(#dd-area) -->
      <div id="sortable">
        <div id="drop_area" class="drop-area">
          ファイルをドラッグ&amp;ドロップしてください。
        </div>

        <p class="fs-80">※画像ファイルのみ、<span class="text-primary">(このくらいのサイズ)</span>まで</p>

        <div id="drop_result" class="drop-result">
          <ul id="drop_result_ul" class="sotable-base"></ul>
        </div>

        <div class="mt2" id="js_sort_finish" style="display:none;">
          <p id="js_mk_thumb_btn" class="pure-button">この順番でサムネイル作成</p>
        </div>

      </div>
      <!-- //ドラッグ＆ドロップ(#dd-area) -->



      <!-- zipファイル作成(#js_confirm_bn) -->
      <div id="js_confirm_bn" class="mt2" style="display:none;">
        <p>このデータで問題なければ「zipファイルを作成」ボタンを押してください</p>
        <p id="js_confirm_bn_area"></p>
        <p id="js_mk_zip_btn" class="pure-button">
          zipファイルを作成
        </p>
      </div>
      <!-- // zipファイル作成(#js_confirm_bn) -->



      <!-- zipファイルダウンロード(#js_dl_zip_btn)    -->
      <p id="js_dl_zip_btn" class="pure-button" style="display:none;">
        zipファイルをダウンロードする
      </p>
      <!-- // zipファイルダウンロード(#js_dl_zip_btn)    -->


      <div id="debug"></div>


      <!-- form -->
      <form id="php_mk_banner" action="mk_banner.php" method="post">
        <fieldset>
          <input type="hidden" name="session_id" value="{$session_id}">
          <input type="hidden" name="categoryId" value="{$smarty.post.categoryId}">
          <input type="hidden" name="categoryName" value="{$smarty.post.categoryName}">
          <input type="hidden" name="preinFlag" value="{$smarty.post.preinFlag}">

          <div id="drop_result_base64"></div>
        </fieldset>
      </form>
      <!-- // form -->

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
<script src="js/jquery-sotable-ui.js"></script>
<script>
{literal}
$(function() {
  var $form = $('form');

  // ドラッグ＆ドロップ可能か判別
  // ==========================================================================
  if (window.File) {
    $('body').append('<script src="js/dnd_upload.js"><\/script>');
  } else {
    // fileAPIが使えない環境
    $('#drop_area').css('display', 'none');
    $( "#sortable" ).html('<p>ファイルのドラッグ&amp;ドロップができません。<br>最新のchromeやfirefox、Internet Explorer 10以上で利用可能です<\/p>');
  }




  // ならびかえ
  // ==========================================================================
  $( "#sortable" ).sortable({
    items: 'li',
    tolerance: 'pointer',
    drop: function(ui){
    },
    stop: function(ui){
      $(ui.item).addClass('moveend');
    }
  });

  // 削除
  $(document).on('click', '.sortable-close' ,function(){
    var removeFormData = $(this).parent('li').attr('id');
    $(this).parent('li').remove();
    $('.'+ removeFormData).remove();
  });



  // バナー作成
  // ==========================================================================
  $('#js_mk_thumb_btn').click(function(){

    // formの id & action 代入
    $form.data_id = 'php_mk_banner';
    $form.data_action = './api/mk_banner.php';
    $form.data_method = 'post';

    // 以前つくったバナーサンプルがある場合は破棄
    $('#js_confirm_bn_area img').remove();

    _ajax($form);

  });



  // zip作成
  // ==========================================================================
  $('#js_mk_zip_btn').click(function(){
    $('#js_mk_thumb_btn').addClass('pure-button-disabled');
    $('#js_mk_zip_btn').addClass('pure-button-disabled');
    $('#drop_result_base64').remove();

    // formの id & action 代入
    $form.data_id = 'php_mk_zip';
    $form.data_action = './api/mk_zip.php';
    $form.data_method = 'post';

    _ajax($form);

  });



  // ajax
  // ==========================================================================
  function _ajax($form){
    $.ajax({
      async: true,
      url: $form.data_action,
      type: $form.data_method,
      data: $form.serializeArray(),
      timeout: 10000,
      success:function(data){
        if( $form.data_id == 'php_mk_banner'){
          // バナー表示&zip作成ボタン表示
          $('#main').css('height', 'auto');
          $('#js_confirm_bn').css('display', 'block');
          $('#js_confirm_bn_area').append('<img src="data:image/png;base64,'+ data +'">');

        } else if ( $form.data_id == 'php_mk_zip' ){
          // zipDLボタンの表示
          $('#js_dl_zip_btn').css('display', 'inline-block');
          $('#debug').text(data);
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        alert('ajaxが失敗しました');
        return false;
      }
    });
  }

});
{/literal}
</script>

</body>
</html>