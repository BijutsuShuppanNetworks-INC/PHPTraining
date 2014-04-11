<?PHP
require_once( '../conf/AppConf.php');

// スタンプデータ一次保存ディレクトリ
define('APP_STAMPDATA_TMP_DIR', APP_DIR.'/tmp/files/');
// zipファイルの拡張子
define('APP_STAMP_ZIP_SUFFIX', '.zip');

$sessionId  = $_POST["session_id"];
$categoryId = $_POST["categoryId"];

$archiveFile = APP_STAMPDATA_TMP_DIR . $sessionId . DS .$categoryId . APP_STAMP_ZIP_SUFFIX;

// ヘッダの出力
header('Content-Type: application/octet-stream'); 
// ファイル名の指定
header('Content-Disposition: attachment; filename="'.$categoryId . APP_STAMP_ZIP_SUFFIX.'"'); 
header('Content-Length: '.filesize($archiveFile));

readfile($archiveFile);