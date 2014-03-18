<?PHP
require_once( '../conf/AppConf.php');

$archiveFile = APP_DIR . '/tmp/test/1000000911.zip';

// ヘッダの出力
header('Content-Type: application/octet-stream'); 
// ファイル名の指定
header('Content-Disposition: attachment; filename="1000000911.zip"'); 
header('Content-Length: '.filesize($archiveFile));

readfile($archiveFile);