<?PHP
require_once( '../conf/AppConf.php');

$imgFile = APP_DIR . '/tmp/test/bnr_stamplist_1000000911.png';

// ヘッダの出力
header('Content-type:image/png');

readfile($imgFile);