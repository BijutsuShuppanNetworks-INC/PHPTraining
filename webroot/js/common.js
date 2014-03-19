$(function(){
// メガメニュー
// ==========================================================================
  $header = $('#horizontal-menu');
  var bgcolor = $header.css('backgroundColor');
  $header.find('ul').css({backgroundColor: bgcolor});



  // go to TOP
  // ==========================================================================
  $('#pagetop').click(function(){
    $('body,html').animate({scrollTop : 0}, 400);
  });



  // アコーディオン
  // ==========================================================================
  $(document).on('click', '.accordion-head' ,function(){
    if($(this).next().css('display')!='block'){
      $(this).removeClass('accordion-close').addClass('accordion-open').next().slideDown();
    } else{
      $(this).removeClass('accordion-open').addClass('accordion-close').next().slideUp();
    }
  });

});



// ポップアップ
// ==========================================================================
(function($){
  $.fn.popup = function(options){
    var elements = this;
    var opt = $.extend({}, $.fn.popup.defaults, options);
    var $grayLayer = $('#grayLayer'),
        $overLayer = $('#overLayer');

    // process__背景のイベントキャンセル
    $grayLayer.on('click touchstart touchend touchmove scroll' ,function(e){
      e.preventDefault();
    });
    var killEvent = function (e) {
      e.preventDefault();
    };

    // process__閉じるアクション
    function _popClose(){
      $grayLayer.css('display','none');
      $overLayer.css('display','none');
    }

    // process__ポップアップ表示
    function _popOpen(){
      $grayLayer.css('display','block');
      $overLayer.css('display','block').html($(opt.cont).html());
    }


    // event__クリックでポップアップ表示/閉じるボタン押下で非表示
    elements.each(function() {
      // menu出現
      $(this).click(function(){
        _popOpen();

      // close
        $('.cancel-btn').click(function(){
          _popClose();
        });
      });
    });

  };
})(jQuery);