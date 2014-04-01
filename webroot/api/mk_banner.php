<?php
/* ==========================================================================
   # 関連ファイルのロード
   # 定数定義
   # Postデータ処理
   # ディレクトリ内のファイルをすべて削除？
   # ドラッグ＆ドロップしたデータのバイナリ化・バナー画像に追加(変数定義)
   # ドラッグ＆ドロップしたデータのバイナリ化・バナー画像に追加
   # jsonファイル作成
   # バナー画像を保存
   ========================================================================== */
// # 関連ファイルのロード
// ==========================================================================
require_once( '../../conf/AppConf.php');
require_once(APP_DIR.'/libs/log.php');



// # 定数定義
// ==========================================================================
// ディレクトリセパレータ
if(!defined('DIRECTORY_SEPARATOR')){
define('DIRECTORY_SEPARATOR', '/');
}
// ファイル名セパレータ
define('FNS', '_');
// IDセパレータ
define('IDIRECTORY_SEPARATOR', '_');
// ログ出力ディレクトリ
define('APP_LOGOUTPUT_DIR', APP_DIR.'/tmp/logs/');
// スタンプデータ一次保存ディレクトリ
define('APP_STAMPDATA_TMP_DIR', APP_DIR.'/tmp/files/');

// スタンプパッケージバナー画像関連
define('APP_STAMP_BANNER_IMG_PREFIX', 'bnr_stamplist_'); // バナー画像名の定数
define('APP_STAMP_BANNER_BASE_IMG', APP_DIR.'/conf/img/img_bunner_24.png'); // バナー画像の背景
define('APP_STAMP_IMG_SUFFIX', '.png'); // スタンプ画像の拡張子
define('APP_STAMP_BANNER_IMG_SUFFIX', '.png'); // バナー画像の拡張子

// スタンプJSON関連
define('APP_STAMP_JSON_FILENAME', 'stamp.json');



// Postデータの取得
$categoryId       = $_POST["categoryId"];
$categoryName     = $_POST["categoryName"];
$sessionId        = $_POST["session_id"];
$preinFlag        = $_POST["preinFlag"];
$stampData_base64 = $_POST["stamps"];



// # Postデータ処理
// ==========================================================================
// json変換用データの準備
$json_array = array(
  "categoryId"   => $categoryId,
  "categoryName" => $categoryName,
  "preinFlag"    => $preinFlag,
  "stampData"    => null,
);

// このセッション内で生成されるスタンプデータファイルの保存ディレクトリ
$stampDataPass = APP_STAMPDATA_TMP_DIR .$sessionId;



// # ディレクトリ内のファイルをすべて削除
// ==========================================================================
$dir = $stampDataPass;

function deleteData ( $dir ) {
  if ( $handle = opendir ( $dir )) {
    while ( false !== ( $fileName = readdir ( $handle ) ) ) {
      if ( $fileName != "/\./" && $fileName != "/\.\./" ) {
        unlink ( "$dir/$fileName" );
      }
    }
  }
  closedir ( $handle );
}
deleteData ( $dir );



// # ドラッグ＆ドロップしたデータのバイナリ化・バナー画像に追加(変数定義)
// ==========================================================================
// バナーの背景画像
$baseImage = imagecreatefrompng( APP_STAMP_BANNER_BASE_IMG );

$i = 0;
$stampData = null;
$x = 0;
$y = 0;

// # ドラッグ＆ドロップしたデータのバイナリ化・バナー画像に追加
// ==========================================================================
foreach( $stampData_base64 as $data){
  $i++;
  $stampName = $stampDataPass .DIRECTORY_SEPARATOR .$categoryId .FNS .sprintf("%02d" ,$i) .APP_STAMP_IMG_SUFFIX;

  // base64ファイルを分解
  $data = explode(',', $data);
  // base64ファイルを文字列置換+デコード
  $data = base64_decode(str_replace(' ', '+', $data[1]));

  // ファイル生成
  if (touch($stampName)) {
    $fp = fopen($stampName, 'w');
    fwrite($fp, $data);
    fclose($fp);
  }else{
    echo "画像ファイルの作成・変更に失敗しました";
  }

  // 合成するスタンプデータサイズを取得
  $composeImageSize = getimagesize( $stampName );

  // 合成するスタンプデータを展開
  $composeImage = ImageCreatefrompng( $stampName );

  // バナー画像のアンチエイリアスを有効・ブレンドモードを無効・完全なアルファチャネル情報を保存するフラグをonにする
  imageantialias($composeImage, true);
  imagealphablending($baseImage, false);
  imagesavealpha($baseImage, true);

  // 背景画像に合成
  imagecopyresampled( $baseImage, $composeImage, 100 * $x + 25, 90 * $y + 10, 0, 0, 70, 70, $composeImageSize[0], $composeImageSize[1] );

  // 位置の制御
  $x++;
  if($x > 5 ){
    $x = 0;
    $y = 1;
  }

  // 合成するスタンプデータのメモリを破棄
  imagedestroy($composeImage);
  // ファイルのパーミッションを設定
  chmod($stampName, 0777);

  // スタンプ画像一覧を作成
  $stampData = array(
    'stampId'    => $categoryId .IDIRECTORY_SEPARATOR .sprintf("%02d" ,$i),
    'categoryId' => $categoryId,
    'stampOrder' => $i,
  );

  $json_array["stampData"][] = $stampData;

}



// # jsonファイル作成
// ==========================================================================
// 完成jsonファイルの名前
$jsonFileName = $stampDataPass .DIRECTORY_SEPARATOR .APP_STAMP_JSON_FILENAME;

// ファイル生成
if (touch($jsonFileName)) {
  $fp = fopen($jsonFileName, 'w');
  fwrite($fp, json_encode($json_array));
  fclose($fp);
}else{
  echo "jsonファイルの作成・変更に失敗しました";
}
// ファイルのパーミッションを設定
chmod($jsonFileName, 0777);



// # バナー画像を保存
// ==========================================================================
// バナー画像のファイル名
$saveImageFileName = APP_STAMP_BANNER_IMG_PREFIX .$categoryId .APP_STAMP_BANNER_IMG_SUFFIX;

// バナー画像を保存
imagepng( $baseImage, $stampDataPass .DIRECTORY_SEPARATOR .$saveImageFileName);
imagedestroy($baseImage);

// できたバナー画像をbase64で返す
$responseData = base64_encode(file_get_contents($stampDataPass .DIRECTORY_SEPARATOR .$saveImageFileName));
echo $responseData;