var result, result2;
var n = 1;
$(function() {
  result = $('#drop_result_ul');
  result2 =$('#drop_result_base64');
  window.addEventListener('dragover', function (event) {
    event.preventDefault();
  }, false);
  $(".drop-area").get(0).addEventListener('drop', function(event) {
    event.preventDefault();
    var dt = event.dataTransfer;
    for (var i = 0; i < dt.files.length; i++) {
      upload(dt.files[i], new FileReader());
    }
  }, false);

  function upload(file, reader) {
    $('.dnd_error').remove();
    var name = file.name;
    if (!name.match(/(\.|\/)(png)$/i)) {
      result.append('<li class="dnd_error">'+ name + 'のアップロードに失敗しました。<br>pngファイルのみアップロード可能です<span class="sortable-close"><i class="icon-close"></i>削除</span></li>');
      return false;
    }
    reader.onload = function() {
      result.append('<li class="sortable-item" id="dnd_img_data_'+ n +'"><img src="'+ reader.result +'" alt="'+ name +'"><span class="sortable-close"><i class="icon-close"></i>削除</span></li>');
      result2.append('<input type="hidden" class="dnd_img_data_'+ n +'" name="stamps[]" value="'+ reader.result +'">');
      $('#js_sort_finish').css('display','block');
      n++;
    };
    reader.readAsDataURL(file, 'UTF-8');
  }
});