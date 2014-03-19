<?php
/* ==========================================================================
   # 関連ファイルのロード
   # 定数定義
   # Postデータの取得?
   # Postデータ処理
   # ディレクトリ内の不要ファイルを削除
   # zip作成
   ========================================================================== */

// # 関連ファイルのロード
// ==========================================================================
require_once('log.php');

// # 定数定義
// ==========================================================================
// ディレクトリセパレータ
define('DS', '/');
// ファイル名セパレータ
define('FNS', '_');
// IDセパレータ
define('IDS', '_');
// ログ出力ディレクトリ
define('APP_LOGOUTPUT_DIR', './log/');
// スタンプデータ一次保存ディレクトリ
define('APP_STAMPDATA_TMP_DIR', './files/');

// zip関連
define('APP_STAMP_ZIP_SUFFIX', '.zip'); // zipファイルの拡張子

// スタンプパッケージバナー画像関連
define('APP_STAMP_BANNER_IMG_PREFIX', 'bnr_stamplist_'); // バナー画像名の定数
define('APP_STAMP_BANNER_IMG_SUFFIX', '.png'); // スタンプ画像の拡張子

// スタンプJSON関連
define('APP_STAMP_JSON_FILENAME', 'stamp.json');


// # Postデータの取得
// ==========================================================================
// Postデータをログ出力
putLog( APP_LOGOUTPUT_DIR, print_r($_POST, true) );

// Postデータの入力チェック?


// Postデータの取得
$sessionId        = $_POST["session_id"];
$categoryId       = $_POST["categoryId"];
$categoryName     = $_POST["categoryName"];
$preinFlag        = $_POST["preinFlag"];



// # Postデータ処理
// ==========================================================================
// このセッション内で生成されるスタンプデータファイルの保存ディレクトリ
$stampDataPass = APP_STAMPDATA_TMP_DIR .$sessionId;

// バナー画像のファイル名
// $saveImageFileName = $stampDataPass .DS　.APP_STAMP_BANNER_IMG_PREFIX .$categoryId .APP_STAMP_BANNER_IMG_SUFFIX;
// jsonファイル名
$jsonFileName = $stampDataPass .DS .APP_STAMP_JSON_FILENAME;



// # zip作成
// ==========================================================================
$zip = new ZipArchive();
// ZIPファイルをオープン
$res = $zip->open($stampDataPass .DS .$categoryId .APP_STAMP_ZIP_SUFFIX, ZipArchive::CREATE);

// zipファイルのオープンに成功した場合
if ($res === true) {
  // 圧縮するファイルを指定する
  $targetFiles = scandir($stampDataPass);
  if(! empty($targetFiles)){
    foreach ($targetFiles as $targetFileskey => $targetFilesVal) {
      if(is_file($stampDataPass .DS .$targetFilesVal)){
        $zip->addFile($stampDataPass .DS .$targetFilesVal, $targetFilesVal);
      }
    }
  }

  // ZIPファイルをクローズ
  $zip->close();
  echo $jsonFileName;
}
